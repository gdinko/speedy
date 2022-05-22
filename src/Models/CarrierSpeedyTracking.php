<?php

namespace Gdinko\Speedy\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Gdinko\Speedy\Models\CarrierSpeedyTracking
 *
 * @property int $id
 * @property int $parcel_id
 * @property array|null $meta
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyTracking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyTracking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyTracking query()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyTracking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyTracking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyTracking whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyTracking whereParcelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyTracking whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CarrierSpeedyTracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'carrier_signature',
        'carrier_account',
        'parcel_id',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];
}
