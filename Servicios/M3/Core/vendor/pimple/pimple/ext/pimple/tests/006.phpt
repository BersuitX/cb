--TEST--
Test complex class inheritance
--SKIPIF--
<?php if (!extension_loaded("pimple")) print "skip"; ?>
--FILE--
<?php 
class MyPimple extends Pimple\Container
{
    public function offsetget($Vgcvauwd5u5t)
    {
        var_dump("hit offsetget in " . __CLASS__);
        return parent::offsetget($Vgcvauwd5u5t);
    }
}

class TestPimple extends MyPimple
{
    public function __construct($Vmyhfq3hu0xr)
    {
        array_shift($Vmyhfq3hu0xr);
        parent::__construct($Vmyhfq3hu0xr);
    }
    
    public function offsetget($Vgcvauwd5u5t)
    {
        var_dump('hit offsetget in ' . __CLASS__);
        return parent::offsetget($Vgcvauwd5u5t);
    }
    
    public function offsetset($Vgcvauwd5u5t, $V3jv1il2hqc3)
    {
        var_dump('hit offsetset');
        return parent::offsetset($Vgcvauwd5u5t, $V3jv1il2hqc3);
    }
}

$Vuyxpnuevqef = array('foo' => 'bar', 88 => 'baz');

$Vbf4sq4psyai = new TestPimple($Vuyxpnuevqef);
$Vbf4sq4psyai[42] = 'foo';
var_dump($Vbf4sq4psyai[42]);
var_dump($Vbf4sq4psyai[0]);
?>
--EXPECT--
string(13) "hit offsetset"
string(27) "hit offsetget in TestPimple"
string(25) "hit offsetget in MyPimple"
string(3) "foo"
string(27) "hit offsetget in TestPimple"
string(25) "hit offsetget in MyPimple"
string(3) "baz"