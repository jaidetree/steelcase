<?php
class APIController extends Controller
{
    public function __construct()
    { 
        $dir = Dir(ROOT . 'api/');

        while( ( $file = $dir->read() ) !== FALSE ) 
        {
            if( preg_match('/^[_a-z]+\.class\.php$/', $file) )
            {
                require_once( $dir->path .  $file );
            }
        }
    }

    function route($action, $args) 
    {

        set_error_handler(array( $this, 'exception_error_handler' ));

        $request = explode('/', $args[0]);

        $module = $request[0];
        $action = $request[1];

        require_once(ROOT . "api/routes.php");

        foreach($api_routes as $route)
        {
            list( $route_module, $route_response) = $route;
            list($route_class, $route_action) = explode(".", $route_response);

            if( $route_module == $module ) {
                if( $route_action == $action )
                {

                    $response = new $route_class($route_action, $_POST);

                    echo $response;
                    return;
                } else {
                   throw new JSONException('No action in module "' . $route_module . '" exists.') ;
                }
            }
        }

        throw new JSONException('No module named "' . $module . '" exists!');

    }

    function exception_error_handler($errno, $errstr, $errfile, $errline ) {
        throw new JSONException($errstr . " " . $errfile . " " . $errline);
    }
}
?>