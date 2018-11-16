<?php



namespace Prophecy\Exception\Prediction;

use Prophecy\Prophecy\MethodProphecy;
use Prophecy\Exception\Prophecy\MethodProphecyException;

class UnexpectedCallsException extends MethodProphecyException implements PredictionException
{
    private $Vqk0kzw04abh = array();

    public function __construct($Vbl4yrmdan1y, MethodProphecy $Vl4x0cix3k15, array $Vqk0kzw04abh)
    {
        parent::__construct($Vbl4yrmdan1y, $Vl4x0cix3k15);

        $this->calls = $Vqk0kzw04abh;
    }

    public function getCalls()
    {
        return $this->calls;
    }
}
