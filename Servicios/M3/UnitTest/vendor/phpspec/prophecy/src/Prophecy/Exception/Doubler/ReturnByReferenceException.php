<?php



namespace Prophecy\Exception\Doubler;

class ReturnByReferenceException extends DoubleException
{
    private $V3ngkdmbo02c;
    private $Vc1exo5hbki5;

    
    public function __construct($Vbl4yrmdan1y, $V3ngkdmbo02c, $Vc1exo5hbki5)
    {
        parent::__construct($Vbl4yrmdan1y);

        $this->classname  = $V3ngkdmbo02c;
        $this->methodName = $Vc1exo5hbki5;
    }

    public function getClassname()
    {
        return $this->classname;
    }

    public function getMethodName()
    {
        return $this->methodName;
    }
}
