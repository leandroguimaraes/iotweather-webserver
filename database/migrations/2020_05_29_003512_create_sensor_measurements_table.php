<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_measurements', function (Blueprint $table) {
            $table->id();
            $table->decimal('temperature', 8, 2);
            $table->decimal('humidity', 8, 2);
            $table->dateTime('measured_at', 0);
            $table->decimal('lat', 9, 6);
            $table->decimal('long', 9, 6);
            $table->timestamps();

            $table->foreignId('sensors_id')
                    ->constrained('sensors')
                    ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensor_measurements');
    }
}
