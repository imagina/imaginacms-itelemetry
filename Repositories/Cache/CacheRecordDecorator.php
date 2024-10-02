<?php

namespace Modules\Itelemetry\Repositories\Cache;

use Modules\Itelemetry\Repositories\RecordRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheRecordDecorator extends BaseCacheCrudDecorator implements RecordRepository
{
    public function __construct(RecordRepository $record)
    {
        parent::__construct();
        $this->entityName = 'itelemetry.records';
        $this->repository = $record;
    }
}
