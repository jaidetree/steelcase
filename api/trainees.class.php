<?php 
namespace API;
class Trainees extends Module
{
    function login($data)
    {
        if( ! array_key_exists('employee_id', $data) )
        {
            $this->respond('No valid employee id.', true);
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


        return $this->respond(array( 
            'trainee_id' => $trainee->id,
            'employee_id' => $trainee->employee_id,
            'last_visited_at' => $trainee->last_visited_at->format("F j, Y h:i a")
        ),$message);
    }   
}
?>