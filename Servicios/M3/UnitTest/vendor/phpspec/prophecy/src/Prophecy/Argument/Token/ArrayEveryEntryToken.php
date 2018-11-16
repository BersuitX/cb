<?php



namespace Prophecy\Argument\Token;


class ArrayEveryEntryToken implements TokenInterface
{
    
    private $Vcptarsq5qe4;

    
    public function __construct($Vcptarsq5qe4)
    {
        if (!$Vcptarsq5qe4 instanceof TokenInterface) {
            $Vcptarsq5qe4 = new ExactValueToken($Vcptarsq5qe4);
        }

        $this->value = $Vcptarsq5qe4;
    }

    
    public function scoreArgument($Vlf5kwra10uk)
    {
        if (!$Vlf5kwra10uk instanceof \Traversable && !is_array($Vlf5kwra10uk)) {
            return false;
        }

        $V2sgr5yajxit = array();
        foreach ($Vlf5kwra10uk as $Vlpbz5aloxqt => $Vlf5kwra10ukEntry) {
            $V2sgr5yajxit[] = $this->value->scoreArgument($Vlf5kwra10ukEntry);
        }

        if (empty($V2sgr5yajxit) || in_array(false, $V2sgr5yajxit, true)) {
            return false;
        }

        return array_sum($V2sgr5yajxit) / count($V2sgr5yajxit);
    }

    
    public function isLast()
    {
        return false;
    }

    
    public function __toString()
    {
        return sprintf('[%s, ..., %s]', $this->value, $this->value);
    }

    
    public function getValue()
    {
        return $this->value;
    }
}
