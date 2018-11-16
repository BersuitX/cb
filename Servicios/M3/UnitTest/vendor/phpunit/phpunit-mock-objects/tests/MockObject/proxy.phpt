--TEST--
PHPUnit_Framework_MockObject_Generator::generate('Foo', NULL, 'ProxyFoo', TRUE, TRUE, TRUE, TRUE)
--FILE--
<?php
class Foo
{
    public function bar(Foo $Vrqaitdc0ft3)
    {
    }

    public function baz(Foo $Vrqaitdc0ft3)
    {
    }
}

require __DIR__ . '/../../vendor/autoload.php';

$Vi5uqhlkbfzi = new PHPUnit_Framework_MockObject_Generator;

$Va4elnpuniwh = $Vi5uqhlkbfzi->generate(
  'Foo', array(), 'ProxyFoo', TRUE, TRUE, TRUE, TRUE
);

print $Va4elnpuniwh['code'];
?>
--EXPECTF--
class ProxyFoo extends Foo implements PHPUnit_Framework_MockObject_MockObject
{
    private $Vynjhvp3xxy3;
    private $Vfhlah5ehwpr;

    public function __clone()
    {
        $this->__phpunit_invocationMocker = clone $this->__phpunit_getInvocationMocker();
    }

    public function bar(Foo $Vrqaitdc0ft3)
    {
        $Vj23lbel2xn0 = array($Vrqaitdc0ft3);
        $Vdbkece3gnp5     = func_num_args();

        if ($Vdbkece3gnp5 > 1) {
            $Vq15aehmzl1k = func_get_args();

            for ($Vxja1abp34yq = 1; $Vxja1abp34yq < $Vdbkece3gnp5; $Vxja1abp34yq++) {
                $Vj23lbel2xn0[] = $Vq15aehmzl1k[$Vxja1abp34yq];
            }
        }

        $this->__phpunit_getInvocationMocker()->invoke(
          new PHPUnit_Framework_MockObject_Invocation_Object(
            'Foo', 'bar', $Vj23lbel2xn0, $this, TRUE
          )
        );

        return call_user_func_array(array($this->__phpunit_originalObject, "bar"), $Vj23lbel2xn0);
    }

    public function baz(Foo $Vrqaitdc0ft3)
    {
        $Vj23lbel2xn0 = array($Vrqaitdc0ft3);
        $Vdbkece3gnp5     = func_num_args();

        if ($Vdbkece3gnp5 > 1) {
            $Vq15aehmzl1k = func_get_args();

            for ($Vxja1abp34yq = 1; $Vxja1abp34yq < $Vdbkece3gnp5; $Vxja1abp34yq++) {
                $Vj23lbel2xn0[] = $Vq15aehmzl1k[$Vxja1abp34yq];
            }
        }

        $this->__phpunit_getInvocationMocker()->invoke(
          new PHPUnit_Framework_MockObject_Invocation_Object(
            'Foo', 'baz', $Vj23lbel2xn0, $this, TRUE
          )
        );

        return call_user_func_array(array($this->__phpunit_originalObject, "baz"), $Vj23lbel2xn0);
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
