<?php
class Auth
{
    private static $instance;
    private static $driver;

    public static function init()
    {
        if( ! self::$instance )
        {
            $class = __CLASS__;
            self::$instance = new $class();
        }

        return self::$instance;
    }

    public function __construct()
    {
    }

    public function set_driver($driver)
    {
        if( self::$driver )
        {
            return false;
        }

        self::$driver = new $driver();
    }

    public static function is_logged_in()
    {
        return self::$driver->is_logged_in();
    }

    public static function login($username, $password)
    {
        return self::$driver->login($username, $password);
    }

    public static function logout()
    {
        return self::$driver->logout();
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

    public static function start()
    {
        if( method_exists( self::$driver, 'start' ) )
        {
            self::$driver->start();
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
