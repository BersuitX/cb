<?php



namespace Prophecy\Exception\Prediction;

use Prophecy\Prophecy\ObjectProphecy;

class AggregateException extends \RuntimeException implements PredictionException
{
    private $Vgwwocwsbzuo = array();
    private $Vh0fkyzc0qaw;

    public function append(PredictionException $Vzzme31ixifp)
    {
        $Vbl4yrmdan1y = $Vzzme31ixifp->getMessage();
        $Vbl4yrmdan1y = '  '.strtr($Vbl4yrmdan1y, array("\n" => "\n  "))."\n";

        $this->message      = rtrim($this->message.$Vbl4yrmdan1y);
        $this->exceptions[] = $Vzzme31ixifp;
    }

    
    public function getExceptions()
    {
        return $this->exceptions;
    }

    public function setObjectProphecy(ObjectProphecy $Vh0fkyzc0qaw)
    {
        $this->objectProphecy = $Vh0fkyzc0qaw;
    }

    
    public function getObjectProphecy()
    {
        return $this->objectProphecy;
    }
}
