--TEST--
Test for constructor
--SKIPIF--
<?php if (!extension_loaded("pimple")) print "skip"; ?>
--FILE--
<?php 
$Vbf4sq4psyai = new Pimple\Container();
var_dump($Vbf4sq4psyai[42]);

$Vbf4sq4psyai = new Pimple\Container(array(42=>'foo'));
var_dump($Vbf4sq4psyai[42]);
?>
--EXPECT--
NULL
string(3) "foo"
