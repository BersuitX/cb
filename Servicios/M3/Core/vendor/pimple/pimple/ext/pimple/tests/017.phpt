--TEST--
Test extend() with exception in service extension
--SKIPIF--
<?php if (!extension_loaded("pimple")) print "skip"; ?>
--FILE--
<?php

$Vbf4sq4psyai = new Pimple\Container();
$Vbf4sq4psyai[12] = function ($V3jv1il2hqc3) { return 'foo';};

$Vibefsvmlpru = $Vbf4sq4psyai->extend(12, function ($Vicpgpgggvvo) { throw new BadMethodCallException; });

try {
	$Vbf4sq4psyai[12];
	echo "Exception expected";
} catch (BadMethodCallException $Vpt32vvhspnv) { }
--EXPECTF--
