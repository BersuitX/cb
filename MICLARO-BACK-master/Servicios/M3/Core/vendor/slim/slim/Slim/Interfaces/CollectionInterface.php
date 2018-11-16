<?php

namespace Slim\Interfaces;


interface CollectionInterface extends \ArrayAccess, \Countable, \IteratorAggregate
{
    public function set($Vlpbz5aloxqt, $Vcptarsq5qe4);

    public function get($Vlpbz5aloxqt, $V0ekusmibtbl = null);

    public function replace(array $Vdgaj5zam5hd);

    public function all();

    public function has($Vlpbz5aloxqt);

    public function remove($Vlpbz5aloxqt);

    public function clear();
}
