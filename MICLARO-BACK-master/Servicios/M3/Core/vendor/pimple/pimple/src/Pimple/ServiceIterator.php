<?php



namespace Pimple;


final class ServiceIterator implements \Iterator
{
    private $Vb1jhtbuqbys;
    private $Vp0j3yprgfwj;

    public function __construct(Container $Vb1jhtbuqbys, array $Vp0j3yprgfwj)
    {
        $this->container = $Vb1jhtbuqbys;
        $this->ids = $Vp0j3yprgfwj;
    }

    public function rewind()
    {
        \reset($this->ids);
    }

    public function current()
    {
        return $this->container[\current($this->ids)];
    }

    public function key()
    {
        return \current($this->ids);
    }

    public function next()
    {
        \next($this->ids);
    }

    public function valid()
    {
        return null !== \key($this->ids);
    }
}
