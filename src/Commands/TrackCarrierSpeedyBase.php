<?php

namespace Gdinko\Speedy\Commands;

use Gdinko\Speedy\Events\CarrierSpeedyTrackingEvent;
use Gdinko\Speedy\Exceptions\SpeedyImportValidationException;
use Gdinko\Speedy\Facades\Speedy;
use Gdinko\Speedy\Hydrators\Request;
use Gdinko\Speedy\Models\CarrierSpeedyTracking;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

abstract class TrackCarrierSpeedyBase extends Command
{
    protected $parcels = [];

    protected $muteEvents = false;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'speedy:track
                            {--account= : Set Speedy API Account}
                            {--clear= : Clear Database table from records older than X days}
                            {--timeout=20 : Speedy API Call timeout}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Track Speedy parcels';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('-> Carrier Speedy Parcel Tracking');

        try {
            $this->setAccount();

            $this->setup();

            $this->clear();

            Speedy::setTimeout(
                $this->option('timeout')
            );

            $this->track();

            $this->newLine(2);
        } catch (SpeedyImportValidationException $eive) {
            $this->newLine();
            $this->error(
                $eive->getMessage()
            );
            $this->info(
                print_r($eive->getData(), true)
            );
            $this->error(
                print_r($eive->getErrors(), true)
            );
        } catch (\Exception $e) {
            $this->newLine();
            $this->error(
                $e->getMessage()
            );
        }

        return 0;
    }

    /**
     * setAccount
     *
     * @return void
     */
    protected function setAccount()
    {
        if ($this->option('account')) {
            Speedy::setAccountFromStore(
                $this->option('account')
            );
        }
    }

    /**
     * setup
     *
     * @return void
     */
    abstract protected function setup();

    /**
     * clear
     *
     * @return void
     */
    protected function clear()
    {
        if ($days = $this->option('clear')) {
            $clearDate = Carbon::now()->subDays($days)->format('Y-m-d H:i:s');

            $this->info("-> Carrier Speedy Parcel Tracking : Clearing entries older than: {$clearDate}");

            CarrierSpeedyTracking::where('created_at', '<=', $clearDate)->delete();
        }
    }

    /**
     * track
     *
     * @return void
     */
    protected function track()
    {
        $bar = $this->output->createProgressBar(
            count($this->parcels)
        );

        $bar->start();

        if (!empty($this->parcels)) {
            $trackingInfo = Speedy::track(
                $this->prepareParcelRequest()
            );

            if (!empty($trackingInfo)) {
                $this->processTracking($trackingInfo, $bar);
            }
        }

        $bar->finish();
    }

    /**
     * prepareParcelRequest
     *
     * @return object
     */
    protected function prepareParcelRequest(): object
    {
        $data = [];

        foreach ($this->parcels as $parcel) {
            $data[] = ['id' => $parcel];
        }

        return new Request([
            'parcels' => $data,
        ]);
    }

    /**
     * processTracking
     *
     * @param  array $trackingInfo
     * @param  mixed $bar
     * @return void
     */
    protected function processTracking(array $trackingInfo, $bar)
    {
        foreach ($trackingInfo as $tracking) {
            CarrierSpeedyTracking::updateOrCreate(
                [
                    'parcel_id' => $tracking['parcelId'],
                ],
                [
                    'carrier_signature' => Speedy::getSignature(),
                    'carrier_account' => Speedy::getUserName(),
                    'meta' => $tracking['operations'],
                ]
            );

            if (!$this->muteEvents) {
                CarrierSpeedyTrackingEvent::dispatch(
                    array_pop($tracking['operations']),
                    Speedy::getUserName()
                );
            }

            $bar->advance();
        }
    }
}
