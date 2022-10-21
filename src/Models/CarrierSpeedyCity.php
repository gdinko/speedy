<?php

namespace Gdinko\Speedy\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Gdinko\Speedy\Models\CarrierSpeedyCity
 *
 * @property int $id
 * @property int|null $speedy_city_id
 * @property string|null $country_code3
 * @property int $country_id
 * @property string|null $post_code
 * @property string|null $name
 * @property string|null $name_en
 * @property string|null $municipality
 * @property string|null $municipality_en
 * @property string|null $region_name
 * @property string|null $region_name_en
 * @property array|null $meta
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Gdinko\Speedy\Models\CarrierSpeedyOffice[] $offices
 * @property-read int|null $offices_count
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCity query()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCity whereCountryCode3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCity whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCity whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCity whereMunicipality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCity whereMunicipalityEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCity whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCity whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCity wherePostCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCity whereRegionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCity whereRegionNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCity whereSpeedyCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CarrierSpeedyCity extends Model
{
    use HasFactory;

    protected $fillable = [
        'speedy_city_id',
        'country_code3',
        'country_id',
        'post_code',
        'name',
        'name_en',
        'municipality',
        'municipality_en',
        'region_name',
        'region_name_en',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function offices()
    {
        return $this->hasMany(
            CarrierSpeedyOffice::class,
            'site_id',
            'speedy_city_id'
        );
    }
}
