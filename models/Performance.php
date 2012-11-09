<?php
class Performance extends ActiveRecord\Model
{
    static $has_many = array(
        array('performance_objects'),
    );
    static $belongs_to = array(
        array('trainee'),
        array('module')
    );
}
?>