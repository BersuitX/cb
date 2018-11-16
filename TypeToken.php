<?php



namespace Prophecy\Argument\Token;

use Prophecy\Exception\InvalidArgumentException;


class TypeToken implements TokenInterface
{
    private $V31qrja1w0r2;

    
    public function __construct($V31qrja1w0r2)
    {
        $Vvkw05dkuvhq = "is_{$V31qrja1w0r2}";
        if (!function_exists($Vvkw05dkuvhq) && !interface_exists($V31qrja1w0r2) && !class_exists($V31qrja1w0r2)) {
            throw new InvalidArgumentException(sprintf(
                'Type or class name expected as an argument to TypeToken, but got %s.', $V31qrja1w0r2
            ));
        }

        $this->type = $V31qrja1w0r2;
    }

    
    public function scoreArgument($Vlf5kwra10uk)
    {
        $Vvkw05dkuvhq = "is_{$this->type}";
        if (function_exists($Vvkw05dkuvhq)) {
            return call_user_func($Vvkw05dkuvhq, $Vlf5kwra10uk) ? 5 : false;
        }

        return $Vlf5kwra10uk instanceof $this->type ? 5 : false;
    }

    
    public function isLast()
    {
        return false;
    }

    
    public function __toString()
    {
        return sprintf('type(%s)', $this->type);
    }
}
