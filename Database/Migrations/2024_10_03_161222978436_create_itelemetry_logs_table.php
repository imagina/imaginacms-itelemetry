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
    Schema::create('itelemetry__logs', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      // Your fields...
      $table->integer('record_id')->unsigned();
      $table->foreign('record_id')->references('id')->on('itelemetry__records')->onDelete('cascade');
      $table->integer('sensor_id')->unsigned();
      $table->foreign('sensor_id')->references('id')->on('itelemetry__sensors')->onDelete('cascade');
      $table->float('value', 5, 2);
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
    Schema::dropIfExists('itelemetry__logs');
  }
};
