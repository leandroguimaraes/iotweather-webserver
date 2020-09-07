<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Enums\SystemConfigKeyEnum;

class SystemConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('system_configs')->insert([
            'key' => SystemConfigKeyEnum::MEASUREMENTS_INTERVAL,
            'value' => '60',
            'created_at' => gmdate('Y-m-d H:i:s')
        ]);
    }
}
