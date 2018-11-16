<?php



namespace Prophecy\Exception\Prophecy;

use Prophecy\Prophecy\ObjectProphecy;

class ObjectProphecyException extends \RuntimeException implements ProphecyException
{
    private $Vh0fkyzc0qaw;

    public function __construct($Vbl4yrmdan1y, ObjectProphecy $Vh0fkyzc0qaw)
    {
        parent::__construct($Vbl4yrmdan1y);

        $this->objectProphecy = $Vh0fkyzc0qaw;
    }

    
    public function getObjectProphecy()
    {
        return $this->objectProphecy;
    }
}
