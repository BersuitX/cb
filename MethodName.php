<?php



class PHPUnit_Framework_MockObject_Matcher_MethodName extends PHPUnit_Framework_MockObject_Matcher_StatelessInvocation
{
    
    protected $Veup52kdjcwg;

    
    public function __construct($Veup52kdjcwg)
    {
        if (!$Veup52kdjcwg instanceof PHPUnit_Framework_Constraint) {
            if (!is_string($Veup52kdjcwg)) {
                throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
            }

            $Veup52kdjcwg = new PHPUnit_Framework_Constraint_IsEqual(
                $Veup52kdjcwg,
                0,
                10,
                false,
                true
            );
        }

        $this->constraint = $Veup52kdjcwg;
    }

    
    public function toString()
    {
        return 'method name ' . $this->constraint->toString();
    }

    
    public function matches(PHPUnit_Framework_MockObject_Invocation $Vplre42uzidm)
    {
        return $this->constraint->evaluate($Vplre42uzidm->methodName, '', true);
    }
}
