<?php

namespace App\Services;

use App\SystemConfig;

class SystemConfigService
{
    public function GetByKey($key)
    {
        return SystemConfig::where('key', '=', $key)
                            ->select('value')
                            ->firstOrFail();
    }
}
