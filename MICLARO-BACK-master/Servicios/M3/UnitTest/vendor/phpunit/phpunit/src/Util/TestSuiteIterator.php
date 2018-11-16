<?php



class PHPUnit_Util_TestSuiteIterator implements RecursiveIterator
{
    
    protected $Vuqcfsch4lw0;

    
    protected $Vo50qpjpkko3;

    
    public function __construct(PHPUnit_Framework_TestSuite $Vu2klvvt2yb4)
    {
        $this->tests = $Vu2klvvt2yb4->tests();
    }

    
    public function rewind()
    {
        $this->position = 0;
    }

    
    public function valid()
    {
        return $this->position < count($this->tests);
    }

    
    public function key()
    {
        return $this->position;
    }

    
    public function current()
    {
        return $this->valid() ? $this->tests[$this->position] : null;
    }

    
    public function next()
    {
        $this->position++;
    }

    
    public function getChildren()
    {
        return new self(
            $this->tests[$this->position]
        );
    }

    
    public function hasChildren()
    {
        return $this->tests[$this->position] instanceof PHPUnit_Framework_TestSuite;
    }
}
