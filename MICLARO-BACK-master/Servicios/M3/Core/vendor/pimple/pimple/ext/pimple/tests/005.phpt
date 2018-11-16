--TEST--
Test simple class inheritance
--SKIPIF--
<?php if (!extension_loaded("pimple")) print "skip"; ?>
--FILE--
<?php 
class MyPimple extends Pimple\Container
{
	public $V41zvtca3uv5 = 'fooAttr';

    public function offsetget($Vgcvauwd5u5t)
    {
        var_dump("hit");
        return parent::offsetget($Vgcvauwd5u5t);
    }
}

$Vbf4sq4psyai = new MyPimple;
$Vbf4sq4psyai[42] = 'foo';
echo $Vbf4sq4psyai[42];
echo "\n";
echo $Vbf4sq4psyai->someAttr;
?>
--EXPECT--
string(3) "hit"
foo
fooAttr