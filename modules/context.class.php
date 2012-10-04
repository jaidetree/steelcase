<?php
class Context
{
    private static $response;
    private static $priority = -1;
    private static $messages = array();

    public static function response($response=false, $priority = 0)
    {
        if( ! $response )
        {
            return self::$response;
        }

        if( ( self::$priority < $priority && $priority > 0 ) || self::$priority == -1 )
        {
            self::$response = $response;
            self::$priority = $priority;
        }
    }

    public static function has_response()
    {
        if( self::$response )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function flush()
    {
        self::$response->render();
        die();
    }
}
?>
