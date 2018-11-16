--TEST--
PHPUnit_Framework_MockObject_Generator::generate('NS\Foo', array(), 'MockFoo', TRUE)
--FILE--
<?php
namespace NS;

interface IFoo
{
    public function __construct($Vwatlmbamu3p);
}

class Foo implements IFoo
{
    public function __construct($Vwatlmbamu3p)
    {
    }
}

require __DIR__ . '/../../vendor/autoload.php';

$Vi5uqhlkbfzi = new \PHPUnit_Framework_MockObject_Generator;

$Va4elnpuniwh = $Vi5uqhlkbfzi->generate(
  'NS\Foo',
  array(),
  'MockFoo',
  TRUE
);

print $Va4elnpuniwh['code'];
?>
--EXPECTF--
class MockFoo extends NS\Foo implements PHPUnit_Framework_MockObject_MockObject
{
    private $Vynjhvp3xxy3;
    private $Vfhlah5ehwpr;

    public function __clone()
    {
        $this->__phpunit_invocationMocker = clone $this->__phpunit_getInvocationMocker();
    }

    public function expects(PHPUnit_Framework_MockObject_Matcher_Invocation $V22uxeddyuqg)
    {
        return $this->__phpunit_getInvocationMocker()->expects($V22uxeddyuqg);
    }

    public function method()
    {
        $Vo5xq4yetjpn = new PHPUnit_Framework_MockObject_Matcher_AnyInvokedCount;
        $Vvnzy30vrsjs = $this->expects($Vo5xq4yetjpn);
        return call_user_func_array(array($Vvnzy30vrsjs, 'method'), func_get_args());
    }

    public function __phpunit_setOriginalObject($Vj4c3cjhcoks)
    {
        $this->__phpunit_originalObject = $Vj4c3cjhcoks;
    }

    public function __phpunit_getInvocationMocker()
    {
        if ($this->__phpunit_invocationMocker === NULL) {
            $this->__phpunit_invocationMocker = new PHPUnit_Framework_MockObject_InvocationMocker;
        }

        return $this->__phpunit_invocationMocker;
    }

    public function __phpunit_hasMatchers()
    {
        return $this->__phpunit_getInvocationMocker()->hasMatchers();
    }

    public function __phpunit_verify()
    {
        $this->__phpunit_getInvocationMocker()->verify();
        $this->__phpunit_invocationMocker = NULL;
    }
}
