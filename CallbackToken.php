<?php



namespace Prophecy\Argument\Token;

use Prophecy\Exception\InvalidArgumentException;


class CallbackToken implements TokenInterface
{
    private $Vbbxwjhhenxj;

    
    public function __construct($Vbbxwjhhenxj)
    {
        if (!is_callable($Vbbxwjhhenxj)) {
            throw new InvalidArgumentException(sprintf(
                'Callable expected as an argument to CallbackToken, but got %s.',
                gettype($Vbbxwjhhenxj)
            ));
        }

        $this->callback = $Vbbxwjhhenxj;
    }

    
    public function scoreArgument($Vlf5kwra10uk)
    {
        return call_user_func($this->callback, $Vlf5kwra10uk) ? 7 : false;
    }

    
    public function isLast()
    {
        return false;
    }

    
    public function __toString()
    {
        return 'callback()';
    }
}
