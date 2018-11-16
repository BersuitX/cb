--TEST--
Test register() returns static and is a fluent interface
--SKIPIF--
<?php if (!extension_loaded("pimple")) print "skip"; ?>
--FILE--
<?php

class Foo implements Pimple\ServiceProviderInterface
{
    public function register(Pimple\Container $Vbf4sq4psyai)
    {
    }
}

$Vbf4sq4psyai = new Pimple\Container();
var_dump($Vbf4sq4psyai === $Vbf4sq4psyai->register(new Foo));
--EXPECTF--
bool(true)
