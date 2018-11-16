--TEST--
Test has/unset dim handlers
--SKIPIF--
<?php if (!extension_loaded("pimple")) print "skip"; ?>
--FILE--
<?php 
$Vbf4sq4psyai = new Pimple\Container();
$Vbf4sq4psyai[] = 42;
var_dump($Vbf4sq4psyai[0]);
unset($Vbf4sq4psyai[0]);
var_dump($Vbf4sq4psyai[0]);
$Vbf4sq4psyai['foo'] = 'bar';
var_dump(isset($Vbf4sq4psyai['foo']));
unset($Vbf4sq4psyai['foo']);
try {
	var_dump($Vbf4sq4psyai['foo']);
	echo "Excpected exception";
} catch (InvalidArgumentException $Vpt32vvhspnv) { }
var_dump(isset($Vbf4sq4psyai['bar']));
$Vbf4sq4psyai['bar'] = NULL;
var_dump(isset($Vbf4sq4psyai['bar']));
var_dump(empty($Vbf4sq4psyai['bar']));
?>
--EXPECT--
int(42)
NULL
bool(true)
bool(false)
bool(true)
bool(true)