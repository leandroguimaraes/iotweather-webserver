<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = DB::table('users')->insertGetId([
            'name' => 'IoT 1',
            'email' => 'iot@no-mail.com',
            'password' => Hash::make('12345678'),
            'created_at' => gmdate('Y-m-d H:i:s')
        ]);

        DB::table('sensors')->insert([
            'lat' => '0',
            'long' => '0',
            'users_id' => $user_id,
            'created_at' => gmdate('Y-m-d H:i:s')
        ]);
    }
}
