<?php



namespace Prophecy\Argument\Token;

use SebastianBergmann\Comparator\ComparisonFailure;
use Prophecy\Comparator\Factory as ComparatorFactory;
use Prophecy\Util\StringUtil;


class ExactValueToken implements TokenInterface
{
    private $Vcptarsq5qe4;
    private $Ve5tcsso230g;
    private $V54ioytbirq2;
    private $Vqobgwt1hltw;

    
    public function __construct($Vcptarsq5qe4, StringUtil $V54ioytbirq2 = null, ComparatorFactory $Vqobgwt1hltw = null)
    {
        $this->value = $Vcptarsq5qe4;
        $this->util  = $V54ioytbirq2 ?: new StringUtil();

        $this->comparatorFactory = $Vqobgwt1hltw ?: ComparatorFactory::getInstance();
    }

    
    public function scoreArgument($Vlf5kwra10uk)
    {
        if (is_object($Vlf5kwra10uk) && is_object($this->value)) {
            $V23fl2cvtaex = $this->comparatorFactory->getComparatorFor(
                $Vlf5kwra10uk, $this->value
            );

            try {
                $V23fl2cvtaex->assertEquals($Vlf5kwra10uk, $this->value);
                return 10;
            } catch (ComparisonFailure $Vg5dv0qwgauj) {}
        }

        
        if (is_object($Vlf5kwra10uk) xor is_object($this->value)) {
            if (is_object($Vlf5kwra10uk) && !method_exists($Vlf5kwra10uk, '__toString')) {
                return false;
            }

            if (is_object($this->value) && !method_exists($this->value, '__toString')) {
                return false;
            }
        } elseif (is_numeric($Vlf5kwra10uk) && is_numeric($this->value)) {
            
        } elseif (gettype($Vlf5kwra10uk) !== gettype($this->value)) {
            return false;
        }

        return $Vlf5kwra10uk == $this->value ? 10 : false;
    }

    
    public function getValue()
    {
        return $this->value;
    }

    
    public function isLast()
    {
        return false;
    }

    
    public function __toString()
    {
        if (null === $this->string) {
            $this->string = sprintf('exact(%s)', $this->util->stringify($this->value));
        }

        return $this->string;
    }
}
