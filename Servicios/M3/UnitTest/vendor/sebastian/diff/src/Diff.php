<?php


namespace SebastianBergmann\Diff;

class Diff
{
    
    private $V2435fgfpotg;

    
    private $Vusanxtmh52m;

    
    private $Vhafyjzhwhdi;

    
    public function __construct($V2435fgfpotg, $Vusanxtmh52m, array $Vhafyjzhwhdi = array())
    {
        $this->from   = $V2435fgfpotg;
        $this->to     = $Vusanxtmh52m;
        $this->chunks = $Vhafyjzhwhdi;
    }

    
    public function getFrom()
    {
        return $this->from;
    }

    
    public function getTo()
    {
        return $this->to;
    }

    
    public function getChunks()
    {
        return $this->chunks;
    }

    
    public function setChunks(array $Vhafyjzhwhdi)
    {
        $this->chunks = $Vhafyjzhwhdi;
    }
}
