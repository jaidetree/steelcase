<?php 
namespace API;
class Trainees extends Module
{
    function login($data)
    {

        if( ! array_key_exists('employee_id', $data) )
        {
            return $this->error_response('No valid employee id.');
        }

        $trainee = \Trainee::find_by_employee_id($data['employee_id']);

        if( ! $trainee ) 
        {
            $trainee = new \Trainee();
            $trainee->employee_id = $data['employee_id'];
            $message = "A trainee was created.";
        }
        else
        {
           $message = "Trainee updated."; 
        }

        $trainee->last_visited_at = date('c');
        $trainee->save();


        return $this->data_response($trainee, $message);
    }   
}
?>