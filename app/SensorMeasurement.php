<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SensorMeasurement extends Model
{
    protected $fillable = ['sensors_id', 'temperature', 'humidity', 'measured_at', 'lat', 'long'];
}
