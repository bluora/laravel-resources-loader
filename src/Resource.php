<?php

namespace ResourcesLoader;

use Config;
use Roumen\Asset\Asset;

class Resource
{
    /**
     * Add the asset using our version of the exliser loader.
     *
     * @param string $file
     *
     * @return return string
     */
    public static function add($file)
    {
        Asset::add(self::elixir($file));
    }

    /**
     * Add the asset first using our version of the exliser loader.
     *
     * @param string $file
     *
     * @return return string
     */
    public static function addFirst($file)
    {
        Asset::addFirst(self::elixir($file));
    }

    /**
     * Load an assets container (it will load the individual files).
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
     * @param string $type
     * @param string $file
     * @param string $class
     *
     * @return void
     */
    public static function controller($type, $file, $class)
    {
        $source_folder = strtolower(str_replace(['App/Http/Controllers/', 'Controller'], '', str_replace('\\', '/', $class)));
        $file_name = $type.'/'.$source_folder.'/'.$file.'.'.$type;
        if (file_exists(public_path().'/'.$file_name)) {
            self::add(self::elixir($file_name));
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
            return elixir($file);
        } catch (\InvalidArgumentException $e) {
            return $file;
        }
    }
}
