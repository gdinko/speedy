<?php

namespace Gdinko\Speedy\Commands;

use Gdinko\Speedy\Events\CarrierSpeedyPaymentEvent;
use Gdinko\Speedy\Exceptions\SpeedyImportValidationException;
use Gdinko\Speedy\Facades\Speedy;
use Gdinko\Speedy\Hydrators\Request;
use Gdinko\Speedy\Models\CarrierSpeedyPayment;
use Gdinko\Speedy\Traits\ValidatesImport;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class GetCarrierSpeedyPayments extends Command
{
    use ValidatesImport;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'speedy:get-payments {--date_from=} {--date_to=} {--clear= : Clear Database table from records older than X days} {--timeout=20 : Speedy API Call timeout}';

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
        $this->info('-> Carrier Speedy Import Payments');

        try {
            $this->clear();

            Speedy::setTimeout(
                $this->option('timeout')
            );

            $dateFrom = $this->option('date_from') ?: date('Y-m-d');
            $dateTo = $this->option('date_to') ?: date('Y-m-d');

            $this->info("Date From: {$dateFrom} - Date To: {$dateTo}");

            $this->import($dateFrom, $dateTo);

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
     * clear
     *
     * @return void
     */
    protected function clear()
    {
        if ($days = $this->option('clear')) {

            $clearDate = Carbon::now()->subDays($days)->format('Y-m-d H:i:s');

            $this->info("-> Carrier Speedy Import Payments : Clearing entries older than: {$clearDate}");

            CarrierSpeedyPayment::where('created_at', '<=', $clearDate)->delete();
        }
    }

    /**
     * import
     *
     * @param  mixed $dateFrom
     * @param  mixed $dateTo
     * @return void
     */
    protected function import($dateFrom, $dateTo)
    {
        $payments = Speedy::payments(new Request([
            'fromDate' => $dateFrom,
            'toDate' => $dateTo,
            'includeDetails' => true,
        ]));

        $bar = $this->output->createProgressBar($payments['totalPayouts'] ?: 0);

        $bar->start();

        if (!empty($payments['payouts'])) {
            foreach ($payments['payouts'] as $payment) {
                $validated = $this->validated($payment);

                foreach ($validated['details'] as $paymentDetail) {
                    $carrierSpeedyPayment = CarrierSpeedyPayment::create([
                        'doc_id' => $validated['docId'],
                        'shipment_id' => $paymentDetail['shipmentId'],
                        'order' => $paymentDetail['order'],
                        'date' => $validated['date'],
                        'doc_type' => $validated['docType'],
                        'payment_type' => $validated['paymentType'],
                        'payee' => $validated['payee'],
                        'currency' => $paymentDetail['currency'],
                        'amount' => $paymentDetail['amount'],
                        'pickup_date' => $paymentDetail['pickupDate'],
                        'primary_shipment_pickup_date' => $paymentDetail['primaryShipmentPickupDate'],
                        'delivery_date' => $paymentDetail['deliveryDate'],
                        'sender' => $paymentDetail['sender'],
                        'recipient' => $paymentDetail['recipient'],
                        'note' => $paymentDetail['note'] ?? null,
                        'ref1' => $paymentDetail['ref1'] ?? null,
                        'ref2' => $paymentDetail['ref2'] ?? null,
                    ]);

                    CarrierSpeedyPaymentEvent::dispatch($carrierSpeedyPayment);
                }

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
            'docId' => 'integer|required',
            'date' => 'date|required',
            'docType' => 'string|required',
            'paymentType' => 'string|required',
            'payee' => 'string|required',
            'details' => 'array|required',
            'details.*.shipmentId' => 'string|required',
            'details.*.order' => 'integer|required',
            'details.*.currency' => 'string|required',
            'details.*.amount' => 'numeric|required',
            'details.*.pickupDate' => 'date|',
            'details.*.primaryShipmentPickupDate' => 'date|',
            'details.*.deliveryDate' => 'date|',
            'details.*.sender' => 'string|required',
            'details.*.recipient' => 'string|required',
            'details.*.note' => 'string|sometimes',
            'details.*.ref1' => 'string|sometimes',
            'details.*.ref2' => 'string|sometimes',
        ];
    }
}
