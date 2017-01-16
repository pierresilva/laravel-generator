<?php

namespace pierresilva\LaravelGenerator;

use Illuminate\Support\ServiceProvider;

class LaravelGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/laravelgenerator.php' => config_path('laravelgenerator.php'),
        ]);

        $this->publishes([
            __DIR__ . '/../publish/app.blade.php' => base_path('resources/views/layouts/app.blade.php'),
        ]);

        $this->publishes([
            __DIR__ . '/stubs/' => base_path('resources/laravel-generator/'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(
            'pierresilva\LaravelGenerator\Commands\GenerateCommand',
            'pierresilva\LaravelGenerator\Commands\GenerateControllerCommand',
            'pierresilva\LaravelGenerator\Commands\GenerateModelCommand',
            'pierresilva\LaravelGenerator\Commands\GenerateMigrationCommand',
            'pierresilva\LaravelGenerator\Commands\GenerateViewCommand',
            'pierresilva\LaravelGenerator\Commands\GenerateLangCommand'
        );
    }
}
