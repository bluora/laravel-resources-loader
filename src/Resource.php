<?php

namespace ResourcesLoader;

use Config;
use Roumen\Asset\Asset;

class Resource
{

    /**
     * Track loaded inline files.
     *
     * @var array
     */
    private static $loaded_inline = [];

    /**
     * Add the asset using our version of the exliser loader.
     *
     * @param string $file
     * @param string $params
     * @param bool   $onUnknownExtension *
     *
     * @return void
     */
    public static function add($file, $params = 'footer', $onUnknownExtension = false)
    {
        Asset::add(self::elixir($file), $params, $onUnknownExtension);
    }

    /**
     * Add raw script to page.
     *
     * @param string $style
     * @param string $params
     *
     * @return void
     */
    public static function addScript($script, $params = 'footer')
    {
        Asset::addScript($script, $params);
    }

    /**
     * Reverse the order of scripts.
     *
     * @return void
     */
    public static function reverseStylesOrder($params = 'footer')
    {
        if (isset(Asset::$scripts[$params])) {
            Asset::$scripts[$params] = array_reverse(Asset::$scripts[$params], true);
        }
    }

    /**
     * Add raw styling to page.
     *
     * @param string $style
     * @param string $params
     *
     * @return void
     */
    public static function addStyle($style, $params = 'header')
    {
        Asset::addStyle($style, $params);
    }

    /**
     * Add the asset first using our version of the exliser loader.
     *
     * @param string $file
     *
     * @return return string
     */
    public static function addFirst($file, $params = 'footer', $onUnknownExtension = false)
    {
        Asset::addFirst(self::elixir($file), $params, $onUnknownExtension);
    }

    /**
     * Add new asset after another asset in its array.
     *
     * @param string       $a
     * @param string       $b
     * @param string/array $params
     *
     * @return void
     */
    public static function addAfter($file, $b, $params = 'footer', $onUnknownExtension = false)
    {
        Asset::addAfter(self::elixir($file), $b, $params, $onUnknownExtension);
    }

    /**
     * Add new asset after another asset in its array.
     *
     * @param string       $a
     * @param string       $b
     * @param string/array $params
     *
     * @return void
     */
    public static function container($container_settings)
    {
        self::loadContainer($container_settings);
    }

    /**
     * Load an assets container (it will load the individual files).
     *
     * @return void
     */
    public static function containers()
    {
        $arguments = func_get_args();
        if (isset($arguments[0])) {
            $container_list = $arguments[0];
            foreach ($container_list as $container_settings) {
                self::loadContainer($container_settings);
            }
        }
    }

    /**
     * Load an assets container (it will load the individual files).
     *
     * @return void
     */
    private static function loadContainer($asset_settings)
    {
        if (is_array($asset_settings)) {
            $asset_name = array_shift($asset_settings);
        } else {
            $asset_name = $asset_settings;
            $asset_settings = [];
        }

        $asset_name = ucfirst(strtolower($asset_name));
        $class_name = false;

        $packages = Config::get('resources.packages');
        $class_settings = [];

        if (isset($packages[$asset_name])) {
            $class_settings = $packages[$asset_name];
            if (!is_array($class_settings)) {
                $class_settings = [$class_settings];
            }
            $class_name = array_shift($class_settings);
            if (count($class_settings) == 0) {
                $class_settings = $asset_settings;
            }
        } else {
            $file = Config::get('resources.containers').$asset_name.'.php';
            if (file_exists($file)) {
                $class_name = Config::get('resources.namespace').$asset_name;
                $class_settings = $asset_settings;
            }
        }

        if ($class_name !== false && class_exists($class_name)) {
            new $class_name(...$class_settings);
        }
    }

    /**
     * Load local files for a given controller.
     *
     * @param array  $file_extensions
     * @param string $file
     * @param string $class
     *
     * @return void
     */
    public static function controller($file_extensions, $file)
    {
        if (!is_array($file_extensions)) {
            $file_extensions = [$file_extensions];
        }
        $manifest = config('rev-manifest', []);
        foreach ($file_extensions as $extension) {
            $file_name = str_replace('.', '/', $file).'.'.$extension;

            if (env('APP_ENV') == 'local') {
                $file_path = dirname(resource_path().'/views/'.$file_name);
                $file_path .= '/'.$extension.'/'.basename($file_name);
            } else {
                $file_path = public_path().'/assets/'.$file_name;
            }

            if (isset($manifest[$file_path]) || file_exists($file_path)) {
                if (env('APP_ENV') == 'local') {
                    if (!isset(self::$loaded_inline[$file_path])) {
                        $contents = file_get_contents($file_path);
                        $contents = '/* '.$file_name." */ \n\n".$contents;
                        if ($extension == 'js') {
                            self::addScript($contents);
                        } else {
                            self::addStyle($contents);
                        }
                        self::$loaded_inline[$file_path] = true;
                    }
                } else {
                    self::add($file_name);
                }
            }
        }
    }

    /**
     * Override standard elixir to return standard url if
     * the exception is made (eg the file isn't versioned).
     *
     * @param string $file
     *
     * @return return string
     */
    public static function elixir($file)
    {
        if (substr($file, 0, 4) === 'http') {
            return $file;
        }
        try {
            if (env('APP_ASSET_SOURCE', 'build') === 'build') {
                $elixir_path = elixir($file);

                return $elixir_path;
            } else {
                return '/'.env('APP_ASSET_SOURCE').'/'.$file;
            }
        } catch (\InvalidArgumentException $e) {
            if (file_exists(public_path().'/'.$file)) {
                return $file;
            } elseif (file_exists(public_path().'/assets/'.$file)) {
                return '/assets/'.$file;
            }
        }

        return '';
    }
}
