<?php

namespace Modules\Itelemetry\Providers;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Itelemetry\Listeners\RegisterItelemetrySidebar;

class ItelemetryServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterItelemetrySidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            // append translations
        });


    }

    public function boot()
    {

        $this->publishConfig('itelemetry', 'config');
        $this->publishConfig('itelemetry', 'crud-fields');

        $this->mergeConfigFrom($this->getModuleConfigFilePath('itelemetry', 'settings'), "asgard.itelemetry.settings");
        $this->mergeConfigFrom($this->getModuleConfigFilePath('itelemetry', 'settings-fields'), "asgard.itelemetry.settings-fields");
        $this->mergeConfigFrom($this->getModuleConfigFilePath('itelemetry', 'permissions'), "asgard.itelemetry.permissions");

        //$this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Itelemetry\Repositories\DeviceRepository',
            function () {
                $repository = new \Modules\Itelemetry\Repositories\Eloquent\EloquentDeviceRepository(new \Modules\Itelemetry\Entities\Device());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Itelemetry\Repositories\Cache\CacheDeviceDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Itelemetry\Repositories\SensorRepository',
            function () {
                $repository = new \Modules\Itelemetry\Repositories\Eloquent\EloquentSensorRepository(new \Modules\Itelemetry\Entities\Sensor());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Itelemetry\Repositories\Cache\CacheSensorDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Itelemetry\Repositories\RecordRepository',
            function () {
                $repository = new \Modules\Itelemetry\Repositories\Eloquent\EloquentRecordRepository(new \Modules\Itelemetry\Entities\Record());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Itelemetry\Repositories\Cache\CacheRecordDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Itelemetry\Repositories\LogRepository',
            function () {
                $repository = new \Modules\Itelemetry\Repositories\Eloquent\EloquentLogRepository(new \Modules\Itelemetry\Entities\Log());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Itelemetry\Repositories\Cache\CacheLogDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Itelemetry\Repositories\DeviceSensorRepository',
            function () {
                $repository = new \Modules\Itelemetry\Repositories\Eloquent\EloquentDeviceSensorRepository(new \Modules\Itelemetry\Entities\DeviceSensor());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Itelemetry\Repositories\Cache\CacheDeviceSensorDecorator($repository);
            }
        );
// add bindings





    }


}
