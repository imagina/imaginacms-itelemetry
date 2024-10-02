<?php

namespace Modules\Itelemetry\Repositories\Cache;

use Modules\Itelemetry\Repositories\SensorRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheSensorDecorator extends BaseCacheCrudDecorator implements SensorRepository
{
    public function __construct(SensorRepository $sensor)
    {
        parent::__construct();
        $this->entityName = 'itelemetry.sensors';
        $this->repository = $sensor;
    }
}
