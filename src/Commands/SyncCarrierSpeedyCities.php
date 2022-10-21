<?php

namespace Gdinko\Speedy\Commands;

use Gdinko\Speedy\Exceptions\SpeedyImportValidationException;
use Gdinko\Speedy\Facades\Speedy;
use Gdinko\Speedy\Hydrators\Request;
use Gdinko\Speedy\Models\CarrierSpeedyCity;
use Gdinko\Speedy\Models\CarrierSpeedyCountry;
use Gdinko\Speedy\Traits\ValidatesImport;
use Illuminate\Console\Command;

class SyncCarrierSpeedyCities extends Command
{
    use ValidatesImport;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'speedy:sync-cities
                            {country_id}
                            {--timeout=20 : Speedy API Call timeout}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets Speedy cities and saves them in database';

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
        $this->info('-> Carrier Speedy Import Cities');

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

        $country = CarrierSpeedyCountry::where(
            'speedy_country_id',
            $countryId
        )->firstOrFail();

        $cities = Speedy::getAllSites(
            $countryId,
            new Request([])
        )->toArray();

        $bar = $this->output->createProgressBar(count($cities));

        $bar->start();

        if (! empty($cities)) {
            CarrierSpeedyCity::truncate();

            foreach ($cities as $city) {
                $validated = $this->validated($city);

                //speedy dummy data ?
                if ($validated['id'] == 100999999) {
                    continue;
                }

                CarrierSpeedyCity::create([
                    'speedy_city_id' => $validated['id'],
                    'country_code3' => $country->iso_alpha3,
                    'country_id' => $country->speedy_country_id,
                    'post_code' => $validated['postCode'],
                    'name' => $validated['name'],
                    'name_en' => $validated['nameEn'],
                    'municipality' => $validated['municipality'],
                    'municipality_en' => $validated['municipalityEn'],
                    'region_name' => $validated['region'],
                    'region_name_en' => $validated['regionEn'],
                    'meta' => $validated,
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
            'id' => 'integer|required',
            'countryId' => 'integer|required',
            'name' => 'string|required',
            'nameEn' => 'string|nullable',
            'municipality' => 'string|nullable',
            'municipalityEn' => 'string|nullable',
            'region' => 'string|nullable',
            'regionEn' => 'string|nullable',
            'postCode' => 'string|nullable',
            'addressNomenclature' => 'string|nullable',
            'x' => 'string|nullable',
            'y' => 'string|nullable',
            'servingDays' => 'string|nullable',
            'servingOfficeId' => 'integer|nullable',
            'servingHubOfficeId' => 'integer|nullable',
        ];
    }
}
