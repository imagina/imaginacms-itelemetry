<?php

namespace Modules\Itelemetry\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Itelemetry\Entities\RecordSensor;
use Modules\Itelemetry\Repositories\RecordSensorRepository;

class RecordSensorApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(RecordSensor $model, RecordSensorRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
}
