<?php

namespace Gdinko\Speedy\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarrierSpeedyApiStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
    ];
}
