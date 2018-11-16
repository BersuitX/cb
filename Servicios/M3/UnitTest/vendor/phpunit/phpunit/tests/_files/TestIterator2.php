<?php
class TestIterator2 implements Iterator
{
    protected $Vqhzkfsafzrc;

    public function __construct(array $Vvs0hc5bhqj3)
    {
        $this->data = $Vvs0hc5bhqj3;
    }

    public function current()
    {
        return current($this->data);
    }

    public function next()
    {
        next($this->data);
    }

    public function key()
    {
        return key($this->data);
    }

    public function valid()
    {
        return key($this->data) !== null;
    }

    public function rewind()
    {
        reset($this->data);
    }
}
