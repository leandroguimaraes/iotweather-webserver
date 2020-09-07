<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use App\Sensor;
use App\SensorMeasurement;

class SensorMeasurementService
{
	protected $_repository;

	public function __construct(SensorMeasurement $repository)
	{
		$this->_repository = $repository;
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
}
