<?php



namespace Prophecy\Argument\Token;

use Prophecy\Util\StringUtil;


class IdenticalValueToken implements TokenInterface
{
    private $Vcptarsq5qe4;
    private $Ve5tcsso230g;
    private $V54ioytbirq2;

    
    public function __construct($Vcptarsq5qe4, StringUtil $V54ioytbirq2 = null)
    {
        $this->value = $Vcptarsq5qe4;
        $this->util  = $V54ioytbirq2 ?: new StringUtil();
    }

    
    public function scoreArgument($Vlf5kwra10uk)
    {
        return $Vlf5kwra10uk === $this->value ? 11 : false;
    }

    
    public function isLast()
    {
        return false;
    }

    
    public function __toString()
    {
        if (null === $this->string) {
            $this->string = sprintf('identical(%s)', $this->util->stringify($this->value));
        }

        return $this->string;
    }
}
