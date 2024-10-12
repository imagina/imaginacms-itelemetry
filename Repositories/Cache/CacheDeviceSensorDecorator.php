<?php

namespace Modules\Itelemetry\Repositories\Cache;

use Modules\Itelemetry\Repositories\DeviceSensorRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheDeviceSensorDecorator extends BaseCacheCrudDecorator implements DeviceSensorRepository
{
    public function __construct(DeviceSensorRepository $devicesensor)
    {
        parent::__construct();
        $this->entityName = 'itelemetry.devicesensors';
        $this->repository = $devicesensor;
    }
}
