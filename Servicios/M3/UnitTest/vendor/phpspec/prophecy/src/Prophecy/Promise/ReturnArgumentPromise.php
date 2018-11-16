<?php



namespace Prophecy\Promise;

use Prophecy\Exception\InvalidArgumentException;
use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophecy\MethodProphecy;


class ReturnArgumentPromise implements PromiseInterface
{
    
    private $Vojnsu0ourck;

    
    public function __construct($Vojnsu0ourck = 0)
    {
        if (!is_int($Vojnsu0ourck) || $Vojnsu0ourck < 0) {
            throw new InvalidArgumentException(sprintf(
                'Zero-based index expected as argument to ReturnArgumentPromise, but got %s.',
                $Vojnsu0ourck
            ));
        }
        $this->index = $Vojnsu0ourck;
    }

    
    public function execute(array $Veox3iprl5oz, ObjectProphecy $Vbj3pw2f5egf, MethodProphecy $Vtlfvdwskdge)
    {
        return count($Veox3iprl5oz) > $this->index ? $Veox3iprl5oz[$this->index] : null;
    }
}
