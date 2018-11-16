<?php



class PHPUnit_Framework_MockObject_Matcher_InvokedAtLeastCount extends PHPUnit_Framework_MockObject_Matcher_InvokedRecorder
{
    
    private $V3in34tzmwwm;

    
    public function __construct($V3in34tzmwwm)
    {
        $this->requiredInvocations = $V3in34tzmwwm;
    }

    
    public function toString()
    {
        return 'invoked at least ' . $this->requiredInvocations . ' times';
    }

    
    public function verify()
    {
        $Vdbkece3gnp5 = $this->getInvocationCount();

        if ($Vdbkece3gnp5 < $this->requiredInvocations) {
            throw new PHPUnit_Framework_ExpectationFailedException(
                'Expected invocation at least ' . $this->requiredInvocations .
                ' times but it occured ' . $Vdbkece3gnp5 . ' time(s).'
            );
        }
    }
}
