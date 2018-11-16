--TEST--
Test service factory
--SKIPIF--
<?php if (!extension_loaded("pimple")) print "skip"; ?>
--FILE--
<?php

$Vbf4sq4psyai = new Pimple\Container();

$Vbf4sq4psyai->factory($Vei44fs011eo = function() { var_dump('called-1'); return 'ret-1';});

$Vbf4sq4psyai[] = $Vei44fs011eo;

$Vbf4sq4psyai[] = function () { var_dump('called-2'); return 'ret-2'; };

var_dump($Vbf4sq4psyai[0]);
var_dump($Vbf4sq4psyai[0]);
var_dump($Vbf4sq4psyai[1]);
var_dump($Vbf4sq4psyai[1]);
?>
--EXPECTF--
string(8) "called-1"
string(5) "ret-1"
string(8) "called-1"
string(5) "ret-1"
string(8) "called-2"
string(5) "ret-2"
string(5) "ret-2"