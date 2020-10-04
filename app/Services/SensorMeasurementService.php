<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use App\Enums\SystemConfigKeyEnum;
use App\Sensor;
use App\SensorMeasurement;

class SensorMeasurementService
{
    protected $_repository;
    protected $_systemConfigService;

	public function __construct(
        SensorMeasurement $repository,
        SystemConfigService $systemConfigService
        )
	{
        $this->_repository = $repository;
        $this->_systemConfigService = $systemConfigService;
    }

    public function Create($user_id, $data)
    {
        $validator = Validator::make($data, [
            'temperature' => 'required',
            'humidity' => 'required'
        ]);

        if ($validator->fails())
        {
            throw new \InvalidArgumentException($validator->errors());
        }

        $sensor = Sensor::where('users_id', $user_id)->firstOrFail();

        $data['sensors_id'] = $sensor->id;
        $data['lat'] = $sensor->lat;
        $data['long'] = $sensor->long;

        if (empty($data['measured_at']))
        {
            $data['measured_at'] = gmdate('Y-m-d H:i:s');
        }

        return SensorMeasurement::create($data);
    }

    public function GetInterval()
    {
        $interval = $this->_systemConfigService->GetByKey(SystemConfigKeyEnum::MEASUREMENTS_INTERVAL);
        return $interval->value * 1000;
    }
}
