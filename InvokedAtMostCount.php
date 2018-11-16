<?php



class PHPUnit_Framework_MockObject_Matcher_InvokedAtMostCount extends PHPUnit_Framework_MockObject_Matcher_InvokedRecorder
{
    
    private $Vqtnfa0rd45f;

    
    public function __construct($Vqtnfa0rd45f)
    {
        $this->allowedInvocations = $Vqtnfa0rd45f;
    }

    
    public function toString()
    {
        return 'invoked at most ' . $this->allowedInvocations . ' times';
    }

    
    public function verify()
    {
        $Vdbkece3gnp5 = $this->getInvocationCount();

        if ($Vdbkece3gnp5 > $this->allowedInvocations) {
            throw new PHPUnit_Framework_ExpectationFailedException(
                'Expected invocation at most ' . $this->allowedInvocations .
                ' times but it occured ' . $Vdbkece3gnp5 . ' time(s).'
            );
        }
    }
}
