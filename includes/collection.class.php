<?php
class Collection
{
    private $_data = array();
    private $_index = array();
    private $_iterator = null;

    public function iterator()
    {
        return new ArrayIterator($this->_data);
    }

    public function __get($name)
    {
        if( is_numeric($name) )
        {
            return $this->_data[ $this->_index[$name] ];
        }else{
            return $this->_data[(string)$name];
        }
    }

    public function __set($name, $value)
    {
        $this->append($name, $value);
    }

    public function append($name, $value)
    {
       $this->_data[(string)$name]  = $value;
       $this->_index[] = (string)$name;
    }
}
APP::set('modules', new Collection());
?>