<?php



namespace Prophecy\Argument\Token;

use SebastianBergmann\Comparator\ComparisonFailure;
use Prophecy\Comparator\Factory as ComparatorFactory;
use Prophecy\Util\StringUtil;


class ObjectStateToken implements TokenInterface
{
    private $Vgpjmw221p0b;
    private $Vcptarsq5qe4;
    private $V54ioytbirq2;
    private $Vqobgwt1hltw;

    
    public function __construct(
        $Vc1exo5hbki5,
        $Vcptarsq5qe4,
        StringUtil $V54ioytbirq2 = null,
        ComparatorFactory $Vqobgwt1hltw = null
    ) {
        $this->name  = $Vc1exo5hbki5;
        $this->value = $Vcptarsq5qe4;
        $this->util  = $V54ioytbirq2 ?: new StringUtil;

        $this->comparatorFactory = $Vqobgwt1hltw ?: ComparatorFactory::getInstance();
    }

    
    public function scoreArgument($Vlf5kwra10uk)
    {
        if (is_object($Vlf5kwra10uk) && method_exists($Vlf5kwra10uk, $this->name)) {
            $Vs4nw03sqcam = call_user_func(array($Vlf5kwra10uk, $this->name));

            $V23fl2cvtaex = $this->comparatorFactory->getComparatorFor(
                $this->value, $Vs4nw03sqcam
            );

            try {
                $V23fl2cvtaex->assertEquals($this->value, $Vs4nw03sqcam);
                return 8;
            } catch (ComparisonFailure $Vg5dv0qwgauj) {
                return false;
            }
        }

        if (is_object($Vlf5kwra10uk) && property_exists($Vlf5kwra10uk, $this->name)) {
            return $Vlf5kwra10uk->{$this->name} === $this->value ? 8 : false;
        }

        return false;
    }

    
    public function isLast()
    {
        return false;
    }

    
    public function __toString()
    {
        return sprintf('state(%s(), %s)',
            $this->name,
            $this->util->stringify($this->value)
        );
    }
}
