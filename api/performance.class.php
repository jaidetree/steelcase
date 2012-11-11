<?php 
namespace API;
class Performance extends Module
{
    function add($data)
    {
        $this->token_required($data['token']);

        $performance = new \Performance();

        if(  ! $data['module_id'] or ! is_numeric($data['module_id']) )
        {
            $this->error($data['module_id'] . ' is not a valid module_id. Must be a number');
        }

        if( ! $data['score'] or ! is_numeric($data['score']) )
        {
            $this->error('Not a valid score. Must be a number');
        }

        if( ! $data['duration'] or ! is_numeric($data['duration']) )
        {
            $this->error('Not a valid duration. Must be a number');
        }

        if( ! $data['employee_id'] or strlen($data['employee_id']) < 8  )
        {
            $this->error('Not a valid trainee_id. Must contain 8 or more characters.');
        }

        $performance->score = $data['score'];
        $performance->duration = $data['duration'];
        $performance->module_id = $data['module_id'];
        $performance->trainee_id = \Trainee::find_by_employee_id($data['employee_id'])->id;

        $performance->save();

        $message = "A Performance was created. ";


        if( is_array($data['meta'])==0 ){

            foreach($data['meta'] as $key => $value):

                $performanceobject = new \PerformanceObject();

                $performanceobject->key = $key;
                $performanceobject->value = $value;
                $performanceobject->performance_id = $performance->id;

                $performanceobject->save();

            endforeach;

            $message .= sizeof($data['meta'])." related Performance Objects were created.";

        }

        $this->respond($performance, $message);

    }   
}
?>