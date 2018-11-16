<?php
class TestIterator implements Iterator
{
    protected $Vvs0hc5bhqj3;
    protected $Vuqcfsch4lw0 = 0;

    public function __construct($Vvs0hc5bhqj3 = array())
    {
        $this->array = $Vvs0hc5bhqj3;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function valid()
    {
        return $this->position < count($this->array);
    }

    public function key()
    {
        return $this->position;
    }

    public function current()
    {
        return $this->array[$this->position];
    }

    public function next()
    {
        $this->position++;
    }
}
