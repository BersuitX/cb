--TEST--
Test extend() with exception in service factory
--SKIPIF--
<?php if (!extension_loaded("pimple")) print "skip"; ?>
--FILE--
<?php

$Vbf4sq4psyai = new Pimple\Container();
$Vbf4sq4psyai[12] = function ($V3jv1il2hqc3) { throw new BadMethodCallException; };

$Vibefsvmlpru = $Vbf4sq4psyai->extend(12, function ($Vicpgpgggvvo) { return 'foobar'; });

try {
	$Vbf4sq4psyai[12];
	echo "Exception expected";
} catch (BadMethodCallException $Vpt32vvhspnv) { }
--EXPECTF--
