<?php
class Controller
{
    function route($action, $args)
    {
        $response = call_user_func_array( array( $this, $action ), $args ); 

        if( Context::has_response() )
        {
            (string)Context::response();
        }
        else
        {
            (string)$response;
        }
    }
}
?>
