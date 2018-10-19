<?php
namespace i8086\SchedulerViewer\Test;

use i8086\SchedulerViewer\Facade;
use Illuminate\Contracts\Console\Kernel;
use i8086\SchedulerViewer\ServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    /**
     * Load package service provider
     * @param  \Illuminate\Foundation\Application $app
     * @return i8086\SchedulerViewer\SchedulerViewerServiceProvider
     */
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    /**
     * Load package alias
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'SchedulerViewer' => Facade::class,
        ];
    }

    protected function seeInConsoleOutput($expectedText)
    {
        $consoleOutput = $this->app[Kernel::class]->output();

        $this->assertContains($expectedText, $consoleOutput, "Did not see `{$expectedText}` in console output: `$consoleOutput`");
    }
}
