<?php

namespace Slim;

use ArrayIterator;
use Slim\Interfaces\CollectionInterface;


class Collection implements CollectionInterface
{
    
    protected $Vqhzkfsafzrc = [];

    
    public function __construct(array $Vdgaj5zam5hd = [])
    {
        $this->replace($Vdgaj5zam5hd);
    }

    

    
    public function set($Vlpbz5aloxqt, $Vcptarsq5qe4)
    {
        $this->data[$Vlpbz5aloxqt] = $Vcptarsq5qe4;
    }

    
    public function get($Vlpbz5aloxqt, $V0ekusmibtbl = null)
    {
        return $this->has($Vlpbz5aloxqt) ? $this->data[$Vlpbz5aloxqt] : $V0ekusmibtbl;
    }

    
    public function replace(array $Vdgaj5zam5hd)
    {
        foreach ($Vdgaj5zam5hd as $Vlpbz5aloxqt => $Vcptarsq5qe4) {
            $this->set($Vlpbz5aloxqt, $Vcptarsq5qe4);
        }
    }

    
    public function all()
    {
        return $this->data;
    }

    
    public function keys()
    {
        return array_keys($this->data);
    }

    
    public function has($Vlpbz5aloxqt)
    {
        return array_key_exists($Vlpbz5aloxqt, $this->data);
    }

    
    public function remove($Vlpbz5aloxqt)
    {
        unset($this->data[$Vlpbz5aloxqt]);
    }

    
    public function clear()
    {
        $this->data = [];
    }

    

    
    public function offsetExists($Vlpbz5aloxqt)
    {
        return $this->has($Vlpbz5aloxqt);
    }

    
    public function offsetGet($Vlpbz5aloxqt)
    {
        return $this->get($Vlpbz5aloxqt);
    }

    
    public function offsetSet($Vlpbz5aloxqt, $Vcptarsq5qe4)
    {
        $this->set($Vlpbz5aloxqt, $Vcptarsq5qe4);
    }

    
    public function offsetUnset($Vlpbz5aloxqt)
    {
        $this->remove($Vlpbz5aloxqt);
    }

    
    public function count()
    {
        return count($this->data);
    }

    

    
    public function getIterator()
    {
        return new ArrayIterator($this->data);
    }
}
