<?php

namespace Gdinko\Speedy\Commands;

use Gdinko\Speedy\Exceptions\SpeedyImportValidationException;
use Gdinko\Speedy\Facades\Speedy;
use Gdinko\Speedy\Hydrators\Request;
use Gdinko\Speedy\Models\CarrierCityMap;
use Gdinko\Speedy\Models\CarrierSpeedyCountry;
use Gdinko\Speedy\Models\CarrierSpeedyOffice;
use Gdinko\Speedy\Traits\ValidatesImport;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class MapCarrierSpeedyCities extends Command
{
    use ValidatesImport;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'speedy:map-cities
                            {country_id}
                            {--timeout=20 : Speedy API Call timeout}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets Speedy cities and makes carriers city map in database';

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
        $this->info('-> Carrier Speedy Map Cities');

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

        if (! CarrierSpeedyOffice::where('speedy_country_id', $countryId)->count()) {
            $this->newLine();
            $this->warn('[WARN] Import speedy offices first to map office city ...');
            $this->newLine();
        }

        $bar = $this->output->createProgressBar(count($cities));

        $bar->start();

        if (! empty($cities)) {
            CarrierCityMap::where(
                'carrier_signature',
                Speedy::getSignature()
            )
                ->where('country_code', $country->iso_alpha3)
                ->delete();

            foreach ($cities as $city) {
                $validated = $this->validated($city);

                //speedy dummy data ?
                if ($validated['id'] == 100999999) {
                    continue;
                }

                $name = $this->normalizeCityName(
                    $validated['name']
                );

                $nameSlug = $this->getSlug($name);

                $slug = $this->getSlug(
                    $nameSlug . ' ' . $validated['postCode']
                );

                $data = [
                    'carrier_signature' => Speedy::getSignature(),
                    'carrier_city_id' => $validated['id'],
                    'country_code' => $country->iso_alpha3,
                    'region' => Str::title($validated['region']),
                    'name' => $name,
                    'name_slug' => $nameSlug,
                    'post_code' => $validated['postCode'],
                    'slug' => $slug,
                    'uuid' => $this->getUuid($slug),
                ];

                CarrierCityMap::create(
                    $data
                );

                //set city_uuid to all offices with this site_id
                CarrierSpeedyOffice::where(
                    'site_id',
                    $validated['id']
                )->update([
                    'city_uuid' => $data['uuid'],
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
            'region' => 'string|nullable',
            'regionEn' => 'string|nullable',
            'postCode' => 'string|nullable',
        ];
    }

    /**
     * normalizeCityName
     *
     * @param  string $name
     * @return string
     */
    protected function normalizeCityName(string $name): string
    {
        return Str::title(
            explode(',', $name)[0]
        );
    }

    /**
     * getSlug
     *
     * @param  string $string
     * @return string
     */
    protected function getSlug(string $string): string
    {
        return Str::slug($string);
    }

    /**
     * getUuid
     *
     * @param  string $string
     * @return string
     */
    protected function getUuid(string $string): string
    {
        return Uuid::uuid5(
            Uuid::NAMESPACE_URL,
            $string
        )->toString();
    }
}
