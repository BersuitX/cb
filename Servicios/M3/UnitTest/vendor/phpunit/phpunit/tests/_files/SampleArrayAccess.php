<?php

class SampleArrayAccess implements ArrayAccess
{
    private $Vb1jhtbuqbys;

    public function __construct()
    {
        $this->container = array();
    }
    public function offsetSet($V5peram4ncbv, $Vcptarsq5qe4)
    {
        if (is_null($V5peram4ncbv)) {
            $this->container[] = $Vcptarsq5qe4;
        } else {
            $this->container[$V5peram4ncbv] = $Vcptarsq5qe4;
        }
    }
    public function offsetExists($V5peram4ncbv)
    {
        return isset($this->container[$V5peram4ncbv]);
    }
    public function offsetUnset($V5peram4ncbv)
    {
        unset($this->container[$V5peram4ncbv]);
    }
    public function offsetGet($V5peram4ncbv)
    {
        return isset($this->container[$V5peram4ncbv]) ? $this->container[$V5peram4ncbv] : null;
    }
}
