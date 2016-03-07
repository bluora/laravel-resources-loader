<?php

namespace ResourcesLoader;

use Roumen\Asset\Asset;

class Resource
{

    /**
     * Add the asset using our version of the exliser loader
     *
     * @param  string $file
     * @return return string
     */
    public static function add($file)
    {
        Asset::add(self::elixir($file));
    }

    /**
     * Add the asset first using our version of the exliser loader
     *
     * @param  string $file
     * @return return string
     */
    public static function addFirst($file)
    {
        Asset::addFirst(self::elixir($file));
    }
    
    /**
     * Load an assets container (it will load the individual files)
     *
     * @return void
     */
    public static function container()
    {
        $asset_name = func_get_args();
        if (is_array($asset_name) && count($asset_name) == 1) {
            $asset_name = array_shift($asset_name);
        }
        if (is_array($asset_name)) {
            foreach ($asset_name as $name) {
                self::load($name);
            }
        } else {
            $asset_name = ucfirst($asset_name);
            $file = __DIR__."/".$asset_name.".php";
            if (file_exists($file)) {
                $class_name = 'App\\Assets\\'.$asset_name;
                if (class_exists($class_name)) {
                    new $class_name();
                }
            }
        }
    }

    /**
     * Load local files for a given controller
     *
     * @param  string $type
     * @param  string $file
     * @param  string $class
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
     * the exception is made (eg the file isn't versioned)
     *
     * @param  string $file
     * @return return string
     */
    public static function elixir($file)
    {
        try {
            return elixir($file);
        } catch (\InvalidArgumentException $e) {
            return $file;
        }
    }
}
