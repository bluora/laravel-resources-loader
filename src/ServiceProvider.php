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
        $this->mergeConfigFrom(__DIR__.'/../../config/config.php', config_path('resource.php'));

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

        blade::directive('capturestart', function () {
            return '<?php ob_start(); ?>';
        });

        blade::directive('capturestop', function ($name) {
            $name = str_replace('$', '', $name);
            $name = substr($name, 1, -1);

            return '<?php $'.$name.' = ob_get_clean(); ?>';
        });

        blade::directive('captureScript', function ($name) {
            if (!empty($name)) {
                $name = str_replace('$', '', $name);
                $name = substr($name, 1, -1);
            } else {
                $name = 'inline';
            }

            return "<?php Resource::addScript(ob_get_clean(), '".$name."'); ?>";
        });

        blade::directive('captureStyle', function ($name) {
            if (!empty($name)) {
                $name = str_replace('$', '', $name);
                $name = substr($name, 1, -1);
            } else {
                $name = 'header';
            }

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
