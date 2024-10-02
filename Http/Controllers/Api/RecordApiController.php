<?php

namespace Modules\Itelemetry\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Itelemetry\Entities\Record;
use Modules\Itelemetry\Repositories\RecordRepository;

class RecordApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(Record $model, RecordRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
}
