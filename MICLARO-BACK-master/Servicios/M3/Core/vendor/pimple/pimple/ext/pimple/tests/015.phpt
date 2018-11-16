--TEST--
Test protect()
--SKIPIF--
<?php if (!extension_loaded("pimple")) print "skip"; ?>
--FILE--
<?php

$Vbf4sq4psyai = new Pimple\Container();
$Vei44fs011eo = function () { return 'foo'; };
$Vbf4sq4psyai['foo'] = $Vei44fs011eo;

$Vbf4sq4psyai->protect($Vei44fs011eo);

var_dump($Vbf4sq4psyai['foo']);
--EXPECTF--
object(Closure)#%i (0) {
}