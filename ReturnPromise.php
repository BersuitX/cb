<?php



namespace Prophecy\Promise;

use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophecy\MethodProphecy;


class ReturnPromise implements PromiseInterface
{
    private $Vwkbrhzdkghw = array();

    
    public function __construct(array $Vwkbrhzdkghw)
    {
        $this->returnValues = $Vwkbrhzdkghw;
    }

    
    public function execute(array $Veox3iprl5oz, ObjectProphecy $Vbj3pw2f5egf, MethodProphecy $Vtlfvdwskdge)
    {
        $Vcptarsq5qe4 = array_shift($this->returnValues);

        if (!count($this->returnValues)) {
            $this->returnValues[] = $Vcptarsq5qe4;
        }

        return $Vcptarsq5qe4;
    }
}
