<?php
class Glossary extends ActiveRecord\Model
{
    static $table_name = 'glossary';
    static $belongs_to = array(
        array('user')
    );
}
?>