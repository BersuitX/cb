<?php


namespace DoctrineTest\InstantiatorTestAsset;

use BadMethodCallException;
use Exception;


final class FinalExceptionAsset extends Exception
{
    
    public function __construct()
    {
        throw new BadMethodCallException('Not supposed to be called!');
    }
}
