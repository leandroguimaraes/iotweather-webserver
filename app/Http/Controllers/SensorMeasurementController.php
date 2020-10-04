<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\SensorMeasurementService;

class SensorMeasurementController extends Controller
{
    protected $_sensorMeasurementService;

    public function __construct(SensorMeasurementService $sensorMeasurementService)
    {
        $this->_sensorMeasurementService = $sensorMeasurementService;
    }

    public function create(Request $request)
    {
        $this->_sensorMeasurementService->Create(
            Auth::user()->id,
            $request->only([
                'temperature',
                'humidity',
                'measured_at'
            ])
        );

        return response($this->_sensorMeasurementService->GetInterval(), 200);
    }
}
