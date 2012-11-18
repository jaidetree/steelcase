<?php
class Observer
{
    private $observers = array();

    public function __construct()
    {
        APP::register_function($this, 'notify');
    }

    public function attach($object, $subject)
    {
        $class = new ReflectionClass($object);        
        $subject = strtolower($subject);

        foreach( $class->getMethods(ReflectionMethod::IS_PUBLIC) as $method )
        {
            $this->observers[$subject][] = array( $object, $method->name );
        }
    }

    public function notify($subject, $method, $args=array())
    {
        $subject = strtolower($subject);

        if( ! array_key_exists($subject, $this->observers) )
        {
            return false;
        }

        foreach( $this->observers[$subject] as $observer_method )
        {
            if( $observer_method[1] == $method )
            {
                call_user_func_array($observer_method, $args);
            }
        }
    }
}
APP::register_module(new Observer());
?>