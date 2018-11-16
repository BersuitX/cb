<?php



namespace Prophecy\Prophecy;

use Prophecy\Argument;
use Prophecy\Prophet;
use Prophecy\Promise;
use Prophecy\Prediction;
use Prophecy\Exception\Doubler\MethodNotFoundException;
use Prophecy\Exception\InvalidArgumentException;
use Prophecy\Exception\Prophecy\MethodProphecyException;


class MethodProphecy
{
    private $Vh0fkyzc0qaw;
    private $Vc1exo5hbki5;
    private $Vat3xtzxg2nq;
    private $Vcbqbslxtnd4;
    private $V0jgsiypbrsg;
    private $Vs0ymtrpb1ov = array();
    private $Vu13fnlq3mrb = false;
    private $Ver24yjsnrcz = false;

    
    public function __construct(ObjectProphecy $Vh0fkyzc0qaw, $Vc1exo5hbki5, $Vj23lbel2xn0 = null)
    {
        $Vyikircvzioe = $Vh0fkyzc0qaw->reveal();
        if (!method_exists($Vyikircvzioe, $Vc1exo5hbki5)) {
            throw new MethodNotFoundException(sprintf(
                'Method `%s::%s()` is not defined.', get_class($Vyikircvzioe), $Vc1exo5hbki5
            ), get_class($Vyikircvzioe), $Vc1exo5hbki5, $Vj23lbel2xn0);
        }

        $this->objectProphecy = $Vh0fkyzc0qaw;
        $this->methodName     = $Vc1exo5hbki5;

        $V34t2jmuxyws = new \ReflectionMethod($Vyikircvzioe, $Vc1exo5hbki5);
        if ($V34t2jmuxyws->isFinal()) {
            throw new MethodProphecyException(sprintf(
                "Can not add prophecy for a method `%s::%s()`\n".
                "as it is a final method.",
                get_class($Vyikircvzioe),
                $Vc1exo5hbki5
            ), $this);
        }

        if (null !== $Vj23lbel2xn0) {
            $this->withArguments($Vj23lbel2xn0);
        }

        if (version_compare(PHP_VERSION, '7.0', '>=') && true === $V34t2jmuxyws->hasReturnType()) {
            $V31qrja1w0r2 = (string) $V34t2jmuxyws->getReturnType();

            if ('void' === $V31qrja1w0r2) {
                $this->voidReturnType = true;
                return;
            }

            $this->will(function () use ($V31qrja1w0r2) {
                switch ($V31qrja1w0r2) {
                    case 'string': return '';
                    case 'float':  return 0.0;
                    case 'int':    return 0;
                    case 'bool':   return false;
                    case 'array':  return array();

                    case 'callable':
                    case 'Closure':
                        return function () {};

                    case 'Traversable':
                    case 'Generator':
                        
                        
                        $Vi5uqhlkbfzi = eval('return function () { yield; };');
                        return $Vi5uqhlkbfzi();

                    default:
                        $Vtmqbbauby5a = new Prophet;
                        return $Vtmqbbauby5a->prophesize($V31qrja1w0r2)->reveal();
                }
            });
        }
    }

    
    public function withArguments($Vj23lbel2xn0)
    {
        if (is_array($Vj23lbel2xn0)) {
            $Vj23lbel2xn0 = new Argument\ArgumentsWildcard($Vj23lbel2xn0);
        }

        if (!$Vj23lbel2xn0 instanceof Argument\ArgumentsWildcard) {
            throw new InvalidArgumentException(sprintf(
                "Either an array or an instance of ArgumentsWildcard expected as\n".
                'a `MethodProphecy::withArguments()` argument, but got %s.',
                gettype($Vj23lbel2xn0)
            ));
        }

        $this->argumentsWildcard = $Vj23lbel2xn0;

        return $this;
    }

    
    public function will($Vcbqbslxtnd4)
    {
        if (is_callable($Vcbqbslxtnd4)) {
            $Vcbqbslxtnd4 = new Promise\CallbackPromise($Vcbqbslxtnd4);
        }

        if (!$Vcbqbslxtnd4 instanceof Promise\PromiseInterface) {
            throw new InvalidArgumentException(sprintf(
                'Expected callable or instance of PromiseInterface, but got %s.',
                gettype($Vcbqbslxtnd4)
            ));
        }

        $this->bindToObjectProphecy();
        $this->promise = $Vcbqbslxtnd4;

        return $this;
    }

    
    public function willReturn()
    {
        if ($this->voidReturnType) {
            throw new MethodProphecyException(
                "The method \"$this->methodName\" has a void return type, and so cannot return anything",
                $this
            );
        }

        return $this->will(new Promise\ReturnPromise(func_get_args()));
    }

    
    public function willReturnArgument($Vojnsu0ourck = 0)
    {
        if ($this->voidReturnType) {
            throw new MethodProphecyException("The method \"$this->methodName\" has a void return type", $this);
        }

        return $this->will(new Promise\ReturnArgumentPromise($Vojnsu0ourck));
    }

    
    public function willThrow($Vzzme31ixifp)
    {
        return $this->will(new Promise\ThrowPromise($Vzzme31ixifp));
    }

    
    public function should($V0jgsiypbrsg)
    {
        if (is_callable($V0jgsiypbrsg)) {
            $V0jgsiypbrsg = new Prediction\CallbackPrediction($V0jgsiypbrsg);
        }

        if (!$V0jgsiypbrsg instanceof Prediction\PredictionInterface) {
            throw new InvalidArgumentException(sprintf(
                'Expected callable or instance of PredictionInterface, but got %s.',
                gettype($V0jgsiypbrsg)
            ));
        }

        $this->bindToObjectProphecy();
        $this->prediction = $V0jgsiypbrsg;

        return $this;
    }

    
    public function shouldBeCalled()
    {
        return $this->should(new Prediction\CallPrediction);
    }

    
    public function shouldNotBeCalled()
    {
        return $this->should(new Prediction\NoCallsPrediction);
    }

    
    public function shouldBeCalledTimes($Vdbkece3gnp5)
    {
        return $this->should(new Prediction\CallTimesPrediction($Vdbkece3gnp5));
    }

    
    public function shouldHave($V0jgsiypbrsg)
    {
        if (is_callable($V0jgsiypbrsg)) {
            $V0jgsiypbrsg = new Prediction\CallbackPrediction($V0jgsiypbrsg);
        }

        if (!$V0jgsiypbrsg instanceof Prediction\PredictionInterface) {
            throw new InvalidArgumentException(sprintf(
                'Expected callable or instance of PredictionInterface, but got %s.',
                gettype($V0jgsiypbrsg)
            ));
        }

        if (null === $this->promise && !$this->voidReturnType) {
            $this->willReturn();
        }

        $Vqk0kzw04abh = $this->getObjectProphecy()->findProphecyMethodCalls(
            $this->getMethodName(),
            $this->getArgumentsWildcard()
        );

        try {
            $V0jgsiypbrsg->check($Vqk0kzw04abh, $this->getObjectProphecy(), $this);
            $this->checkedPredictions[] = $V0jgsiypbrsg;
        } catch (\Exception $Vpt32vvhspnv) {
            $this->checkedPredictions[] = $V0jgsiypbrsg;

            throw $Vpt32vvhspnv;
        }

        return $this;
    }

    
    public function shouldHaveBeenCalled()
    {
        return $this->shouldHave(new Prediction\CallPrediction);
    }

    
    public function shouldNotHaveBeenCalled()
    {
        return $this->shouldHave(new Prediction\NoCallsPrediction);
    }

    
    public function shouldNotBeenCalled()
    {
        return $this->shouldNotHaveBeenCalled();
    }

    
    public function shouldHaveBeenCalledTimes($Vdbkece3gnp5)
    {
        return $this->shouldHave(new Prediction\CallTimesPrediction($Vdbkece3gnp5));
    }

    
    public function checkPrediction()
    {
        if (null === $this->prediction) {
            return;
        }

        $this->shouldHave($this->prediction);
    }

    
    public function getPromise()
    {
        return $this->promise;
    }

    
    public function getPrediction()
    {
        return $this->prediction;
    }

    
    public function getCheckedPredictions()
    {
        return $this->checkedPredictions;
    }

    
    public function getObjectProphecy()
    {
        return $this->objectProphecy;
    }

    
    public function getMethodName()
    {
        return $this->methodName;
    }

    
    public function getArgumentsWildcard()
    {
        return $this->argumentsWildcard;
    }

    
    public function hasReturnVoid()
    {
        return $this->voidReturnType;
    }

    private function bindToObjectProphecy()
    {
        if ($this->bound) {
            return;
        }

        $this->getObjectProphecy()->addMethodProphecy($this);
        $this->bound = true;
    }
}
