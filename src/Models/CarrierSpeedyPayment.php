<?php

namespace Gdinko\Speedy\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarrierSpeedyPayment extends Model
{
    use HasFactory;

    protected $fillable = [
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
