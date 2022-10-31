<?php

namespace Gdinko\Speedy\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Gdinko\Speedy\Models\CarrierSpeedyOffice
 *
 * @property int $id
 * @property int $speedy_office_id
 * @property int $speedy_country_id
 * @property string $name
 * @property string|null $name_en
 * @property int $site_id
 * @property string $type
 * @property int|null $nearby_office_id
 * @property array|null $address
 * @property array|null $max_parcel_dimensions
 * @property array|null $working_time_schedule
 * @property array|null $cargo_types_allowed
 * @property array|null $meta
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyOffice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyOffice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyOffice query()
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyOffice whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyOffice whereCargoTypesAllowed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyOffice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyOffice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyOffice whereMaxParcelDimensions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyOffice whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyOffice whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyOffice whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyOffice whereNearbyOfficeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyOffice whereSiteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyOffice whereSpeedyCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyOffice whereSpeedyOfficeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyOffice whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyOffice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyOffice whereWorkingTimeSchedule($value)
 * @mixin \Eloquent
 * @property string|null $city_uuid
 * @property int|null $is_robot
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyOffice whereCityUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarrierSpeedyOffice whereIsRobot($value)
 */
class CarrierSpeedyOffice extends Model
{
    use HasFactory;

    protected $fillable = [
        'speedy_office_id',
        'speedy_country_id',
        'name',
        'name_en',
        'site_id',
        'city_uuid',
        'type',
        'is_robot',
        'nearby_office_id',
        'address',
        'max_parcel_dimensions',
        'working_time_schedule',
        'cargo_types_allowed',
        'meta',
    ];

    protected $casts = [
        'address' => 'array',
        'max_parcel_dimensions' => 'array',
        'working_time_schedule' => 'array',
        'cargo_types_allowed' => 'array',
        'meta' => 'array',
    ];
}
