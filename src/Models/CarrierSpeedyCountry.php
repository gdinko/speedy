<?php

namespace Gdinko\Speedy\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Gdinko\Speedy\Models\CarrierSpeedyCountry
 *
 * @property int $id
 * @property int $speedy_country_id
 * @property string $name
 * @property string|null $name_en
 * @property string $iso_alpha2
 * @property string $iso_alpha3
 * @property string|null $post_code_formats
 * @property int|null $require_state
 * @property string|null $address_type
 * @property string|null $currency_code
 * @property string|null $default_office_id
 * @property string|null $street_types
 * @property string|null $street_types_en
 * @property string|null $complex_types
 * @property string|null $complex_types_en
 * @property string|null $site_nomen
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCountry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCountry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCountry query()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCountry whereAddressType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCountry whereComplexTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCountry whereComplexTypesEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCountry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCountry whereCurrencyCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCountry whereDefaultOfficeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCountry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCountry whereIsoAlpha2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCountry whereIsoAlpha3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCountry whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCountry whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCountry wherePostCodeFormats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCountry whereRequireState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCountry whereSiteNomen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCountry whereSpeedyCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCountry whereStreetTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCountry whereStreetTypesEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyCountry whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CarrierSpeedyCountry extends Model
{
    use HasFactory;

    protected $fillable = [
        'speedy_country_id',
        'name',
        'name_en',
        'iso_alpha2',
        'iso_alpha3',
        'post_code_formats',
        'require_state',
        'address_type',
        'currency_code',
        'default_office_id',
        'street_types',
        'street_types_en',
        'complex_types',
        'complex_types_en',
        'site_nomen',
    ];
}
