<?php

namespace i8086\SchedulerViewer;

use Illuminate\Support\Facades\Facade as LaravelFacade;

class Facade extends LaravelFacade
{
    protected static function getFacadeAccessor()
    {
        return 'SchedulerViewer';
    }
}
