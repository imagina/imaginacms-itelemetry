<?php

namespace Modules\Itelemetry\Repositories\Cache;

use Modules\Itelemetry\Repositories\LogRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheLogDecorator extends BaseCacheCrudDecorator implements LogRepository
{
    public function __construct(LogRepository $log)
    {
        parent::__construct();
        $this->entityName = 'itelemetry.logs';
        $this->repository = $log;
    }
}
