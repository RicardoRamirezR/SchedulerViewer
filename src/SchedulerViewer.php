<?php

namespace i8086\SchedulerViewer;

use Illuminate\Support\Facades\Artisan;

class SchedulerViewer
{
    public function index()
    {
        $exitCode = Artisan::call('schedule:show', ['--raw' => '--raw']);

        return Artisan::output();
    }
}
