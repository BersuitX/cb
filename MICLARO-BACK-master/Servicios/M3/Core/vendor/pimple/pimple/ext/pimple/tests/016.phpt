--TEST--
Test extend()
--SKIPIF--
<?php if (!extension_loaded("pimple")) print "skip"; ?>
--FILE--
<?php


$Vbf4sq4psyai = new Pimple\Container();
$Vbf4sq4psyai[12] = function ($V3jv1il2hqc3) { var_dump($V3jv1il2hqc3); return 'foo';}; 

$Vibefsvmlpru = $Vbf4sq4psyai->extend(12, function ($Vicpgpgggvvo) { var_dump($Vicpgpgggvvo); return 'bar'; }); 

var_dump($Vibefsvmlpru('param'));
--EXPECTF--
string(5) "param"
string(3) "foo"
string(3) "bar"