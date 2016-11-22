<?php

namespace ResourcesLoader;

use Blade;
use Illuminate\Support\ServiceProvider;

class BladeDirectiveServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
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
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
