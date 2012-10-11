<?php
/**
 * Form Fields
 *
 * They represent a field in a form object. Used to
 * create forms to represent models in CRUD pages.
 * 
 * 
 * @note <?php print_r( User::table()->columns ) ?>
 */
class Field
{
    private $name;
    private $type;
    private $value;
    private $cleaned_value;

    public function update($value)
    {
        $this->value = $value;
    }

    public function render() 
    {
    }

    private function compress()
    {
    }

    private function expand()
    {
    }

    private function clean()
    {
        
    }
}
?>