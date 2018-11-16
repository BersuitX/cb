<?php



namespace Prophecy\Prediction;

use Prophecy\Call\Call;
use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophecy\MethodProphecy;
use Prophecy\Exception\InvalidArgumentException;
use Closure;


class CallbackPrediction implements PredictionInterface
{
    private $Vbbxwjhhenxj;

    
    public function __construct($Vbbxwjhhenxj)
    {
        if (!is_callable($Vbbxwjhhenxj)) {
            throw new InvalidArgumentException(sprintf(
                'Callable expected as an argument to CallbackPrediction, but got %s.',
                gettype($Vbbxwjhhenxj)
            ));
        }

        $this->callback = $Vbbxwjhhenxj;
    }

    
    public function check(array $Vqk0kzw04abh, ObjectProphecy $Vbj3pw2f5egf, MethodProphecy $Vtlfvdwskdge)
    {
        $Vbbxwjhhenxj = $this->callback;

        if ($Vbbxwjhhenxj instanceof Closure && method_exists('Closure', 'bind')) {
            $Vbbxwjhhenxj = Closure::bind($Vbbxwjhhenxj, $Vbj3pw2f5egf);
        }

        call_user_func($Vbbxwjhhenxj, $Vqk0kzw04abh, $Vbj3pw2f5egf, $Vtlfvdwskdge);
    }
}
