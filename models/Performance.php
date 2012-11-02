<?php
class Performance extends ActiveRecord\Model
{
    static $belongs_to = array(
        array('module'),
        array('trainee'),
    );
}
?>