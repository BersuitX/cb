<?php



namespace Prophecy\Promise;

use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophecy\MethodProphecy;
use Prophecy\Exception\InvalidArgumentException;
use Closure;


class CallbackPromise implements PromiseInterface
{
    private $Vbbxwjhhenxj;

    
    public function __construct($Vbbxwjhhenxj)
    {
        if (!is_callable($Vbbxwjhhenxj)) {
            throw new InvalidArgumentException(sprintf(
                'Callable expected as an argument to CallbackPromise, but got %s.',
                gettype($Vbbxwjhhenxj)
            ));
        }

        $this->callback = $Vbbxwjhhenxj;
    }

    
    public function execute(array $Veox3iprl5oz, ObjectProphecy $Vbj3pw2f5egf, MethodProphecy $Vtlfvdwskdge)
    {
        $Vbbxwjhhenxj = $this->callback;

        if ($Vbbxwjhhenxj instanceof Closure && method_exists('Closure', 'bind')) {
            $Vbbxwjhhenxj = Closure::bind($Vbbxwjhhenxj, $Vbj3pw2f5egf);
        }

        return call_user_func($Vbbxwjhhenxj, $Veox3iprl5oz, $Vbj3pw2f5egf, $Vtlfvdwskdge);
    }
}
