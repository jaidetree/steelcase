<?php
namespace API;
class Test extends Module
{
    public function test($data=array())
    {
        $this->respond(array( 'data' => $data ));
    }
}
?>