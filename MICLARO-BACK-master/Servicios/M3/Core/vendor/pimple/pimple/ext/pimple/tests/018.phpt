--TEST--
Test register()
--SKIPIF--
<?php if (!extension_loaded("pimple")) print "skip"; ?>
--FILE--
<?php

class Foo implements Pimple\ServiceProviderInterface
{
    public function register(Pimple\Container $Vbf4sq4psyai)
    {
        var_dump($Vbf4sq4psyai);
    }
}

$Vbf4sq4psyai = new Pimple\Container();
$Vbf4sq4psyai->register(new Foo, array(42 => 'bar'));

var_dump($Vbf4sq4psyai[42]);
--EXPECTF--
object(Pimple\Container)#1 (0) {
}
string(3) "bar"