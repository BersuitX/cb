--TEST--
Test frozen services
--SKIPIF--
<?php if (!extension_loaded("pimple")) print "skip"; ?>
--FILE--
<?php 
$Vbf4sq4psyai = new Pimple\Container();
$Vbf4sq4psyai[42] = 'foo';
$Vbf4sq4psyai[42] = 'bar';

$Vbf4sq4psyai['foo'] = function () { };
$Vbf4sq4psyai['foo'] = function () { };

$Vmbzc5xgwrgo = $Vbf4sq4psyai['foo'];

try {
	$Vbf4sq4psyai['foo'] = function () { };
	echo "Exception excpected";
} catch (RuntimeException $Vpt32vvhspnv) { }

$Vbf4sq4psyai[42] = function() { };
$Vmbzc5xgwrgo = $Vbf4sq4psyai[42];

try {
	$Vbf4sq4psyai[42] = function () { };
	echo "Exception excpected";
} catch (RuntimeException $Vpt32vvhspnv) { }
?>
--EXPECTF--
