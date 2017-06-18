<?php

namespace Bluora\LaravelResourcesLoader;

use Blade;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
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
        $this->mergeConfigFrom(__DIR__.'/../config/config.default.php', 'resource');

        $this->app->bind('resource', function () {
            return new Resource();
        });
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('resource.php'),
        ]);

        blade::directive('captureScript', function ($name) {
            $name = empty($name) ? 'inline' : substr(str_replace('$', '', $name), 1, -1);

            return "<?php Resource::addScript(ob_get_clean(), '".$name."'); ?>";
        });

        blade::directive('captureStyle', function ($name) {
            $name = empty($name) ? 'header' : substr(str_replace('$', '', $name), 1, -1);

            return "<?php Resource::addStyle(ob_get_clean(), '".$name."'); ?>";
        });

        blade::directive('resources', function ($template) {
            $template = addslashes(substr($template, 1, -1));

            return "<?php Resource::controller(['js', 'css'], '$template'); ?>";
        });

        blade::directive('asset', function ($asset) {
            $asset = addslashes(substr($asset, 1, -1));

            return "<?php Resource::container('$asset'); ?>";
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['resource'];
    }
}
