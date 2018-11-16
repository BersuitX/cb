<?php



class PHPUnit_Framework_MockObject_Matcher_InvokedCount extends PHPUnit_Framework_MockObject_Matcher_InvokedRecorder
{
    
    protected $V3touerk1rgc;

    
    public function __construct($V3touerk1rgc)
    {
        $this->expectedCount = $V3touerk1rgc;
    }

    
    public function isNever()
    {
        return $this->expectedCount == 0;
    }

    
    public function toString()
    {
        return 'invoked ' . $this->expectedCount . ' time(s)';
    }

    
    public function invoked(PHPUnit_Framework_MockObject_Invocation $Vplre42uzidm)
    {
        parent::invoked($Vplre42uzidm);

        $Vdbkece3gnp5 = $this->getInvocationCount();

        if ($Vdbkece3gnp5 > $this->expectedCount) {
            $Vbl4yrmdan1y = $Vplre42uzidm->toString() . ' ';

            switch ($this->expectedCount) {
                case 0: {
                    $Vbl4yrmdan1y .= 'was not expected to be called.';
                }
                break;

                case 1: {
                    $Vbl4yrmdan1y .= 'was not expected to be called more than once.';
                }
                break;

                default: {
                    $Vbl4yrmdan1y .= sprintf(
                        'was not expected to be called more than %d times.',
                        $this->expectedCount
                    );
                    }
            }

            throw new PHPUnit_Framework_ExpectationFailedException($Vbl4yrmdan1y);
        }
    }

    
    public function verify()
    {
        $Vdbkece3gnp5 = $this->getInvocationCount();

        if ($Vdbkece3gnp5 !== $this->expectedCount) {
            throw new PHPUnit_Framework_ExpectationFailedException(
                sprintf(
                    'Method was expected to be called %d times, ' .
                    'actually called %d times.',
                    $this->expectedCount,
                    $Vdbkece3gnp5
                )
            );
        }
    }
}
