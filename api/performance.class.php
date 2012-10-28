<?php 
namespace API;
class Performance extends Module
{
    function add($data)
    {
        $performance = new \Performance();

        if( ! is_numeric($data['module_id']) or ! $data['module_id'] )
        {
            $this->error('Not a valid module_id. Must be a number');
        }

        if( ! is_numeric($data['score']) or ! $data['score'] )
        {
            $this->error('Not a valid score. Must be a number');
        }

        if( ! is_numeric($data['duration']) or ! $data['duration'] )
        {
            $this->error('Not a valid duration. Must be a number');
        }

        if( strlen($data['trainee_id']) < 8 or ! $data['trainee_id'] )
        {
            $this->error('Not a valid trainee_id. Must contain 8 or more characters.');
        }

        $performance->score = $data['score'];
        $performance->duration = $data['duration'];
        $performance->module_id = $data['module_id'];
        $performance->trainee_id = $data['trainee_id'];

        $performance->save();

        $message = "A Performance was created.";

        $this->respond($performance, $message);

    }   
}
?>