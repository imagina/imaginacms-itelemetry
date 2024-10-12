<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('itelemetry__device_sensors', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      $table->integer('device_id')->unsigned();
      $table->foreign('device_id')->references('id')->on('itelemetry__devices')->onDelete('cascade');
      $table->integer('sensor_id')->unsigned();
      $table->foreign('sensor_id')->references('id')->on('itelemetry__sensors')->onDelete('cascade');

      // Audit fields
      $table->timestamps();
      $table->auditStamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('itelemetry__devicesensors');
  }
};
