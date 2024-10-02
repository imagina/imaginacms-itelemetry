<?php

namespace Modules\Itelemetry\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;

class Record extends CrudModel
{
  use Translatable;

  protected $table = 'itelemetry__records';
  public $transformer = 'Modules\Itelemetry\Transformers\RecordTransformer';
  public $repository = 'Modules\Itelemetry\Repositories\RecordRepository';
  public $requestValidation = [
      'create' => 'Modules\Itelemetry\Http\Requests\CreateRecordRequest',
      'update' => 'Modules\Itelemetry\Http\Requests\UpdateRecordRequest',
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
    'device_id'
  ];

  public function device()
  {
    return $this->belongsTo(Device::class);
  }
}
