<?php



namespace Prophecy\Prophecy;

use SebastianBergmann\Comparator\ComparisonFailure;
use Prophecy\Comparator\Factory as ComparatorFactory;
use Prophecy\Call\Call;
use Prophecy\Doubler\LazyDouble;
use Prophecy\Argument\ArgumentsWildcard;
use Prophecy\Call\CallCenter;
use Prophecy\Exception\Prophecy\ObjectProphecyException;
use Prophecy\Exception\Prophecy\MethodProphecyException;
use Prophecy\Exception\Prediction\AggregateException;
use Prophecy\Exception\Prediction\PredictionException;


class ObjectProphecy implements ProphecyInterface
{
    private $Vxdgwl2bzzei;
    private $Vcm4afmgke5y;
    private $Vdwayz4i2yys;
    private $Vqobgwt1hltw;

    
    private $Vbf5u452cznf = array();

    
    public function __construct(
        LazyDouble $Vxdgwl2bzzei,
        CallCenter $Vcm4afmgke5y = null,
        RevealerInterface $Vdwayz4i2yys = null,
        ComparatorFactory $Vqobgwt1hltw = null
    ) {
        $this->lazyDouble = $Vxdgwl2bzzei;
        $this->callCenter = $Vcm4afmgke5y ?: new CallCenter;
        $this->revealer   = $Vdwayz4i2yys ?: new Revealer;

        $this->comparatorFactory = $Vqobgwt1hltw ?: ComparatorFactory::getInstance();
    }

    
    public function willExtend($Vqmu1sajhgfn)
    {
        $this->lazyDouble->setParentClass($Vqmu1sajhgfn);

        return $this;
    }

    
    public function willImplement($Vblpzgjj4s3y)
    {
        $this->lazyDouble->addInterface($Vblpzgjj4s3y);

        return $this;
    }

    
    public function willBeConstructedWith(array $Vj23lbel2xn0 = null)
    {
        $this->lazyDouble->setArguments($Vj23lbel2xn0);

        return $this;
    }

    
    public function reveal()
    {
        $Vyikircvzioe = $this->lazyDouble->getInstance();

        if (null === $Vyikircvzioe || !$Vyikircvzioe instanceof ProphecySubjectInterface) {
            throw new ObjectProphecyException(
                "Generated double must implement ProphecySubjectInterface, but it does not.\n".
                'It seems you have wrongly configured doubler without required ClassPatch.',
                $this
            );
        }

        $Vyikircvzioe->setProphecy($this);

        return $Vyikircvzioe;
    }

    
    public function addMethodProphecy(MethodProphecy $Vl4x0cix3k15)
    {
        $Vj23lbel2xn0Wildcard = $Vl4x0cix3k15->getArgumentsWildcard();
        if (null === $Vj23lbel2xn0Wildcard) {
            throw new MethodProphecyException(sprintf(
                "Can not add prophecy for a method `%s::%s()`\n".
                "as you did not specify arguments wildcard for it.",
                get_class($this->reveal()),
                $Vl4x0cix3k15->getMethodName()
            ), $Vl4x0cix3k15);
        }

        $Vc1exo5hbki5 = $Vl4x0cix3k15->getMethodName();

        if (!isset($this->methodProphecies[$Vc1exo5hbki5])) {
            $this->methodProphecies[$Vc1exo5hbki5] = array();
        }

        $this->methodProphecies[$Vc1exo5hbki5][] = $Vl4x0cix3k15;
    }

    
    public function getMethodProphecies($Vc1exo5hbki5 = null)
    {
        if (null === $Vc1exo5hbki5) {
            return $this->methodProphecies;
        }

        if (!isset($this->methodProphecies[$Vc1exo5hbki5])) {
            return array();
        }

        return $this->methodProphecies[$Vc1exo5hbki5];
    }

    
    public function makeProphecyMethodCall($Vc1exo5hbki5, array $Vj23lbel2xn0)
    {
        $Vj23lbel2xn0 = $this->revealer->reveal($Vj23lbel2xn0);
        $Vrpudtlhfyg0    = $this->callCenter->makeCall($this, $Vc1exo5hbki5, $Vj23lbel2xn0);

        return $this->revealer->reveal($Vrpudtlhfyg0);
    }

    
    public function findProphecyMethodCalls($Vc1exo5hbki5, ArgumentsWildcard $Vzsfgwc03ssr)
    {
        return $this->callCenter->findCalls($Vc1exo5hbki5, $Vzsfgwc03ssr);
    }

    
    public function checkProphecyMethodsPredictions()
    {
        $Vzzme31ixifp = new AggregateException(sprintf("%s:\n", get_class($this->reveal())));
        $Vzzme31ixifp->setObjectProphecy($this);

        foreach ($this->methodProphecies as $V3xj45ct05ht) {
            foreach ($V3xj45ct05ht as $V2fq5eyaztqt) {
                try {
                    $V2fq5eyaztqt->checkPrediction();
                } catch (PredictionException $Vpt32vvhspnv) {
                    $Vzzme31ixifp->append($Vpt32vvhspnv);
                }
            }
        }

        if (count($Vzzme31ixifp->getExceptions())) {
            throw $Vzzme31ixifp;
        }
    }

    
    public function __call($Vc1exo5hbki5, array $Vj23lbel2xn0)
    {
        $Vj23lbel2xn0 = new ArgumentsWildcard($this->revealer->reveal($Vj23lbel2xn0));

        foreach ($this->getMethodProphecies($Vc1exo5hbki5) as $V2fq5eyaztqt) {
            $Vj23lbel2xn0Wildcard = $V2fq5eyaztqt->getArgumentsWildcard();
            $V23fl2cvtaex = $this->comparatorFactory->getComparatorFor(
                $Vj23lbel2xn0Wildcard, $Vj23lbel2xn0
            );

            try {
                $V23fl2cvtaex->assertEquals($Vj23lbel2xn0Wildcard, $Vj23lbel2xn0);
                return $V2fq5eyaztqt;
            } catch (ComparisonFailure $Vg5dv0qwgauj) {}
        }

        return new MethodProphecy($this, $Vc1exo5hbki5, $Vj23lbel2xn0);
    }

    
    public function __get($Vgpjmw221p0b)
    {
        return $this->reveal()->$Vgpjmw221p0b;
    }

    
    public function __set($Vgpjmw221p0b, $Vcptarsq5qe4)
    {
        $this->reveal()->$Vgpjmw221p0b = $this->revealer->reveal($Vcptarsq5qe4);
    }
}
