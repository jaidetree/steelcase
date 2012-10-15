<?php
class Performance extends ActiveRecord\Model
{
    static $belongs_to = array(
        array('trainees'),
    );
}
?>