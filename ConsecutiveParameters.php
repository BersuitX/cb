<?php



class PHPUnit_Framework_MockObject_Matcher_ConsecutiveParameters extends PHPUnit_Framework_MockObject_Matcher_StatelessInvocation
{
    
    private $Vi5lucjf5xwm = array();

    
    private $Vncropeq4azu = array();

    
    public function __construct(array $Vgdsvrc2hhci)
    {
        foreach ($Vgdsvrc2hhci as $Vojnsu0ourck => $Vsazp03zrvte) {
            foreach ($Vsazp03zrvte as $Vd51rl30yovf) {
                if (!($Vd51rl30yovf instanceof \PHPUnit_Framework_Constraint)) {
                    $Vd51rl30yovf = new \PHPUnit_Framework_Constraint_IsEqual($Vd51rl30yovf);
                }
                $this->_parameterGroups[$Vojnsu0ourck][] = $Vd51rl30yovf;
            }
        }
    }

    
    public function toString()
    {
        $Vlakcyq2pqgp = 'with consecutive parameters';

        return $Vlakcyq2pqgp;
    }

    
    public function matches(PHPUnit_Framework_MockObject_Invocation $Vplre42uzidm)
    {
        $this->_invocations[] = $Vplre42uzidm;
        $Vwpmqnrl1g2w            = count($this->_invocations) - 1;
        $this->verifyInvocation($Vplre42uzidm, $Vwpmqnrl1g2w);

        return false;
    }

    public function verify()
    {
        foreach ($this->_invocations as $Vwpmqnrl1g2w => $Vplre42uzidm) {
            $this->verifyInvocation($Vplre42uzidm, $Vwpmqnrl1g2w);
        }
    }

    
    private function verifyInvocation(PHPUnit_Framework_MockObject_Invocation $Vplre42uzidm, $Vwpmqnrl1g2w)
    {

        if (isset($this->_parameterGroups[$Vwpmqnrl1g2w])) {
            $Vsazp03zrvte = $this->_parameterGroups[$Vwpmqnrl1g2w];
        } else {
          
            return;
        }

        if ($Vplre42uzidm === null) {
            throw new PHPUnit_Framework_ExpectationFailedException(
                'Mocked method does not exist.'
            );
        }

        if (count($Vplre42uzidm->parameters) < count($Vsazp03zrvte)) {
            throw new PHPUnit_Framework_ExpectationFailedException(
                sprintf(
                    'Parameter count for invocation %s is too low.',
                    $Vplre42uzidm->toString()
                )
            );
        }

        foreach ($Vsazp03zrvte as $Vxja1abp34yq => $Vd51rl30yovf) {
            $Vd51rl30yovf->evaluate(
                $Vplre42uzidm->parameters[$Vxja1abp34yq],
                sprintf(
                    'Parameter %s for invocation #%d %s does not match expected ' .
                    'value.',
                    $Vxja1abp34yq,
                    $Vwpmqnrl1g2w,
                    $Vplre42uzidm->toString()
                )
            );
        }
    }
}
