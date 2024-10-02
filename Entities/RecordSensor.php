<?php

namespace Modules\Itelemetry\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;

class RecordSensor extends CrudModel
{
  use Translatable;

  protected $table = 'itelemetry__recordsensors';
  public $transformer = 'Modules\Itelemetry\Transformers\RecordSensorTransformer';
  public $repository = 'Modules\Itelemetry\Repositories\RecordSensorRepository';
  public $requestValidation = [
      'create' => 'Modules\Itelemetry\Http\Requests\CreateRecordSensorRequest',
      'update' => 'Modules\Itelemetry\Http\Requests\UpdateRecordSensorRequest',
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
  public $translatedAttributes = [];
  protected $fillable = [
    'record_id',
    'sensor_id',
    'value'
  ];

  public function sensor()
  {
    return $this->belongsTo(Sensor::class);
  }

  public function record()
  {
    return $this->belongsTo(Record::class);
  }

}
