<?php

namespace Gdinko\Speedy\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Gdinko\Speedy\Models\CarrierCityMap
 *
 * @property int $id
 * @property string $carrier_signature
 * @property int $carrier_city_id
 * @property string $country_code
 * @property string|null $region
 * @property string $name
 * @property string $name_slug
 * @property string $post_code
 * @property string $slug
 * @property string $uuid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierCityMap newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierCityMap newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierCityMap query()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierCityMap whereCarrierCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierCityMap whereCarrierSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierCityMap whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierCityMap whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierCityMap whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierCityMap whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierCityMap whereNameSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierCityMap wherePostCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierCityMap whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierCityMap whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierCityMap whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierCityMap whereUuid($value)
 * @mixin \Eloquent
 */
class CarrierCityMap extends Model
{
    use HasFactory;

    protected $table = 'carrier_city_map';

    protected $fillable = [
        'carrier_signature',
        'carrier_city_id',
        'country_code',
        'region',
        'name',
        'name_slug',
        'post_code',
        'slug',
        'uuid',
    ];
}
