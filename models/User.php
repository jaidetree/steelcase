<?php
class User extends ActiveRecord\Model
{
    static $has_many = array(
        array('glossary')
    );

    static $type_choices = array(
        0 => 'Super Admin',
        1 => 'Admin'
    );

    static $status_choices = array(
        0 => 'Active',
        1 => 'Inactive'
    );

    public function status_name()
    {
        return self::$status_choices[ $this->status ];
    }

    public function type_name()
    {
        return self::$type_choices[ $this->type ];
    }
}
?>