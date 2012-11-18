<?php 
class Router 
{
    private static $urls;
    public function __construct()
    {
        include ROOT . "routes.php";
        self::$urls = $routes;

        APP::register_function($this, 'reverseurl', 'url');
        APP::register_function($this, 'reverseurl', 'url');
    }

    public function append($route, $action)
    {
        array_push(self::$urls, array( $route, $action));
    }

    public function load_route($url)
    {
        $url = preg_replace('/\?.*$/', '', $url);
        foreach( self::$urls as $route )
        {
            if( preg_match( '#' . $route[0] . '#', $url, $args ) )
            {
                array_shift($args);

                $this->call_action( $route[1], $args ); 
                return;
            }
        }

        $this->call_action( 'errors', 'notfound_404', array() );
    }



    /**
     * Call the method on the controller.
     */
    public function call_action( $route, $args)
    {
        if( is_callable($route) )
        {
            call_user_func_array($route, $args);
            return;
        }

        list($controller_name, $action ) = explode(".", $route);

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
    public function reverseurl($path, $args=array())
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
APP::register_module( new Router() );
?>