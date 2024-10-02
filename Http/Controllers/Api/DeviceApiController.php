<?php

namespace Modules\Itelemetry\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Itelemetry\Entities\Device;
use Modules\Itelemetry\Repositories\DeviceRepository;

class DeviceApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(Device $model, DeviceRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
}
