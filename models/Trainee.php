<?php
class Trainee extends ActiveRecord\Model
{
    static $has_many = array(
        array('performances'),
    );

    public function last_visited_at($format = "F j, Y h:i a")
    {
        if( is_a($this->last_visited_at, 'DateTime') )
        {
            return $this->last_visited_at->format($format);
        }
        else
        {
            return '-';
        }
    }
}
?>