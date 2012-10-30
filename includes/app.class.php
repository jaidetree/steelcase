<?php
/**
 * This class is our main app. Holds our settings, data, and acces
 * to some global utilities.
 */
class APP
{
    static $data = array();
    static $urls = array();

    public static $db;

    public static function cfg($section, $key)
    {
        return self::$data[$section][$key];
    }

    public static function init()
    {
        include ROOT . "config.php";
        self::$data = $config;
        include ROOT . "routes.php";
        self::$urls = $routes;

    }

    public static function load_route($url)
    {
        $url = preg_replace('/\?.*$/', '', $url);
        foreach( self::$urls as $route )
        {
            if( preg_match( '#' . $route[0] . '#', $url, $args ) )
            {
                array_shift($args);

                $data = explode(".", $route[1]);

                $controller = $data[0];
                $action = $data[1];

                self::call_action( $controller, $action, $args ); 
                return;
            }
        }

        self::call_action( 'errors', 'notfound_404', array() );
    }



    /**
     * Call the method on the controller.
     */
    public static function call_action( $controller_name, $action, $args )
    {
        if( class_exists( $controller_name . 'Controller') )
        {
            $controller_name .= "Controller";
        }
        $controller = new $controller_name;
        $controller->route( $action, $args );
    }

    /**
     * Reverse a URL by it's controller/view
     */
    public static function url($path, $args=array())
    {
        foreach( self::$urls as $idx => $route )
        {
            if( strtolower($route[2]) == strtolower($path) or strtolower($route[1]) === strtolower($path) )
            {
                $url = $route[0];
                $url = preg_replace("/(\(.+\)+)/Ums", "%s", $url);
                $url = preg_replace('/[\[\]^\$\?]/', "", $url);

                if( ( is_array($args) && sizeof($args) > 0 ) || is_numeric($args) )
                {
                    $url = vsprintf( $url, $args );
                }

                $url = preg_replace('/\/$/', '', $url) . '/';

                if( $url == "/" )
                {
                    $url = "";
                }

                return 'http://' . $_SERVER['HTTP_HOST'] . '/' . $url;

            }
        }

        return "#error";
    }
}
APP::init();
?>
