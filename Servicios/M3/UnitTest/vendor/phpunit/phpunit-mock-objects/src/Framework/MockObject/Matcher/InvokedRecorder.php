<?php



abstract class PHPUnit_Framework_MockObject_Matcher_InvokedRecorder implements PHPUnit_Framework_MockObject_Matcher_Invocation
{
    
    protected $Vmuscgraplzi = array();

    
    public function getInvocationCount()
    {
        return count($this->invocations);
    }

    
    public function getInvocations()
    {
        return $this->invocations;
    }

    
    public function hasBeenInvoked()
    {
        return count($this->invocations) > 0;
    }

    
    public function invoked(PHPUnit_Framework_MockObject_Invocation $Vplre42uzidm)
    {
        $this->invocations[] = $Vplre42uzidm;
    }

    
    public function matches(PHPUnit_Framework_MockObject_Invocation $Vplre42uzidm)
    {
        return true;
    }
}
