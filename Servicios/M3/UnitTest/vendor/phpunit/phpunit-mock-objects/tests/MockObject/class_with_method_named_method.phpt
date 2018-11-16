--TEST--
PHPUnit_Framework_MockObject_Generator::generate('Foo', array(), 'MockFoo', TRUE, TRUE)
--FILE--
<?php
class Foo
{
    public function method()
    {
    }
}

require __DIR__ . '/../../vendor/autoload.php';

$Vi5uqhlkbfzi = new PHPUnit_Framework_MockObject_Generator;

$Va4elnpuniwh = $Vi5uqhlkbfzi->generate(
  'Foo',
  array(),
  'MockFoo',
  TRUE,
  TRUE
);

print $Va4elnpuniwh['code'];
?>
--EXPECTF--
class MockFoo extends Foo implements PHPUnit_Framework_MockObject_MockObject
{
    private $Vynjhvp3xxy3;
    private $Vfhlah5ehwpr;

    public function __clone()
    {
        $this->__phpunit_invocationMocker = clone $this->__phpunit_getInvocationMocker();
    }

    public function method()
    {
        $Vj23lbel2xn0 = array();
        $Vdbkece3gnp5     = func_num_args();

        if ($Vdbkece3gnp5 > 0) {
            $Vq15aehmzl1k = func_get_args();

            for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vdbkece3gnp5; $Vxja1abp34yq++) {
                $Vj23lbel2xn0[] = $Vq15aehmzl1k[$Vxja1abp34yq];
            }
        }

        $Vv0hyvhlkjqr = $this->__phpunit_getInvocationMocker()->invoke(
          new PHPUnit_Framework_MockObject_Invocation_Object(
            'Foo', 'method', $Vj23lbel2xn0, $this, TRUE
          )
        );

        return $Vv0hyvhlkjqr;
    }

    public function expects(PHPUnit_Framework_MockObject_Matcher_Invocation $V22uxeddyuqg)
    {
        return $this->__phpunit_getInvocationMocker()->expects($V22uxeddyuqg);
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
