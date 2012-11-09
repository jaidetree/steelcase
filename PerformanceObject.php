<?php
class PerformanceObject extends ActiveRecord\Model
{
    static $has_many = array(
        array('performanceobjects'),
    );
    static $belongs_to = array(
        array('performances'),
    );
}
?>