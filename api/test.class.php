<?php
class TestAPI extends APIModule
{
    protected function test($data=array())
    {
        $this->respond($data);
    }
}
?>