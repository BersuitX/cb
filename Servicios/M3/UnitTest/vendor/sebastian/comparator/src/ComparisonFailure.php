<?php


namespace SebastianBergmann\Comparator;

use SebastianBergmann\Diff\Differ;


class ComparisonFailure extends \RuntimeException
{
    
    protected $Vwcb1oykhumm;

    
    protected $Vs4nw03sqcam;

    
    protected $Vwcb1oykhummAsString;

    
    protected $Vs4nw03sqcamAsString;

    
    protected $V0ni2gqaeoum;

    
    protected $Vbl4yrmdan1y;

    
    public function __construct($Vwcb1oykhumm, $Vs4nw03sqcam, $Vwcb1oykhummAsString, $Vs4nw03sqcamAsString, $V0ni2gqaeoum = false, $Vbl4yrmdan1y = '')
    {
        $this->expected         = $Vwcb1oykhumm;
        $this->actual           = $Vs4nw03sqcam;
        $this->expectedAsString = $Vwcb1oykhummAsString;
        $this->actualAsString   = $Vs4nw03sqcamAsString;
        $this->message          = $Vbl4yrmdan1y;
    }

    
    public function getActual()
    {
        return $this->actual;
    }

    
    public function getExpected()
    {
        return $this->expected;
    }

    
    public function getActualAsString()
    {
        return $this->actualAsString;
    }

    
    public function getExpectedAsString()
    {
        return $this->expectedAsString;
    }

    
    public function getDiff()
    {
        if (!$this->actualAsString && !$this->expectedAsString) {
            return '';
        }

        $Vyxeqxkac2bx = new Differ("\n--- Expected\n+++ Actual\n");

        return $Vyxeqxkac2bx->diff($this->expectedAsString, $this->actualAsString);
    }

    
    public function toString()
    {
        return $this->message . $this->getDiff();
    }
}
