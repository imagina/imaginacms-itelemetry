<?php

namespace Modules\Itelemetry\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Itelemetry\Entities\Log;
use Modules\Itelemetry\Repositories\LogRepository;

class LogApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(Log $model, LogRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
}
