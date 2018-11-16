<?php
class ParentClassWithPrivateAttributes
{
    private static $V0tktpactuyr = 'foo';
    private $Vkambu23lddz              = 'bar';
}

class ParentClassWithProtectedAttributes extends ParentClassWithPrivateAttributes
{
    protected static $Vrwrue2xpjcu = 'foo';
    protected $Vrol1xmhkk3m              = 'bar';
}

class ClassWithNonPublicAttributes extends ParentClassWithProtectedAttributes
{
    public static $V5yf2mkg1xpw       = 'foo';
    protected static $Vmk5k0un0lq0 = 'bar';
    protected static $Vsxmfjuj5p1g   = 'baz';

    public $Veaotnchvkag       = 'foo';
    public $Vrqaitdc0ft3                   = 1;
    public $Vwatlmbamu3p                   = 2;
    protected $Vuunzgqhppcg = 'bar';
    protected $Vpl0augjmbmj   = 'baz';

    public $Vzay2qmt1scv       = array('foo');
    protected $Vrceo1r5ts5s = array('bar');
    protected $Vwng05wxaenv   = array('baz');
}
