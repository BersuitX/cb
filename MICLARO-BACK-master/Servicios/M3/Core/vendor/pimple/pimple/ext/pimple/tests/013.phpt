--TEST--
Test keys()
--SKIPIF--
<?php if (!extension_loaded("pimple")) print "skip"; ?>
--FILE--
<?php

$Vbf4sq4psyai = new Pimple\Container();

var_dump($Vbf4sq4psyai->keys());

$Vbf4sq4psyai['foo'] = 'bar';
$Vbf4sq4psyai[] = 'foo';

var_dump($Vbf4sq4psyai->keys());

unset($Vbf4sq4psyai['foo']);

var_dump($Vbf4sq4psyai->keys());
?>
--EXPECTF--
array(0) {
}
array(2) {
  [0]=>
  string(3) "foo"
  [1]=>
  int(0)
}
array(1) {
  [0]=>
  int(0)
}