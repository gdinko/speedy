<?php

namespace Gdinko\Speedy\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Gdinko\Speedy\Models\CarrierSpeedyPayment
 *
 * @property int $id
 * @property int $doc_id
 * @property string $shipment_id
 * @property int $order
 * @property string $date
 * @property string $doc_type
 * @property string $payment_type
 * @property string $payee
 * @property string $currency
 * @property string $amount
 * @property string $pickup_date
 * @property string $primary_shipment_pickup_date
 * @property string $delivery_date
 * @property string $sender
 * @property string $recipient
 * @property string|null $note
 * @property string|null $ref1
 * @property string|null $ref2
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment query()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment whereDeliveryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment whereDocId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment whereDocType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment wherePayee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment wherePickupDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment wherePrimaryShipmentPickupDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment whereRecipient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment whereRef1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment whereRef2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment whereSender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment whereShipmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $carrier_signature
 * @property string $carrier_account
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment whereCarrierAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyPayment whereCarrierSignature($value)
 */
class CarrierSpeedyPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'carrier_signature',
        'carrier_account',
        'doc_id',
        'shipment_id',
        'order',
        'date',
        'doc_type',
        'payment_type',
        'payee',
        'currency',
        'amount',
        'pickup_date',
        'primary_shipment_pickup_date',
        'delivery_date',
        'sender',
        'recipient',
        'note',
        'ref1',
        'ref2',
    ];
}
