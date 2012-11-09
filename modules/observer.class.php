<?php
class Observer
{
    private $observers = array();
    public function register_observer($subject $object)
    {
        $class = new ReflectionClass($object);        
        foreach( $class->getMethods(ReflectionMethod::IS_PUBLIC) as $method )
        {
            $this->observers[$subject][] = array( $object, $method->name );
        }
    }
    public function notify($subject)
}
APP::register_module(new Observer());
?>