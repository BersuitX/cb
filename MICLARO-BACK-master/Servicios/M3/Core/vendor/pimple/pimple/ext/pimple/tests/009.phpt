--TEST--
Test service is called as callback, and only once
--SKIPIF--
<?php if (!extension_loaded("pimple")) print "skip"; ?>
--FILE--
<?php 
$Vbf4sq4psyai = new Pimple\Container();
$Vbf4sq4psyai['foo'] = function($V5mddzgxir3y) use ($Vbf4sq4psyai) { var_dump($Vbf4sq4psyai === $V5mddzgxir3y); };
$Vmbzc5xgwrgo = $Vbf4sq4psyai['foo'];
$Vglk1nbl1t2o = $Vbf4sq4psyai['foo']; 
?>
--EXPECTF--
bool(true)