<?php 
namespace API;
class Performance extends Module
{
    function add($data)
    {
        $performance = new \Performance();

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