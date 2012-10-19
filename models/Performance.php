<?php
class Performance extends ActiveRecord\Model
{
    static $has_many = array(
        array('performances'),
    );
    static $belongs_to = array(
        array('modules'),
    );
}
?>