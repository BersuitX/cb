<?php



namespace Prophecy\Exception\Doubler;

class MethodNotFoundException extends DoubleException
{
    
    private $V3ngkdmbo02c;

    
    private $Vc1exo5hbki5;

    
    private $Vj23lbel2xn0;

    
    public function __construct($Vbl4yrmdan1y, $V3ngkdmbo02c, $Vc1exo5hbki5, $Vj23lbel2xn0 = null)
    {
        parent::__construct($Vbl4yrmdan1y);

        $this->classname  = $V3ngkdmbo02c;
        $this->methodName = $Vc1exo5hbki5;
        $this->arguments = $Vj23lbel2xn0;
    }

    public function getClassname()
    {
        return $this->classname;
    }

    public function getMethodName()
    {
        return $this->methodName;
    }

    public function getArguments()
    {
        return $this->arguments;
    }
}
