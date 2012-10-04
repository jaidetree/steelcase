<?php
class Controller
{
    function route($action, $args)
    {
        $response = call_user_func_array( array( $this, $action ), $args ); 

        if( Context::has_response() )
        {
            Context::response()->render();
        }
        else
        {
            $response->render();
        }
    }
}
?>
