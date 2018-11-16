<?php



class PHP_CodeCoverage_Report_Node_Iterator implements RecursiveIterator
{
    
    protected $Vuqcfsch4lw0;

    
    protected $V1cftbhdr5id;

    
    public function __construct(PHP_CodeCoverage_Report_Node_Directory $Vpbrymo1kvdk)
    {
        $this->nodes = $Vpbrymo1kvdk->getChildNodes();
    }

    
    public function rewind()
    {
        $this->position = 0;
    }

    
    public function valid()
    {
        return $this->position < count($this->nodes);
    }

    
    public function key()
    {
        return $this->position;
    }

    
    public function current()
    {
        return $this->valid() ? $this->nodes[$this->position] : null;
    }

    
    public function next()
    {
        $this->position++;
    }

    
    public function getChildren()
    {
        return new self(
            $this->nodes[$this->position]
        );
    }

    
    public function hasChildren()
    {
        return $this->nodes[$this->position] instanceof PHP_CodeCoverage_Report_Node_Directory;
    }
}
