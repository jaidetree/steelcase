<?php
class Glossary extends ActiveRecord\Model
{
    static $table_name = 'glossary';
    static $belongs_to = array(
        array('user')
    );

    public function created_at_date($format = "F j, Y")
    {
        return date($format, $this->created_at);
    }

    public function updated_at_date($format = "F j, Y")
    {
        return date($format, $this->updated_at);
    }
}
?>