<?php
/**
 * Handles sending messages to the templates.
 */
class Messenger
{
    private static $messages = array();
    private static $instance;

    public static function all($key=false)
    {
        $_messages = $_SESSION['messages'];

        if( ! is_array($_messages) || ! count($_messages))
        {
            return false;
        }

        $_SESSION['messages'] = array();

        if($key)
        {
            return $_SESSION['messages'][$key];
        }

        $messages = array();

        foreach($_messages as $section)
        {
            $messages[] = $_messages[$section];
        }

        return $messages;
    }
}
class Message
{
    public function __construct($type, $message, $extra_classes=false)
    {
        $class = $type;

        if($extra_classes)
        {
            $class .= " " . $extra_class;
        }

        $_SESSION['messages'][$type] = array( 
            'type' => $type,
            'messages' => $message,
            'class' => $class
        );
    }
}
?>