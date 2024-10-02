<?php

namespace Modules\Itelemetry\Repositories\Cache;

use Modules\Itelemetry\Repositories\DeviceRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheDeviceDecorator extends BaseCacheCrudDecorator implements DeviceRepository
{
    public function __construct(DeviceRepository $device)
    {
        parent::__construct();
        $this->entityName = 'itelemetry.devices';
        $this->repository = $device;
    }
}
