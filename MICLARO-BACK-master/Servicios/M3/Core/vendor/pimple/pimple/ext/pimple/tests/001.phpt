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

$Vbf4sq4psyai[54.2] = 'foo2';
echo $Vbf4sq4psyai[54];
echo "\n";
$Vbf4sq4psyai[242.99] = 'foo99';
echo $Vbf4sq4psyai[242];

echo "\n";

$Vbf4sq4psyai[5] = 'bar';
$Vbf4sq4psyai[5] = 'baz';
echo $Vbf4sq4psyai[5];

echo "\n";

$Vbf4sq4psyai['str'] = 'str';
$Vbf4sq4psyai['str'] = 'strstr';
echo $Vbf4sq4psyai['str'];
?>

--EXPECTF--
foo
42
foo2
foo99
baz
strstr