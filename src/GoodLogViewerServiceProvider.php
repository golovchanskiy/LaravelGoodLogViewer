<?php

namespace Golovchanskiy\LaravelGoodLogViewer;

use Golovchanskiy\LaravelGoodLogViewer\Console\Commands\PublishCommand;
use Golovchanskiy\LaravelGoodLogViewer\Service\GoodLogViewerService;
use Illuminate\Support\ServiceProvider;

/**
 * Class GoodLogViewerServiceProvider
 * @package Golovchanskiy\LaravelGoodLogViewer
 */
class GoodLogViewerServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * The commands to be registered.
     *
     * @var array
     */
    protected $commands = [
        PublishCommand::class,
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // views
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'good-log-viewer');
        $this->publishes([
            __DIR__ . '/resources/views' => base_path('/resources/views/vendor/good-log-viewer'),
        ], 'views');

        // translations
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'good-log-viewer');

        // config
        $this->publishes([
            __DIR__ . '/config/good-log-viewer.php' => config_path('good-log-viewer.php'),
        ]);

        // routes
        if (config('good-log-viewer.routes.enabled') === true) {
            include __DIR__ . '/routes/web.php';
        }

        // commands
        $this->commands($this->commands);

        // set locale
        $locale = config('good-log-viewer.locale');
        if ($locale != 'auto') {
            app()->setLocale($locale);
        }

        // facade
        $this->app->bind('GoodLogViewer', function () {
            return new GoodLogViewerService();
        });
    }

}
