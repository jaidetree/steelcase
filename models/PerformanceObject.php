<?php
class PerformanceObject extends ActiveRecord\Model
{
    static $belongs_to = array(
        array('performances'),
    );
}
?>