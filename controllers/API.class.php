<?php
class APIController extends \Controller
{
    function route($action, $args) 
    {
        session_cache_expire(30);
        $request = $args[0];
        require_once(ROOT . "api/routes.php");

        foreach($api_routes as $route)
        {
            list($route_path, $module_action) = $route;

            if( preg_match( '@' . $route_path . '@', $request ) )
            {
                API\ModuleFactory::create( $module_action );
            } 
        }

        throw new API\JSONException('No module named "' . $request . '" exists!');
    }

}
?>