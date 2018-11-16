<?php



namespace Pimple;

use Pimple\Exception\ExpectedInvokableException;
use Pimple\Exception\FrozenServiceException;
use Pimple\Exception\InvalidServiceIdentifierException;
use Pimple\Exception\UnknownIdentifierException;


class Container implements \ArrayAccess
{
    private $Vmyhfq3hu0xr = array();
    private $V05r0ri4glva;
    private $V3p3hx0uhu0n;
    private $Vtuhpy3znupq = array();
    private $V0tqxrkqznqp = array();
    private $Vbtcg1ckvort = array();

    
    public function __construct(array $Vmyhfq3hu0xr = array())
    {
        $this->factories = new \SplObjectStorage();
        $this->protected = new \SplObjectStorage();

        foreach ($Vmyhfq3hu0xr as $Vlpbz5aloxqt => $Vcptarsq5qe4) {
            $this->offsetSet($Vlpbz5aloxqt, $Vcptarsq5qe4);
        }
    }

    
    public function offsetSet($V4mdxaz2cfcr, $Vcptarsq5qe4)
    {
        if (isset($this->frozen[$V4mdxaz2cfcr])) {
            throw new FrozenServiceException($V4mdxaz2cfcr);
        }

        $this->values[$V4mdxaz2cfcr] = $Vcptarsq5qe4;
        $this->keys[$V4mdxaz2cfcr] = true;
    }

    
    public function offsetGet($V4mdxaz2cfcr)
    {
        if (!isset($this->keys[$V4mdxaz2cfcr])) {
            throw new UnknownIdentifierException($V4mdxaz2cfcr);
        }

        if (
            isset($this->raw[$V4mdxaz2cfcr])
            || !\is_object($this->values[$V4mdxaz2cfcr])
            || isset($this->protected[$this->values[$V4mdxaz2cfcr]])
            || !\method_exists($this->values[$V4mdxaz2cfcr], '__invoke')
        ) {
            return $this->values[$V4mdxaz2cfcr];
        }

        if (isset($this->factories[$this->values[$V4mdxaz2cfcr]])) {
            return $this->values[$V4mdxaz2cfcr]($this);
        }

        $V0tqxrkqznqp = $this->values[$V4mdxaz2cfcr];
        $Vesnpsejyhuw = $this->values[$V4mdxaz2cfcr] = $V0tqxrkqznqp($this);
        $this->raw[$V4mdxaz2cfcr] = $V0tqxrkqznqp;

        $this->frozen[$V4mdxaz2cfcr] = true;

        return $Vesnpsejyhuw;
    }

    
    public function offsetExists($V4mdxaz2cfcr)
    {
        return isset($this->keys[$V4mdxaz2cfcr]);
    }

    
    public function offsetUnset($V4mdxaz2cfcr)
    {
        if (isset($this->keys[$V4mdxaz2cfcr])) {
            if (\is_object($this->values[$V4mdxaz2cfcr])) {
                unset($this->factories[$this->values[$V4mdxaz2cfcr]], $this->protected[$this->values[$V4mdxaz2cfcr]]);
            }

            unset($this->values[$V4mdxaz2cfcr], $this->frozen[$V4mdxaz2cfcr], $this->raw[$V4mdxaz2cfcr], $this->keys[$V4mdxaz2cfcr]);
        }
    }

    
    public function factory($Vp0bahhl3qia)
    {
        if (!\method_exists($Vp0bahhl3qia, '__invoke')) {
            throw new ExpectedInvokableException('Service definition is not a Closure or invokable object.');
        }

        $this->factories->attach($Vp0bahhl3qia);

        return $Vp0bahhl3qia;
    }

    
    public function protect($Vp0bahhl3qia)
    {
        if (!\method_exists($Vp0bahhl3qia, '__invoke')) {
            throw new ExpectedInvokableException('Callable is not a Closure or invokable object.');
        }

        $this->protected->attach($Vp0bahhl3qia);

        return $Vp0bahhl3qia;
    }

    
    public function raw($V4mdxaz2cfcr)
    {
        if (!isset($this->keys[$V4mdxaz2cfcr])) {
            throw new UnknownIdentifierException($V4mdxaz2cfcr);
        }

        if (isset($this->raw[$V4mdxaz2cfcr])) {
            return $this->raw[$V4mdxaz2cfcr];
        }

        return $this->values[$V4mdxaz2cfcr];
    }

    
    public function extend($V4mdxaz2cfcr, $Vp0bahhl3qia)
    {
        if (!isset($this->keys[$V4mdxaz2cfcr])) {
            throw new UnknownIdentifierException($V4mdxaz2cfcr);
        }

        if (isset($this->frozen[$V4mdxaz2cfcr])) {
            throw new FrozenServiceException($V4mdxaz2cfcr);
        }

        if (!\is_object($this->values[$V4mdxaz2cfcr]) || !\method_exists($this->values[$V4mdxaz2cfcr], '__invoke')) {
            throw new InvalidServiceIdentifierException($V4mdxaz2cfcr);
        }

        if (isset($this->protected[$this->values[$V4mdxaz2cfcr]])) {
            @\trigger_error(\sprintf('How Pimple behaves when extending protected closures will be fixed in Pimple 4. Are you sure "%s" should be protected?', $V4mdxaz2cfcr), \E_USER_DEPRECATED);
        }

        if (!\is_object($Vp0bahhl3qia) || !\method_exists($Vp0bahhl3qia, '__invoke')) {
            throw new ExpectedInvokableException('Extension service definition is not a Closure or invokable object.');
        }

        $Vdnxqjiaf0hs = $this->values[$V4mdxaz2cfcr];

        $Vzxcjcjhqlsy = function ($Vibefsvmlpru) use ($Vp0bahhl3qia, $Vdnxqjiaf0hs) {
            return $Vp0bahhl3qia($Vdnxqjiaf0hs($Vibefsvmlpru), $Vibefsvmlpru);
        };

        if (isset($this->factories[$Vdnxqjiaf0hs])) {
            $this->factories->detach($Vdnxqjiaf0hs);
            $this->factories->attach($Vzxcjcjhqlsy);
        }

        return $this[$V4mdxaz2cfcr] = $Vzxcjcjhqlsy;
    }

    
    public function keys()
    {
        return \array_keys($this->values);
    }

    
    public function register(ServiceProviderInterface $Virsshe4gp1y, array $Vmyhfq3hu0xr = array())
    {
        $Virsshe4gp1y->register($this);

        foreach ($Vmyhfq3hu0xr as $Vlpbz5aloxqt => $Vcptarsq5qe4) {
            $this[$Vlpbz5aloxqt] = $Vcptarsq5qe4;
        }

        return $this;
    }
}
