<?php



class PHPUnit_Framework_MockObject_Builder_InvocationMocker implements PHPUnit_Framework_MockObject_Builder_MethodNameMatch
{
    
    protected $Vzqigh1du0lt;

    
    protected $V22uxeddyuqg;

    
    public function __construct(PHPUnit_Framework_MockObject_Stub_MatcherCollection $Vzqigh1du0lt, PHPUnit_Framework_MockObject_Matcher_Invocation $Vgltuvvi4eqa)
    {
        $this->collection = $Vzqigh1du0lt;
        $this->matcher    = new PHPUnit_Framework_MockObject_Matcher(
            $Vgltuvvi4eqa
        );

        $this->collection->addMatcher($this->matcher);
    }

    
    public function getMatcher()
    {
        return $this->matcher;
    }

    
    public function id($V4mdxaz2cfcr)
    {
        $this->collection->registerId($V4mdxaz2cfcr, $this);

        return $this;
    }

    
    public function will(PHPUnit_Framework_MockObject_Stub $Vaafq2jgpind)
    {
        $this->matcher->stub = $Vaafq2jgpind;

        return $this;
    }

    
    public function willReturn($Vcptarsq5qe4)
    {
        $Vaafq2jgpind = new PHPUnit_Framework_MockObject_Stub_Return(
            $Vcptarsq5qe4
        );

        return $this->will($Vaafq2jgpind);
    }

    
    public function willReturnMap(array $Vcptarsq5qe4Map)
    {
        $Vaafq2jgpind = new PHPUnit_Framework_MockObject_Stub_ReturnValueMap(
            $Vcptarsq5qe4Map
        );

        return $this->will($Vaafq2jgpind);
    }

    
    public function willReturnArgument($Vez5gbw2si3p)
    {
        $Vaafq2jgpind = new PHPUnit_Framework_MockObject_Stub_ReturnArgument(
            $Vez5gbw2si3p
        );

        return $this->will($Vaafq2jgpind);
    }

    
    public function willReturnCallback($Vbbxwjhhenxj)
    {
        $Vaafq2jgpind = new PHPUnit_Framework_MockObject_Stub_ReturnCallback(
            $Vbbxwjhhenxj
        );

        return $this->will($Vaafq2jgpind);
    }

    
    public function willReturnSelf()
    {
        $Vaafq2jgpind = new PHPUnit_Framework_MockObject_Stub_ReturnSelf();

        return $this->will($Vaafq2jgpind);
    }

    
    public function willReturnOnConsecutiveCalls()
    {
        $Veox3iprl5oz = func_get_args();

        $Vaafq2jgpind = new PHPUnit_Framework_MockObject_Stub_ConsecutiveCalls($Veox3iprl5oz);

        return $this->will($Vaafq2jgpind);
    }

    
    public function willThrowException(Exception $Vzzme31ixifp)
    {
        $Vaafq2jgpind = new PHPUnit_Framework_MockObject_Stub_Exception($Vzzme31ixifp);

        return $this->will($Vaafq2jgpind);
    }

    
    public function after($V4mdxaz2cfcr)
    {
        $this->matcher->afterMatchBuilderId = $V4mdxaz2cfcr;

        return $this;
    }

    
    private function canDefineParameters()
    {
        if ($this->matcher->methodNameMatcher === null) {
            throw new PHPUnit_Framework_Exception(
                'Method name matcher is not defined, cannot define parameter ' .
                ' matcher without one'
            );
        }

        if ($this->matcher->parametersMatcher !== null) {
            throw new PHPUnit_Framework_Exception(
                'Parameter matcher is already defined, cannot redefine'
            );
        }
    }

    
    public function with()
    {
        $Veox3iprl5oz = func_get_args();

        $this->canDefineParameters();

        $this->matcher->parametersMatcher = new PHPUnit_Framework_MockObject_Matcher_Parameters($Veox3iprl5oz);

        return $this;
    }

    
    public function withConsecutive()
    {

        $Veox3iprl5oz = func_get_args();

        $this->canDefineParameters();

        $this->matcher->parametersMatcher =
          new PHPUnit_Framework_MockObject_Matcher_ConsecutiveParameters($Veox3iprl5oz);

        return $this;
    }

    
    public function withAnyParameters()
    {
        $this->canDefineParameters();

        $this->matcher->parametersMatcher = new PHPUnit_Framework_MockObject_Matcher_AnyParameters;

        return $this;
    }

    
    public function method($Veup52kdjcwg)
    {
        if ($this->matcher->methodNameMatcher !== null) {
            throw new PHPUnit_Framework_Exception(
                'Method name matcher is already defined, cannot redefine'
            );
        }

        $this->matcher->methodNameMatcher = new PHPUnit_Framework_MockObject_Matcher_MethodName($Veup52kdjcwg);

        return $this;
    }
}
