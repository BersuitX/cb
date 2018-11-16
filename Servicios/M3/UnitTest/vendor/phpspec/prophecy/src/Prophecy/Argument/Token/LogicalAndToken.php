<?php



namespace Prophecy\Argument\Token;


class LogicalAndToken implements TokenInterface
{
    private $Vthon1suqmsr = array();

    
    public function __construct(array $Vj23lbel2xn0)
    {
        foreach ($Vj23lbel2xn0 as $Vlf5kwra10uk) {
            if (!$Vlf5kwra10uk instanceof TokenInterface) {
                $Vlf5kwra10uk = new ExactValueToken($Vlf5kwra10uk);
            }
            $this->tokens[] = $Vlf5kwra10uk;
        }
    }

    
    public function scoreArgument($Vlf5kwra10uk)
    {
        if (0 === count($this->tokens)) {
            return false;
        }

        $Vdzhxg4rll4m = 0;
        foreach ($this->tokens as $Vx5bl5ubgnhj) {
            $Vyxvr2mto3df = $Vx5bl5ubgnhj->scoreArgument($Vlf5kwra10uk);
            if (false === $Vyxvr2mto3df) {
                return false;
            }
            $Vdzhxg4rll4m = max($Vyxvr2mto3df, $Vdzhxg4rll4m);
        }

        return $Vdzhxg4rll4m;
    }

    
    public function isLast()
    {
        return false;
    }

    
    public function __toString()
    {
        return sprintf('bool(%s)', implode(' AND ', $this->tokens));
    }
}
