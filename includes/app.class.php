<?php
/**
 * This class is our main app. Holds our settings, data, and acces
 * to some global utilities.
 */
class APP
{
    static $data = array();
    static $urls = array();
    static $modules = array();
    static $functions = array();
    private static $errors_handled = false;

    public static $db;

    public static function cfg($section, $key)
    {
        return self::$data[$section][$key];
    }

    /**
     * Init
     */
    public static function init()
    {
        include ROOT . "config.php";
        self::$data = $config;
    }

    /**
     * Allows shortcut functions through the app.
     */
    public static function __callStatic($name, $arguments)
    {
        if( ! self::function_exists($name) )
        {
            $error_msg = 'Module function does not exist: ' . $name;

            if( ! self::$errors_handled )
            {
                trigger_error($error_msg);
            }
            else
            {
                throw new Exception($error_msg);
            }
            return false;
        }

        call_user_func_array(self::get_function($name), $arguments);
    }

    public static function function_exists($name)
    {
        if( array_key_exists($name, self::$functions) )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Register function.
     */
    public static function register_function($class, $function, $short_name="")
    {
        if( ! $short_name )
        {
            $short_name = $function;
        }

        self::$functions[$short_name] = array( $object, $function );
    }

    public static function get_function($name)
    {
        return self::$functions[$name];
    }

    public static function register_module($class)
    {
        if( ! $name )
        {
            $name = get_class($class);
        }
        $name = strtolower($name);
        return self::$modules[$name] = $class;
    }

    public static function module($name)
    {
        return self::$modules[$name];
    }

}
APP::init();
?>
