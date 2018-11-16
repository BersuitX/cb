--TEST--
Test raw()
--SKIPIF--
<?php if (!extension_loaded("pimple")) print "skip"; ?>
--FILE--
<?php

$Vbf4sq4psyai = new Pimple\Container();
$Vei44fs011eo = function () { var_dump('called-2'); return 'ret-2'; };

$Vbf4sq4psyai['foo'] = $Vei44fs011eo;
$Vbf4sq4psyai[42]    = $Vei44fs011eo;

var_dump($Vbf4sq4psyai['foo']);
var_dump($Vbf4sq4psyai->raw('foo'));
var_dump($Vbf4sq4psyai[42]);

unset($Vbf4sq4psyai['foo']);

try {
	$Vbf4sq4psyai->raw('foo');
	echo "expected exception";
} catch (InvalidArgumentException $Vpt32vvhspnv) { }
--EXPECTF--
string(8) "called-2"
string(5) "ret-2"
object(Closure)#%i (0) {
}
string(8) "called-2"
string(5) "ret-2"