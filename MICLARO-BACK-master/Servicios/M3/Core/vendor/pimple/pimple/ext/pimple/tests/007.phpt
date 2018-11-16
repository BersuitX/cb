--TEST--
Test for read_dim/write_dim handlers
--SKIPIF--
<?php if (!extension_loaded("pimple")) print "skip"; ?>
--FILE--
<?php 
$Vbf4sq4psyai = new Pimple\Container();
$Vbf4sq4psyai[42] = 'foo';
$Vbf4sq4psyai['foo'] = 42;

echo $Vbf4sq4psyai[42];
echo "\n";
echo $Vbf4sq4psyai['foo'];
echo "\n";
try {
	var_dump($Vbf4sq4psyai['nonexistant']);
	echo "Exception excpected";
} catch (InvalidArgumentException $Vpt32vvhspnv) { }
?>
--EXPECTF--
foo
42