<?php

namespace Gdinko\Speedy\Commands;

use Gdinko\Speedy\Exceptions\SpeedyImportValidationException;
use Gdinko\Speedy\Facades\Speedy;
use Gdinko\Speedy\Hydrators\Request;
use Gdinko\Speedy\Models\CarrierSpeedyCountry;
use Gdinko\Speedy\Traits\ValidatesImport;
use Illuminate\Console\Command;

class SyncCarrierSpeedyCountries extends Command
{
    use ValidatesImport;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'speedy:sync-countries {--timeout=20 : Speedy API Call timeout}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets Speedy countries and saves them in database';

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
        $this->info('-> Carrier Speedy Import Countries');

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
        $countries = Speedy::getAllCountries(
            new Request()
        )->toArray();

        $bar = $this->output->createProgressBar(count($countries));

        $bar->start();

        if (! empty($countries)) {
            CarrierSpeedyCountry::truncate();

            foreach ($countries as $country) {
                $validated = $this->validated($country);

                CarrierSpeedyCountry::create([
                    'speedy_country_id' => $validated['id'],
                    'name' => $validated['name'],
                    'name_en' => $validated['nameEn'],
                    'iso_alpha2' => $validated['isoAlpha2'],
                    'iso_alpha3' => $validated['isoAlpha3'],
                    'post_code_formats' => $validated['postCodeFormats'],
                    'require_state' => \filter_var($validated['requireState'], FILTER_VALIDATE_BOOLEAN),
                    'address_type' => $validated['addressType'],
                    'currency_code' => $validated['currencyCode'],
                    'default_office_id' => $validated['defaultOfficeId'],
                    'street_types' => $validated['streetTypes'],
                    'street_types_en' => $validated['streetTypesEn'],
                    'complex_types' => $validated['complexTypes'],
                    'complex_types_en' => $validated['complexTypesEn'],
                    'site_nomen' => $validated['siteNomen'],
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
            'isoAlpha2' => 'string|required',
            'isoAlpha3' => 'string|required',
            'name' => 'string|required',
            'nameEn' => 'string|nullable',
            'postCodeFormats' => 'string|nullable',
            'requireState' => 'string|nullable',
            'addressType' => 'string|nullable',
            'currencyCode' => 'string|nullable',
            'defaultOfficeId' => 'string|nullable',
            'streetTypes' => 'string|nullable',
            'streetTypesEn' => 'string|nullable',
            'complexTypes' => 'string|nullable',
            'complexTypesEn' => 'string|nullable',
            'siteNomen' => 'string|nullable',
        ];
    }
}
