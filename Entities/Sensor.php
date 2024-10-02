<?php

namespace Modules\Itelemetry\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;

class Sensor extends CrudModel
{
  use Translatable;

  protected $table = 'itelemetry__sensors';
  public $transformer = 'Modules\Itelemetry\Transformers\SensorTransformer';
  public $repository = 'Modules\Itelemetry\Repositories\SensorRepository';
  public $requestValidation = [
      'create' => 'Modules\Itelemetry\Http\Requests\CreateSensorRequest',
      'update' => 'Modules\Itelemetry\Http\Requests\UpdateSensorRequest',
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
  public $translatedAttributes = ['title'];
  protected $fillable = [
    'system_name'
  ];
}
