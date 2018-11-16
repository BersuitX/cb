<?php



namespace Prophecy\Argument\Token;

use Prophecy\Exception\InvalidArgumentException;


class ArrayEntryToken implements TokenInterface
{
    
    private $Vlpbz5aloxqt;
    
    private $Vcptarsq5qe4;

    
    public function __construct($Vlpbz5aloxqt, $Vcptarsq5qe4)
    {
        $this->key = $this->wrapIntoExactValueToken($Vlpbz5aloxqt);
        $this->value = $this->wrapIntoExactValueToken($Vcptarsq5qe4);
    }

    
    public function scoreArgument($Vlf5kwra10uk)
    {
        if ($Vlf5kwra10uk instanceof \Traversable) {
            $Vlf5kwra10uk = iterator_to_array($Vlf5kwra10uk);
        }

        if ($Vlf5kwra10uk instanceof \ArrayAccess) {
            $Vlf5kwra10uk = $this->convertArrayAccessToEntry($Vlf5kwra10uk);
        }

        if (!is_array($Vlf5kwra10uk) || empty($Vlf5kwra10uk)) {
            return false;
        }

        $Vlpbz5aloxqtScores = array_map(array($this->key,'scoreArgument'), array_keys($Vlf5kwra10uk));
        $Vcptarsq5qe4Scores = array_map(array($this->value,'scoreArgument'), $Vlf5kwra10uk);
        $Vs5ilmzzstyw = function ($Vcptarsq5qe4, $Vlpbz5aloxqt) {
            return $Vcptarsq5qe4 && $Vlpbz5aloxqt ? min(8, ($Vlpbz5aloxqt + $Vcptarsq5qe4) / 2) : false;
        };

        return max(array_map($Vs5ilmzzstyw, $Vcptarsq5qe4Scores, $Vlpbz5aloxqtScores));
    }

    
    public function isLast()
    {
        return false;
    }

    
    public function __toString()
    {
        return sprintf('[..., %s => %s, ...]', $this->key, $this->value);
    }

    
    public function getKey()
    {
        return $this->key;
    }

    
    public function getValue()
    {
        return $this->value;
    }

    
    private function wrapIntoExactValueToken($Vcptarsq5qe4)
    {
        return $Vcptarsq5qe4 instanceof TokenInterface ? $Vcptarsq5qe4 : new ExactValueToken($Vcptarsq5qe4);
    }

    
    private function convertArrayAccessToEntry(\ArrayAccess $Vbj3pw2f5egf)
    {
        if (!$this->key instanceof ExactValueToken) {
            throw new InvalidArgumentException(sprintf(
                'You can only use exact value tokens to match key of ArrayAccess object'.PHP_EOL.
                'But you used `%s`.',
                $this->key
            ));
        }

        $Vlpbz5aloxqt = $this->key->getValue();

        return $Vbj3pw2f5egf->offsetExists($Vlpbz5aloxqt) ? array($Vlpbz5aloxqt => $Vbj3pw2f5egf[$Vlpbz5aloxqt]) : array();
    }
}
