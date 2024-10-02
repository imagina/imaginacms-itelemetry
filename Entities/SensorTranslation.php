<?php

namespace Modules\Itelemetry\Entities;

use Illuminate\Database\Eloquent\Model;

class SensorTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title'];
    protected $table = 'itelemetry__sensor_translations';
}
