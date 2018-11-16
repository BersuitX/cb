<?php



class PHPUnit_Framework_MockObject_Matcher implements PHPUnit_Framework_MockObject_Matcher_Invocation
{
    
    public $Vgltuvvi4eqa;

    
    public $Vesgokqynyy3 = null;

    
    public $V5yktclidm1d = false;

    
    public $Vu1zrfkm10eq = null;

    
    public $Vd3dit1ndk0k = null;

    
    public $Vaafq2jgpind = null;

    
    public function __construct(PHPUnit_Framework_MockObject_Matcher_Invocation $Vgltuvvi4eqa)
    {
        $this->invocationMatcher = $Vgltuvvi4eqa;
    }

    
    public function toString()
    {
        $Vautxf03llyt = array();

        if ($this->invocationMatcher !== null) {
            $Vautxf03llyt[] = $this->invocationMatcher->toString();
        }

        if ($this->methodNameMatcher !== null) {
            $Vautxf03llyt[] = 'where ' . $this->methodNameMatcher->toString();
        }

        if ($this->parametersMatcher !== null) {
            $Vautxf03llyt[] = 'and ' . $this->parametersMatcher->toString();
        }

        if ($this->afterMatchBuilderId !== null) {
            $Vautxf03llyt[] = 'after ' . $this->afterMatchBuilderId;
        }

        if ($this->stub !== null) {
            $Vautxf03llyt[] = 'will ' . $this->stub->toString();
        }

        return implode(' ', $Vautxf03llyt);
    }

    
    public function invoked(PHPUnit_Framework_MockObject_Invocation $Vplre42uzidm)
    {
        if ($this->invocationMatcher === null) {
            throw new PHPUnit_Framework_Exception(
                'No invocation matcher is set'
            );
        }

        if ($this->methodNameMatcher === null) {
            throw new PHPUnit_Framework_Exception('No method matcher is set');
        }

        if ($this->afterMatchBuilderId !== null) {
            $Vi1kw3skqm5b = $Vplre42uzidm->object
                                  ->__phpunit_getInvocationMocker()
                                  ->lookupId($this->afterMatchBuilderId);

            if (!$Vi1kw3skqm5b) {
                throw new PHPUnit_Framework_Exception(
                    sprintf(
                        'No builder found for match builder identification <%s>',
                        $this->afterMatchBuilderId
                    )
                );
            }

            $V22uxeddyuqg = $Vi1kw3skqm5b->getMatcher();

            if ($V22uxeddyuqg && $V22uxeddyuqg->invocationMatcher->hasBeenInvoked()) {
                $this->afterMatchBuilderIsInvoked = true;
            }
        }

        $this->invocationMatcher->invoked($Vplre42uzidm);

        try {
            if ($this->parametersMatcher !== null &&
                !$this->parametersMatcher->matches($Vplre42uzidm)) {
                $this->parametersMatcher->verify();
            }
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            throw new PHPUnit_Framework_ExpectationFailedException(
                sprintf(
                    "Expectation failed for %s when %s\n%s",
                    $this->methodNameMatcher->toString(),
                    $this->invocationMatcher->toString(),
                    $Vpt32vvhspnv->getMessage()
                ),
                $Vpt32vvhspnv->getComparisonFailure()
            );
        }

        if ($this->stub) {
            return $this->stub->invoke($Vplre42uzidm);
        }

        return;
    }

    
    public function matches(PHPUnit_Framework_MockObject_Invocation $Vplre42uzidm)
    {
        if ($this->afterMatchBuilderId !== null) {
            $Vi1kw3skqm5b = $Vplre42uzidm->object
                                  ->__phpunit_getInvocationMocker()
                                  ->lookupId($this->afterMatchBuilderId);

            if (!$Vi1kw3skqm5b) {
                throw new PHPUnit_Framework_Exception(
                    sprintf(
                        'No builder found for match builder identification <%s>',
                        $this->afterMatchBuilderId
                    )
                );
            }

            $V22uxeddyuqg = $Vi1kw3skqm5b->getMatcher();

            if (!$V22uxeddyuqg) {
                return false;
            }

            if (!$V22uxeddyuqg->invocationMatcher->hasBeenInvoked()) {
                return false;
            }
        }

        if ($this->invocationMatcher === null) {
            throw new PHPUnit_Framework_Exception(
                'No invocation matcher is set'
            );
        }

        if ($this->methodNameMatcher === null) {
            throw new PHPUnit_Framework_Exception('No method matcher is set');
        }

        if (!$this->invocationMatcher->matches($Vplre42uzidm)) {
            return false;
        }

        try {
            if (!$this->methodNameMatcher->matches($Vplre42uzidm)) {
                return false;
            }
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            throw new PHPUnit_Framework_ExpectationFailedException(
                sprintf(
                    "Expectation failed for %s when %s\n%s",
                    $this->methodNameMatcher->toString(),
                    $this->invocationMatcher->toString(),
                    $Vpt32vvhspnv->getMessage()
                ),
                $Vpt32vvhspnv->getComparisonFailure()
            );
        }

        return true;
    }

    
    public function verify()
    {
        if ($this->invocationMatcher === null) {
            throw new PHPUnit_Framework_Exception(
                'No invocation matcher is set'
            );
        }

        if ($this->methodNameMatcher === null) {
            throw new PHPUnit_Framework_Exception('No method matcher is set');
        }

        try {
            $this->invocationMatcher->verify();

            if ($this->parametersMatcher === null) {
                $this->parametersMatcher = new PHPUnit_Framework_MockObject_Matcher_AnyParameters;
            }

            $Vplre42uzidmIsAny   = get_class($this->invocationMatcher) === 'PHPUnit_Framework_MockObject_Matcher_AnyInvokedCount';
            $Vplre42uzidmIsNever = get_class($this->invocationMatcher) === 'PHPUnit_Framework_MockObject_Matcher_InvokedCount' && $this->invocationMatcher->isNever();
            if (!$Vplre42uzidmIsAny && !$Vplre42uzidmIsNever) {
                $this->parametersMatcher->verify();
            }
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            throw new PHPUnit_Framework_ExpectationFailedException(
                sprintf(
                    "Expectation failed for %s when %s.\n%s",
                    $this->methodNameMatcher->toString(),
                    $this->invocationMatcher->toString(),
                    PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
                )
            );
        }
    }

    
    public function hasMatchers()
    {
        if ($this->invocationMatcher !== null &&
            !$this->invocationMatcher instanceof PHPUnit_Framework_MockObject_Matcher_AnyInvokedCount) {
            return true;
        }

        return false;
    }
}
