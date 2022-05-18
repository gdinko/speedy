<?php

namespace Gdinko\Speedy\Commands;

use Gdinko\Speedy\Exceptions\SpeedyImportValidationException;
use Gdinko\Speedy\Facades\Speedy;
use Gdinko\Speedy\Hydrators\Request;
use Gdinko\Speedy\Models\CarrierSpeedyOffice;
use Gdinko\Speedy\Traits\ValidatesImport;
use Illuminate\Console\Command;

class SyncCarrierSpeedyOffices extends Command
{
    use ValidatesImport;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'speedy:sync-offices {country_id} {--timeout=20 : Speedy API Call timeout}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets Speedy offices and saves them in database';

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
        $this->info('-> Carrier Speedy Import Offices');

        try {
            Speedy::setTimeout(
                $this->option('timeout')
            );

            $this->import();

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
     * import
     *
     * @return void
     */
    protected function import()
    {
        $countryId = $this->argument('country_id');

        $offices = Speedy::findOffice(new Request([
            'countryId' => $countryId,
        ]));

        $bar = $this->output->createProgressBar(count($offices));

        $bar->start();

        if (! empty($offices)) {
            CarrierSpeedyOffice::truncate();

            foreach ($offices as $office) {
                $validated = $this->validated($office);

                CarrierSpeedyOffice::create([
                    'speedy_office_id' => $validated['id'],
                    'speedy_country_id' => $countryId,
                    'name' => $validated['name'],
                    'name_en' => $validated['nameEn'],
                    'site_id' => $validated['siteId'],
                    'type' => $validated['type'],
                    'nearby_office_id' => $validated['nearbyOfficeId'],
                    'address' => $validated['address'],
                    'max_parcel_dimensions' => $validated['maxParcelDimensions'],
                    'working_time_schedule' => $validated['workingTimeSchedule'],
                    'cargo_types_allowed' => $validated['cargoTypesAllowed'],
                    'meta' => [
                        'workingTimeFrom' => $validated['workingTimeFrom'],
                        'workingTimeTo' => $validated['workingTimeTo'],
                        'workingTimeHalfFrom' => $validated['workingTimeHalfFrom'],
                        'workingTimeHalfTo' => $validated['workingTimeHalfTo'],
                        'workingTimeDayOffFrom' => $validated['workingTimeDayOffFrom'],
                        'workingTimeDayOffTo' => $validated['workingTimeDayOffTo'],
                        'sameDayDepartureCutoff' => $validated['sameDayDepartureCutoff'],
                        'sameDayDepartureCutoffHalf' => $validated['sameDayDepartureCutoffHalf'],
                        'sameDayDepartureCutoffDayOff' => $validated['sameDayDepartureCutoffDayOff'],
                        'maxParcelWeight' => $validated['maxParcelWeight'],
                        'pickUpAllowed' => $validated['pickUpAllowed'],
                        'dropOffAllowed' => $validated['dropOffAllowed'],
                        'cardPaymentAllowed' => $validated['cardPaymentAllowed'],
                        'palletOffice' => $validated['palletOffice'],
                        'cashPaymentAllowed' => $validated['cashPaymentAllowed'],
                    ],
                ]);

                $bar->advance();
            }
        }

        $bar->finish();
    }

    /**
     * validationRules
     *
     * @return array
     */
    protected function validationRules(): array
    {
        return [
            'id' => 'numeric|required',
            'name' => 'string|required',
            'nameEn' => 'string|nullable',
            'siteId' => 'numeric|required',
            'address' => 'array|required',
            'workingTimeFrom' => 'string|nullable',
            'workingTimeTo' => 'string|nullable',
            'workingTimeHalfFrom' => 'string|nullable',
            'workingTimeHalfTo' => 'string|nullable',
            'workingTimeDayOffFrom' => 'string|nullable',
            'workingTimeDayOffTo' => 'string|nullable',
            'sameDayDepartureCutoff' => 'string|nullable',
            'sameDayDepartureCutoffHalf' => 'string|nullable',
            'sameDayDepartureCutoffDayOff' => 'string|nullable',
            'maxParcelDimensions' => 'array|nullable',
            'maxParcelWeight' => 'numeric|nullable',
            'type' => 'string|required',
            'nearbyOfficeId' => 'numeric|nullable',
            'workingTimeSchedule' => 'array|nullable',
            'cargoTypesAllowed' => 'array|nullable',
            'pickUpAllowed' => 'boolean|nullable',
            'dropOffAllowed' => 'boolean|nullable',
            'cardPaymentAllowed' => 'boolean|nullable',
            'palletOffice' => 'boolean|nullable',
            'cashPaymentAllowed' => 'boolean|nullable',
        ];
    }
}
