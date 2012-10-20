<?php 
class TraineeAPI extends APIModule
{
    function login($employee_id)
    {
        $trainee = Trainee::find_by_employee_id($employee_id);

        if( ! $trainee ) 
        {
            $trainee = new Trainee();
            $trainee->employee_id = $employee_id;
            $message = "A trainee was created.";
        }
        else
        {
           $message = "Trainee updated."; 
        }

        $trainee->last_visited_at = date('c');
        $trainee->save();


        $this->respond(array( 
            'trainee_id' => $trainee->id,
            'employee_id' => $trainee->employee_id,
            'last_visited_at' => $trainee->last_visited_at->format("F j, Y h:i a")
        ),$message);
    }   
}
?>