<?php

namespace Modules\Itelemetry\Entities;

use Modules\Core\Icrud\Entities\CrudModel;

class Log extends CrudModel
{
  protected $table = 'itelemetry__logs';
  public $transformer = 'Modules\Itelemetry\Transformers\LogTransformer';
  public $repository = 'Modules\Itelemetry\Repositories\LogRepository';
  public $requestValidation = [
      'create' => 'Modules\Itelemetry\Http\Requests\CreateLogRequest',
      'update' => 'Modules\Itelemetry\Http\Requests\UpdateLogRequest',
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
