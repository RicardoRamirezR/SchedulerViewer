<?php

namespace i8086\SchedulerViewer\Test;

use Carbon\Carbon;
use SchedulerViewer;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;

class SchedulerViewerTest extends TestCase
{
    /** @var \Carbon\Carbon */
    protected $date;

    public function setUp()
    {
        $this->date = Carbon::create('2018', 10, 17, 10, 00, 00);

        Carbon::setTestNow($this->date);

        parent::setUp();
    }

    /** @test */
    public function it_shows_a_previous_run()
    {
        $schedule = $this->app->make(Schedule::class);

        $schedule->exec('php -i')->daily();

        Artisan::call('schedule:show');

        $this->seeInConsoleOutput('2018-10-17 00:00:00');
    }

    /** @test */
    public function it_shows_a_now_separator()
    {
        $schedule = $this->app->make(Schedule::class);

        $schedule->exec('php -i')->daily();

        Artisan::call('schedule:show');

        $this->seeInConsoleOutput('---- 2018-10-17 10:00:00 ----');
    }

    /** @test */
    public function it_shows_a_next_run()
    {
        $schedule = $this->app->make(Schedule::class);

        $schedule->exec('php -i')->daily();

        Artisan::call('schedule:show');

        $this->seeInConsoleOutput('2018-10-18 00:00:00');
    }
}

