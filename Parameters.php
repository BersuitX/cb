<?php



class PHPUnit_Framework_MockObject_Matcher_Parameters extends PHPUnit_Framework_MockObject_Matcher_StatelessInvocation
{
    
    protected $Vsazp03zrvte = array();

    
    protected $Vplre42uzidm;

    
    public function __construct(array $Vsazp03zrvte)
    {
        foreach ($Vsazp03zrvte as $Vd51rl30yovf) {
            if (!($Vd51rl30yovf instanceof PHPUnit_Framework_Constraint)) {
                $Vd51rl30yovf = new PHPUnit_Framework_Constraint_IsEqual(
                    $Vd51rl30yovf
                );
            }

            $this->parameters[] = $Vd51rl30yovf;
        }
    }

    
    public function toString()
    {
        $Vlakcyq2pqgp = 'with parameter';

        foreach ($this->parameters as $Vojnsu0ourck => $Vd51rl30yovf) {
            if ($Vojnsu0ourck > 0) {
                $Vlakcyq2pqgp .= ' and';
            }

            $Vlakcyq2pqgp .= ' ' . $Vojnsu0ourck . ' ' . $Vd51rl30yovf->toString();
        }

        return $Vlakcyq2pqgp;
    }

    
    public function matches(PHPUnit_Framework_MockObject_Invocation $Vplre42uzidm)
    {
        $this->invocation = $Vplre42uzidm;

        return $this->verify();
    }

    
    public function verify()
    {
        if ($this->invocation === null) {
            throw new PHPUnit_Framework_ExpectationFailedException(
                'Mocked method does not exist.'
            );
        }

        if (count($this->invocation->parameters) < count($this->parameters)) {
            $Vbl4yrmdan1y = 'Parameter count for invocation %s is too low.';

            
            
            
            
            if (count($this->parameters) === 1 &&
                get_class($this->parameters[0]) === 'PHPUnit_Framework_Constraint_IsAnything') {
                $Vbl4yrmdan1y .= "\nTo allow 0 or more parameters with any value, omit ->with() or use ->withAnyParameters() instead.";
            }

            throw new PHPUnit_Framework_ExpectationFailedException(
                sprintf($Vbl4yrmdan1y, $this->invocation->toString())
            );
        }

        foreach ($this->parameters as $Vxja1abp34yq => $Vd51rl30yovf) {
            $Vd51rl30yovf->evaluate(
                $this->invocation->parameters[$Vxja1abp34yq],
                sprintf(
                    'Parameter %s for invocation %s does not match expected ' .
                    'value.',
                    $Vxja1abp34yq,
                    $this->invocation->toString()
                )
            );
        }

        return true;
    }
}
