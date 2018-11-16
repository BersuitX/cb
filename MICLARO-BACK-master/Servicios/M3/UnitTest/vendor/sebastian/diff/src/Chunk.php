<?php


namespace SebastianBergmann\Diff;

class Chunk
{
    
    private $Vtpoxs3gutsc;

    
    private $Vtpoxs3gutscRange;

    
    private $Vppalz5j4b4w;

    
    private $Vppalz5j4b4wRange;

    
    private $Vbkt5laoakgf;

    
    public function __construct($Vtpoxs3gutsc = 0, $Vtpoxs3gutscRange = 1, $Vppalz5j4b4w = 0, $Vppalz5j4b4wRange = 1, array $Vbkt5laoakgf = array())
    {
        $this->start      = (int) $Vtpoxs3gutsc;
        $this->startRange = (int) $Vtpoxs3gutscRange;
        $this->end        = (int) $Vppalz5j4b4w;
        $this->endRange   = (int) $Vppalz5j4b4wRange;
        $this->lines      = $Vbkt5laoakgf;
    }

    
    public function getStart()
    {
        return $this->start;
    }

    
    public function getStartRange()
    {
        return $this->startRange;
    }

    
    public function getEnd()
    {
        return $this->end;
    }

    
    public function getEndRange()
    {
        return $this->endRange;
    }

    
    public function getLines()
    {
        return $this->lines;
    }

    
    public function setLines(array $Vbkt5laoakgf)
    {
        $this->lines = $Vbkt5laoakgf;
    }
}
