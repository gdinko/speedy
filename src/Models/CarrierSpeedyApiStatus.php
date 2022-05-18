<?php

namespace Gdinko\Speedy\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Gdinko\Speedy\Models\CarrierSpeedyApiStatus
 *
 * @property int $id
 * @property int $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyApiStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyApiStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyApiStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyApiStatus whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyApiStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyApiStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyApiStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CarrierSpeedyApiStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
    ];
}
