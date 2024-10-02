<?php

namespace Modules\Itelemetry\Entities;

use Illuminate\Database\Eloquent\Model;

class DeviceTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title'];
    protected $table = 'itelemetry__device_translations';
}
