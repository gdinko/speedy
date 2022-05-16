<?php

namespace Gdinko\Speedy\Commands;

use Illuminate\Console\Command;

class GetCarrierSpeedyPayments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'speedy:get-payments {--date_from=} {--date_to=} {--timeout=20 : Speedy API Call timeout}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets Speedy payments and saves them in database';

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
        return 0;
    }
}
