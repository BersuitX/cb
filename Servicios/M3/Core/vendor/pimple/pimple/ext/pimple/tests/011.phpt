--TEST--
Test service callback throwing an exception
--SKIPIF--
<?php if (!extension_loaded("pimple")) print "skip"; ?>
--FILE--
<?php
class CallBackException extends RuntimeException { }

$Vbf4sq4psyai = new Pimple\Container();
$Vbf4sq4psyai['foo'] = function () { throw new CallBackException; };
try {
	echo $Vbf4sq4psyai['foo'] . "\n";
	echo "should not come here";
} catch (CallBackException $Vpt32vvhspnv) {
	echo "all right!";
}
?>
--EXPECTF--
all right!