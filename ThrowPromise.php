<?php



namespace Prophecy\Promise;

use Doctrine\Instantiator\Instantiator;
use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophecy\MethodProphecy;
use Prophecy\Exception\InvalidArgumentException;
use ReflectionClass;


class ThrowPromise implements PromiseInterface
{
    private $Vzzme31ixifp;

    
    private $Vy3pdqdzoqga;

    
    public function __construct($Vzzme31ixifp)
    {
        if (is_string($Vzzme31ixifp)) {
            if (!class_exists($Vzzme31ixifp) || !$this->isAValidThrowable($Vzzme31ixifp)) {
                throw new InvalidArgumentException(sprintf(
                    'Exception / Throwable class or instance expected as argument to ThrowPromise, but got %s.',
                    $Vzzme31ixifp
                ));
            }
        } elseif (!$Vzzme31ixifp instanceof \Exception && !$Vzzme31ixifp instanceof \Throwable) {
            throw new InvalidArgumentException(sprintf(
                'Exception / Throwable class or instance expected as argument to ThrowPromise, but got %s.',
                is_object($Vzzme31ixifp) ? get_class($Vzzme31ixifp) : gettype($Vzzme31ixifp)
            ));
        }

        $this->exception = $Vzzme31ixifp;
    }

    
    public function execute(array $Veox3iprl5oz, ObjectProphecy $Vbj3pw2f5egf, MethodProphecy $Vtlfvdwskdge)
    {
        if (is_string($this->exception)) {
            $V3ngkdmbo02c   = $this->exception;
            $Vjqwoq0sz3ty  = new ReflectionClass($V3ngkdmbo02c);
            $V4yt0oahsnhs = $Vjqwoq0sz3ty->getConstructor();

            if ($V4yt0oahsnhs->isPublic() && 0 == $V4yt0oahsnhs->getNumberOfRequiredParameters()) {
                throw $Vjqwoq0sz3ty->newInstance();
            }

            if (!$this->instantiator) {
                $this->instantiator = new Instantiator();
            }

            throw $this->instantiator->instantiate($V3ngkdmbo02c);
        }

        throw $this->exception;
    }

    
    private function isAValidThrowable($Vzzme31ixifp)
    {
        return is_a($Vzzme31ixifp, 'Exception', true) || is_subclass_of($Vzzme31ixifp, 'Throwable', true);
    }
}
