--TEST--
Test service is called as callback for every callback type
--SKIPIF--
<?php if (!extension_loaded("pimple")) print "skip"; ?>
--FILE--
<?php
function callme()
{
    return 'called';
}

$Vmbzc5xgwrgo = function() { return 'called'; };

class Foo
{
    public static function bar()
    {
        return 'called';
    }
}
 
$Vbf4sq4psyai = new Pimple\Container();
$Vbf4sq4psyai['foo'] = 'callme';
echo $Vbf4sq4psyai['foo'] . "\n";

$Vbf4sq4psyai['bar'] = $Vmbzc5xgwrgo;
echo $Vbf4sq4psyai['bar'] . "\n";

$Vbf4sq4psyai['baz'] = "Foo::bar";
echo $Vbf4sq4psyai['baz'] . "\n";

$Vbf4sq4psyai['foobar'] = array('Foo', 'bar');
var_dump($Vbf4sq4psyai['foobar']);

?>
--EXPECTF--
callme
called
Foo::bar
array(2) {
  [0]=>
  string(3) "Foo"
  [1]=>
  string(3) "bar"
}