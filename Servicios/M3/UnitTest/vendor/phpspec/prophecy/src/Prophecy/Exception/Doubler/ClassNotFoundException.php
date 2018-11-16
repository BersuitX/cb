<?php



namespace Prophecy\Exception\Doubler;

class ClassNotFoundException extends DoubleException
{
    private $V3ngkdmbo02c;

    
    public function __construct($Vbl4yrmdan1y, $V3ngkdmbo02c)
    {
        parent::__construct($Vbl4yrmdan1y);

        $this->classname = $V3ngkdmbo02c;
    }

    public function getClassname()
    {
        return $this->classname;
    }
}
