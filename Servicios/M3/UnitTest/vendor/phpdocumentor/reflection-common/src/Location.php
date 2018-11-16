<?php


namespace phpDocumentor\Reflection;


final class Location
{
    
    private $Vft5ytzqy3fl = 0;

    
    private $Vm15ro0zmcwl = 0;

    
    public function __construct($Vft5ytzqy3fl, $Vm15ro0zmcwl = 0)
    {
        $this->lineNumber   = $Vft5ytzqy3fl;
        $this->columnNumber = $Vm15ro0zmcwl;
    }

    
    public function getLineNumber()
    {
        return $this->lineNumber;
    }

    
    public function getColumnNumber()
    {
        return $this->columnNumber;
    }
}
