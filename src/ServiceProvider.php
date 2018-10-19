<?php

namespace i8086\SchedulerViewer;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use i8086\SchedulerViewer\Console\Commands\ScheduleShow;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands([
            ScheduleShow::class,
        ]);
        if ($this->app->runningInConsole()) {
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SchedulerViewer::class, function () {
            return new SchedulerViewer();
        });

        $this->app->alias(SchedulerViewer::class, 'SchedulerViewer');
    }
}
