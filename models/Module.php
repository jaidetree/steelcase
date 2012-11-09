<?php
class Module extends ActiveRecord\Model
{
    static $has_many = array(
        array('performances'),
    );
}
?>