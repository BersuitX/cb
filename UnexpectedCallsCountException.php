<?php



namespace Prophecy\Exception\Prediction;

use Prophecy\Prophecy\MethodProphecy;

class UnexpectedCallsCountException extends UnexpectedCallsException
{
    private $V3touerk1rgc;

    public function __construct($Vbl4yrmdan1y, MethodProphecy $Vl4x0cix3k15, $Vdbkece3gnp5, array $Vqk0kzw04abh)
    {
        parent::__construct($Vbl4yrmdan1y, $Vl4x0cix3k15, $Vqk0kzw04abh);

        $this->expectedCount = intval($Vdbkece3gnp5);
    }

    public function getExpectedCount()
    {
        return $this->expectedCount;
    }
}
