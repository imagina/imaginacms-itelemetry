<?php

namespace Modules\Itelemetry\Repositories\Cache;

use Modules\Itelemetry\Repositories\RecordSensorRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheRecordSensorDecorator extends BaseCacheCrudDecorator implements RecordSensorRepository
{
    public function __construct(RecordSensorRepository $recordsensor)
    {
        parent::__construct();
        $this->entityName = 'itelemetry.recordsensors';
        $this->repository = $recordsensor;
    }
}
