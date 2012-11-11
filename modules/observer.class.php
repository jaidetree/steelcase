<?php
class Observer
{
    private $observers = array();

    public function __construct()
    {
        APP::register_function($this, 'notify');
    }

    public function attach($subject, $object)
    {
        $class = new ReflectionClass($object);        
        $subject = strtolower($subject);

        foreach( $class->getMethods(ReflectionMethod::IS_PUBLIC) as $method )
        {
            $this->observers[$subject][] = array( $object, $method->name );
        }
    }

    public function notify($subject, $method)
    {
        $subject = strtolower($subject);

        foreach( $this->observers[$subject] as $observer_method )
        {
            if( $observer_method[1] == $method )
            {
                call_user_func($observer_method);
            }
        }
    }
}
APP::register_module(new Observer());
?>