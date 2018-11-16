<?php



class PHPUnit_Framework_MockObject_MockBuilder
{
    
    private $V0yzsmqqj1m3;

    
    private $V31qrja1w0r2;

    
    private $V0yfl5ulns0o = array();

    
    private $Vc3zs2kevdk4 = '';

    
    private $Vlccxd3z4qp1 = array();

    
    private $Vwey0eyoskd3 = true;

    
    private $Vh00k5puxorg = true;

    
    private $Vbzbu05r0wfv = true;

    
    private $V3h3xe1o2lav = false;

    
    private $Vzbcxnhqeuh5 = false;

    
    private $Vp0lqmwkx3ds = null;

    
    public function __construct(PHPUnit_Framework_TestCase $V0yzsmqqj1m3, $V31qrja1w0r2)
    {
        $this->testCase = $V0yzsmqqj1m3;
        $this->type     = $V31qrja1w0r2;
    }

    
    public function getMock()
    {
        return $this->testCase->getMock(
            $this->type,
            $this->methods,
            $this->constructorArgs,
            $this->mockClassName,
            $this->originalConstructor,
            $this->originalClone,
            $this->autoload,
            $this->cloneArguments,
            $this->callOriginalMethods,
            $this->proxyTarget
        );
    }

    
    public function getMockForAbstractClass()
    {
        return $this->testCase->getMockForAbstractClass(
            $this->type,
            $this->constructorArgs,
            $this->mockClassName,
            $this->originalConstructor,
            $this->originalClone,
            $this->autoload,
            $this->methods,
            $this->cloneArguments
        );
    }

    
    public function getMockForTrait()
    {
        return $this->testCase->getMockForTrait(
            $this->type,
            $this->constructorArgs,
            $this->mockClassName,
            $this->originalConstructor,
            $this->originalClone,
            $this->autoload,
            $this->methods,
            $this->cloneArguments
        );
    }

    
    public function setMethods($V0yfl5ulns0o)
    {
        $this->methods = $V0yfl5ulns0o;

        return $this;
    }

    
    public function setConstructorArgs(array $Veox3iprl5oz)
    {
        $this->constructorArgs = $Veox3iprl5oz;

        return $this;
    }

    
    public function setMockClassName($Vgpjmw221p0b)
    {
        $this->mockClassName = $Vgpjmw221p0b;

        return $this;
    }

    
    public function disableOriginalConstructor()
    {
        $this->originalConstructor = false;

        return $this;
    }

    
    public function enableOriginalConstructor()
    {
        $this->originalConstructor = true;

        return $this;
    }

    
    public function disableOriginalClone()
    {
        $this->originalClone = false;

        return $this;
    }

    
    public function enableOriginalClone()
    {
        $this->originalClone = true;

        return $this;
    }

    
    public function disableAutoload()
    {
        $this->autoload = false;

        return $this;
    }

    
    public function enableAutoload()
    {
        $this->autoload = true;

        return $this;
    }

    
    public function disableArgumentCloning()
    {
        $this->cloneArguments = false;

        return $this;
    }

    
    public function enableArgumentCloning()
    {
        $this->cloneArguments = true;

        return $this;
    }

    
    public function enableProxyingToOriginalMethods()
    {
        $this->callOriginalMethods = true;

        return $this;
    }

    
    public function disableProxyingToOriginalMethods()
    {
        $this->callOriginalMethods = false;
        $this->proxyTarget         = null;

        return $this;
    }

    
    public function setProxyTarget($Vbj3pw2f5egf)
    {
        $this->proxyTarget = $Vbj3pw2f5egf;

        return $this;
    }
}
