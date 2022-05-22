<?php

namespace Gdinko\Speedy\Commands;

use Gdinko\Speedy\Facades\Speedy;
use Gdinko\Speedy\Hydrators\Request;
use Gdinko\Speedy\Models\CarrierSpeedyApiStatus;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class GetCarrierSpeedyApiStatus extends Command
{
    public const API_STATUS_OK = 200;
    public const API_STATUS_NOT_OK = 404;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'speedy:api-status
                            {--clear= : Clear Database table from records older than X days}
                            {--timeout=5 : Speedy API Call timeout}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets Speedy API Status and saves it in database';

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
        $this->info('-> Carrier Speedy Api Status');

        try {
            $this->clear();

            Speedy::setTimeout(
                $this->option('timeout')
            );

            $response = Speedy::getOwnClientId(new Request([]));

            if (!empty($response['clientId'])) {
                CarrierSpeedyApiStatus::create([
                    'code' => self::API_STATUS_OK,
                ]);

                $this->info('Status: ' . self::API_STATUS_OK);
            }
        } catch (\Exception $e) {
            CarrierSpeedyApiStatus::create([
                'code' => self::API_STATUS_NOT_OK,
            ]);

            $this->newLine();
            $this->error('Status: ' . self::API_STATUS_NOT_OK);
            $this->error(
                $e->getMessage()
            );
        }

        return 0;
    }

    /**
     * clear
     *
     * @return void
     */
    protected function clear()
    {
        if ($days = $this->option('clear')) {
            $clearDate = Carbon::now()->subDays($days)->format('Y-m-d H:i:s');

            $this->info("-> Carrier Speedy Api Status : Clearing entries older than: {$clearDate}");

            CarrierSpeedyApiStatus::where('created_at', '<=', $clearDate)->delete();
        }
    }
}
