<?php

namespace Modules\Itelemetry\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Itelemetry\Entities\Sensor;
use Modules\Itelemetry\Repositories\SensorRepository;

class SensorApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(Sensor $model, SensorRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
}
