<?php



namespace Prophecy;

use Prophecy\Doubler\Doubler;
use Prophecy\Doubler\LazyDouble;
use Prophecy\Doubler\ClassPatch;
use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophecy\RevealerInterface;
use Prophecy\Prophecy\Revealer;
use Prophecy\Call\CallCenter;
use Prophecy\Util\StringUtil;
use Prophecy\Exception\Prediction\PredictionException;
use Prophecy\Exception\Prediction\AggregateException;


class Prophet
{
    private $Vkogfwai13gg;
    private $Vdwayz4i2yys;
    private $V54ioytbirq2;

    
    private $V3xj45ct05ht = array();

    
    public function __construct(Doubler $Vkogfwai13gg = null, RevealerInterface $Vdwayz4i2yys = null,
                                StringUtil $V54ioytbirq2 = null)
    {
        if (null === $Vkogfwai13gg) {
            $Vkogfwai13gg = new Doubler;
            $Vkogfwai13gg->registerClassPatch(new ClassPatch\SplFileInfoPatch);
            $Vkogfwai13gg->registerClassPatch(new ClassPatch\TraversablePatch);
            $Vkogfwai13gg->registerClassPatch(new ClassPatch\DisableConstructorPatch);
            $Vkogfwai13gg->registerClassPatch(new ClassPatch\ProphecySubjectPatch);
            $Vkogfwai13gg->registerClassPatch(new ClassPatch\ReflectionClassNewInstancePatch);
            $Vkogfwai13gg->registerClassPatch(new ClassPatch\HhvmExceptionPatch());
            $Vkogfwai13gg->registerClassPatch(new ClassPatch\MagicCallPatch);
            $Vkogfwai13gg->registerClassPatch(new ClassPatch\KeywordPatch);
        }

        $this->doubler  = $Vkogfwai13gg;
        $this->revealer = $Vdwayz4i2yys ?: new Revealer;
        $this->util     = $V54ioytbirq2 ?: new StringUtil;
    }

    
    public function prophesize($V5tp24dkaqo5 = null)
    {
        $this->prophecies[] = $V2fq5eyaztqt = new ObjectProphecy(
            new LazyDouble($this->doubler),
            new CallCenter($this->util),
            $this->revealer
        );

        if ($V5tp24dkaqo5 && class_exists($V5tp24dkaqo5)) {
            return $V2fq5eyaztqt->willExtend($V5tp24dkaqo5);
        }

        if ($V5tp24dkaqo5 && interface_exists($V5tp24dkaqo5)) {
            return $V2fq5eyaztqt->willImplement($V5tp24dkaqo5);
        }

        return $V2fq5eyaztqt;
    }

    
    public function getProphecies()
    {
        return $this->prophecies;
    }

    
    public function getDoubler()
    {
        return $this->doubler;
    }

    
    public function checkPredictions()
    {
        $Vzzme31ixifp = new AggregateException("Some predictions failed:\n");
        foreach ($this->prophecies as $V2fq5eyaztqt) {
            try {
                $V2fq5eyaztqt->checkProphecyMethodsPredictions();
            } catch (PredictionException $Vpt32vvhspnv) {
                $Vzzme31ixifp->append($Vpt32vvhspnv);
            }
        }

        if (count($Vzzme31ixifp->getExceptions())) {
            throw $Vzzme31ixifp;
        }
    }
}
