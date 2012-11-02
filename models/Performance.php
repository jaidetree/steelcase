<?php
class Performance extends ActiveRecord\Model
{
    static $has_many = array(
        array('performanceobjects'),
    );
    static $belongs_to = array(
        array('trainee'),
        array('module')
    );
}
?>