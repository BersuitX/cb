<?php



namespace Prophecy\Argument;


class ArgumentsWildcard
{
    
    private $Vthon1suqmsr = array();
    private $Ve5tcsso230g;

    
    public function __construct(array $Vj23lbel2xn0)
    {
        foreach ($Vj23lbel2xn0 as $Vlf5kwra10uk) {
            if (!$Vlf5kwra10uk instanceof Token\TokenInterface) {
                $Vlf5kwra10uk = new Token\ExactValueToken($Vlf5kwra10uk);
            }

            $this->tokens[] = $Vlf5kwra10uk;
        }
    }

    
    public function scoreArguments(array $Vj23lbel2xn0)
    {
        if (0 == count($Vj23lbel2xn0) && 0 == count($this->tokens)) {
            return 1;
        }

        $Vj23lbel2xn0  = array_values($Vj23lbel2xn0);
        $Vhjtvfbmvoya = 0;
        foreach ($this->tokens as $Vxja1abp34yq => $Vx5bl5ubgnhj) {
            $Vlf5kwra10uk = isset($Vj23lbel2xn0[$Vxja1abp34yq]) ? $Vj23lbel2xn0[$Vxja1abp34yq] : null;
            if (1 >= $Vyxvr2mto3df = $Vx5bl5ubgnhj->scoreArgument($Vlf5kwra10uk)) {
                return false;
            }

            $Vhjtvfbmvoya += $Vyxvr2mto3df;

            if (true === $Vx5bl5ubgnhj->isLast()) {
                return $Vhjtvfbmvoya;
            }
        }

        if (count($Vj23lbel2xn0) > count($this->tokens)) {
            return false;
        }

        return $Vhjtvfbmvoya;
    }

    
    public function __toString()
    {
        if (null === $this->string) {
            $this->string = implode(', ', array_map(function ($Vx5bl5ubgnhj) {
                return (string) $Vx5bl5ubgnhj;
            }, $this->tokens));
        }

        return $this->string;
    }

    
    public function getTokens()
    {
        return $this->tokens;
    }
}
