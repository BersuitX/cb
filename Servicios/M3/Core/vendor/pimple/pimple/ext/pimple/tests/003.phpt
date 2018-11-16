--TEST--
Test empty dimensions
--SKIPIF--
<?php if (!extension_loaded("pimple")) print "skip"; ?>
--FILE--
<?php 
$Vbf4sq4psyai = new Pimple\Container();
$Vbf4sq4psyai[] = 42;
var_dump($Vbf4sq4psyai[0]);
$Vbf4sq4psyai[41] = 'foo';
$Vbf4sq4psyai[] = 'bar';
var_dump($Vbf4sq4psyai[42]);
?>
--EXPECT--
int(42)
string(3) "bar"