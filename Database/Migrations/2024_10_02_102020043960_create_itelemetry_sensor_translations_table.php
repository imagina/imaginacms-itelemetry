<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('itelemetry__sensor_translations', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      $table->string('title');

      $table->integer('sensor_id')->unsigned();
      $table->string('locale')->index();
      $table->unique(['sensor_id', 'locale']);
      $table->foreign('sensor_id')->references('id')->on('itelemetry__sensors')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('itelemetry__sensor_translations', function (Blueprint $table) {
      $table->dropForeign(['sensor_id']);
    });
    Schema::dropIfExists('itelemetry__sensor_translations');
  }
};
