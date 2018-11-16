<?php



class PHPUnit_Framework_MockObject_InvocationMocker implements PHPUnit_Framework_MockObject_Stub_MatcherCollection, PHPUnit_Framework_MockObject_Invokable, PHPUnit_Framework_MockObject_Builder_Namespace
{
    
    protected $Vofiben0cyqp = array();

    
    protected $Vyflkibc12p5 = array();

    
    public function addMatcher(PHPUnit_Framework_MockObject_Matcher_Invocation $V22uxeddyuqg)
    {
        $this->matchers[] = $V22uxeddyuqg;
    }

    
    public function hasMatchers()
    {
        foreach ($this->matchers as $V22uxeddyuqg) {
            if ($V22uxeddyuqg->hasMatchers()) {
                return true;
            }
        }

        return false;
    }

    
    public function lookupId($V4mdxaz2cfcr)
    {
        if (isset($this->builderMap[$V4mdxaz2cfcr])) {
            return $this->builderMap[$V4mdxaz2cfcr];
        }

        return;
    }

    
    public function registerId($V4mdxaz2cfcr, PHPUnit_Framework_MockObject_Builder_Match $Vi1kw3skqm5b)
    {
        if (isset($this->builderMap[$V4mdxaz2cfcr])) {
            throw new PHPUnit_Framework_Exception(
                'Match builder with id <' . $V4mdxaz2cfcr . '> is already registered.'
            );
        }

        $this->builderMap[$V4mdxaz2cfcr] = $Vi1kw3skqm5b;
    }

    
    public function expects(PHPUnit_Framework_MockObject_Matcher_Invocation $V22uxeddyuqg)
    {
        return new PHPUnit_Framework_MockObject_Builder_InvocationMocker(
            $this,
            $V22uxeddyuqg
        );
    }

    
    public function invoke(PHPUnit_Framework_MockObject_Invocation $Vplre42uzidm)
    {
        $Vzzme31ixifp      = null;
        $Vyqzs3gacdou = false;

        if (strtolower($Vplre42uzidm->methodName) == '__tostring') {
            $Vvsvqhpcr3ye = '';
        } else {
            $Vvsvqhpcr3ye = null;
        }

        foreach ($this->matchers as $Vwetg4hewdr4) {
            try {
                if ($Vwetg4hewdr4->matches($Vplre42uzidm)) {
                    $Vcptarsq5qe4 = $Vwetg4hewdr4->invoked($Vplre42uzidm);

                    if (!$Vyqzs3gacdou) {
                        $Vvsvqhpcr3ye    = $Vcptarsq5qe4;
                        $Vyqzs3gacdou = true;
                    }
                }
            } catch (Exception $Vpt32vvhspnv) {
                $Vzzme31ixifp = $Vpt32vvhspnv;
            }
        }

        if ($Vzzme31ixifp !== null) {
            throw $Vzzme31ixifp;
        }

        return $Vvsvqhpcr3ye;
    }

    
    public function matches(PHPUnit_Framework_MockObject_Invocation $Vplre42uzidm)
    {
        foreach ($this->matchers as $V22uxeddyuqg) {
            if (!$V22uxeddyuqg->matches($Vplre42uzidm)) {
                return false;
            }
        }

        return true;
    }

    
    public function verify()
    {
        foreach ($this->matchers as $V22uxeddyuqg) {
            $V22uxeddyuqg->verify();
        }
    }
}
