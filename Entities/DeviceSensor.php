<?php

namespace Modules\Itelemetry\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;

class DeviceSensor extends CrudModel
{
  protected $table = 'itelemetry__device_sensors';
  public $transformer = 'Modules\Itelemetry\Transformers\DeviceSensorTransformer';
  public $repository = 'Modules\Itelemetry\Repositories\DeviceSensorRepository';
  public $requestValidation = [
      'create' => 'Modules\Itelemetry\Http\Requests\CreateDeviceSensorRequest',
      'update' => 'Modules\Itelemetry\Http\Requests\UpdateDeviceSensorRequest',
    ];
  //Instance external/internal events to dispatch with extraData
  public $dispatchesEventsWithBindings = [
    //eg. ['path' => 'path/module/event', 'extraData' => [/*...optional*/]]
    'created' => [],
    'creating' => [],
    'updated' => [],
    'updating' => [],
    'deleting' => [],
    'deleted' => []
  ];
  protected $fillable = [
    'device_id',
    'sensor_id',
  ];

  public function device()
  {
    return $this->belongsTo(Device::class);
  }

  public function sensor()
  {
    return $this->belongsTo(Sensor::class);
  }


}
