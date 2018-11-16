<?php



namespace Prophecy\Exception\Prophecy;

use Prophecy\Prophecy\MethodProphecy;

class MethodProphecyException extends ObjectProphecyException
{
    private $Vl4x0cix3k15;

    public function __construct($Vbl4yrmdan1y, MethodProphecy $Vl4x0cix3k15)
    {
        parent::__construct($Vbl4yrmdan1y, $Vl4x0cix3k15->getObjectProphecy());

        $this->methodProphecy = $Vl4x0cix3k15;
    }

    
    public function getMethodProphecy()
    {
        return $this->methodProphecy;
    }
}
