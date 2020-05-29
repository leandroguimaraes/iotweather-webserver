<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SensorMeasurement;
use App\Sensor;

class SensorMeasurementController extends Controller
{
    public function create(Request $request)
    {
        $sensor = Sensor::where('users_id', Auth::user()->id)->first();

        $request->merge(['sensors_id' => $sensor->id]);
        $request->merge(['lat' => $sensor->lat]);
        $request->merge(['long' => $sensor->long]);

        if (empty($request->measured_at))
        {
            $request->merge(['measured_at' => gmdate('Y-m-d H:i:s')]);
        }

        SensorMeasurement::create($request->all());

        return response(null, 204);
    }
}
