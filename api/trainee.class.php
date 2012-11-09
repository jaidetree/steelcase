<?php 
namespace API;
class Trainee extends Module
{
    function login($data)
    {
        $this->token_required($data['token']);

        if( ! array_key_exists('employee_id', $data) or ! $data['employee_id'] )
        {
            $this->error('No valid employee id.');
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

        $this->respond($trainee, $message);
    }   
}
?>