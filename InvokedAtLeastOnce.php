<?php



class PHPUnit_Framework_MockObject_Matcher_InvokedAtLeastOnce extends PHPUnit_Framework_MockObject_Matcher_InvokedRecorder
{
    
    public function toString()
    {
        return 'invoked at least once';
    }

    
    public function verify()
    {
        $Vdbkece3gnp5 = $this->getInvocationCount();

        if ($Vdbkece3gnp5 < 1) {
            throw new PHPUnit_Framework_ExpectationFailedException(
                'Expected invocation at least once but it never occured.'
            );
        }
    }
}
