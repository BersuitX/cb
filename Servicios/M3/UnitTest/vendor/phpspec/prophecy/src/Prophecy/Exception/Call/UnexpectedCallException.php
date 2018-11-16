<?php



namespace Prophecy\Exception\Call;

use Prophecy\Exception\Prophecy\ObjectProphecyException;
use Prophecy\Prophecy\ObjectProphecy;

class UnexpectedCallException extends ObjectProphecyException
{
    private $Vc1exo5hbki5;
    private $Vj23lbel2xn0;

    public function __construct($Vbl4yrmdan1y, ObjectProphecy $Vh0fkyzc0qaw,
                                $Vc1exo5hbki5, array $Vj23lbel2xn0)
    {
        parent::__construct($Vbl4yrmdan1y, $Vh0fkyzc0qaw);

        $this->methodName = $Vc1exo5hbki5;
        $this->arguments = $Vj23lbel2xn0;
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
