<?php


namespace Slim;

use Closure;
use Psr\Container\ContainerInterface;

class DeferredCallable
{
    use CallableResolverAwareTrait;

    private $Vp0bahhl3qia;
    
    private $Vb1jhtbuqbys;

    
    public function __construct($Vp0bahhl3qia, ContainerInterface $Vb1jhtbuqbys = null)
    {
        $this->callable = $Vp0bahhl3qia;
        $this->container = $Vb1jhtbuqbys;
    }

    public function __invoke()
    {
        $Vp0bahhl3qia = $this->resolveCallable($this->callable);
        if ($Vp0bahhl3qia instanceof Closure) {
            $Vp0bahhl3qia = $Vp0bahhl3qia->bindTo($this->container);
        }

        $Veox3iprl5oz = func_get_args();

        return call_user_func_array($Vp0bahhl3qia, $Veox3iprl5oz);
    }
}
