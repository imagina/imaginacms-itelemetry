<?php

namespace Modules\Itelemetry\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Itelemetry\Entities\DeviceSensor;
use Modules\Itelemetry\Repositories\DeviceSensorRepository;

class DeviceSensorApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(DeviceSensor $model, DeviceSensorRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
}
