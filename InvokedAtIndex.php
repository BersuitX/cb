<?php



class PHPUnit_Framework_MockObject_Matcher_InvokedAtIndex implements PHPUnit_Framework_MockObject_Matcher_Invocation
{
    
    protected $Vdr1vltull13;

    
    protected $Vtygnth3f5ha = -1;

    
    public function __construct($Vdr1vltull13)
    {
        $this->sequenceIndex = $Vdr1vltull13;
    }

    
    public function toString()
    {
        return 'invoked at sequence index ' . $this->sequenceIndex;
    }

    
    public function matches(PHPUnit_Framework_MockObject_Invocation $Vplre42uzidm)
    {
        $this->currentIndex++;

        return $this->currentIndex == $this->sequenceIndex;
    }

    
    public function invoked(PHPUnit_Framework_MockObject_Invocation $Vplre42uzidm)
    {
    }

    
    public function verify()
    {
        if ($this->currentIndex < $this->sequenceIndex) {
            throw new PHPUnit_Framework_ExpectationFailedException(
                sprintf(
                    'The expected invocation at index %s was never reached.',
                    $this->sequenceIndex
                )
            );
        }
    }
}
