<?php
class Auth
{
    private static $instance;
    private static $driver;

    public static function get($class_name="")
    {
        if( ! self::$instance )
        {
            $class = 'Auth';
            self::$instance = new $class();

            if( $class_name )
            {
                self::$driver = new $class_name();
            }
        }

        return self::$instance;
    }

    public static function user($key=false, $default=false)
    {
        if( ! $key )
        {
            return self::$driver->get_current_user();
        }
        if( self::$driver->get_current_user()->$key )
        {
            return self::$driver->get_current_user()->$key;
        }

        if( $default )
        {
            return $default;
        }
    }

    public static function __callStatic($name, $arguments=array())
    {
        if( method_exists( self::$driver, $name ) )
        {
            return call_user_func_array(array( self::$driver, $name ), $arguments);
        }
    }

    public function __call($name, $arguments=array())
    {
        if( method_exists( self::$driver, $name ) )
        {
            return call_user_func_array(array( self::$driver, $name ), $arguments);
        }
    }

}

abstract class AuthDriver
{
    abstract public function login($username, $password);
    abstract public function logout();
    abstract public function validate_session();
    abstract public function is_logged_in();
    abstract public function get_current_user();
}

function login_required()
{
    if( ! Auth::is_logged_in() )
    {
        Context::response( new TemplateResponse('account/login'));
        Context::flush();
    }
}
?>
