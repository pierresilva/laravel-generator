<?php

namespace pierresilva\Generator;

use Illuminate\Support\ServiceProvider;

class GeneratorServiceProvider extends ServiceProvider
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
            __DIR__ . '/../config/generator.php' => config_path('generator.php'),
        ]);

        $this->publishes([
            __DIR__ . '/../publish/app.blade.php' => base_path('resources/views/layouts/app.blade.php'),
        ]);

        $this->publishes([
            __DIR__ . '/stubs/' => base_path('resources/generator/'),
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
            'pierresilva\Generator\Commands\GenerateCommand',
            'pierresilva\Generator\Commands\GenerateControllerCommand',
            'pierresilva\Generator\Commands\GenerateModelCommand',
            'pierresilva\Generator\Commands\GenerateMigrationCommand',
            'pierresilva\Generator\Commands\GenerateViewCommand',
            'pierresilva\Generator\Commands\GenerateLangCommand'
        );
    }
}
