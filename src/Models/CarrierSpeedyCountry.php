<?php

namespace Gdinko\Speedy\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
