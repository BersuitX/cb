--TEST--
PHPUnit_Framework_MockObject_Generator::generate('ClassWithMethodWithVariadicArguments', array(), 'MockFoo', TRUE, TRUE)
--SKIPIF--
<?php
if (version_compare(PHP_VERSION, '5.6.0', '<')) print 'skip: PHP >= 5.6.0 required';
?>
--FILE--
<?php
class ClassWithMethodWithVariadicArguments
{
    public function methodWithVariadicArguments($Vmbzc5xgwrgo, ...$Vsazp03zrvte)
    {
    }
}

require __DIR__ . '/../../vendor/autoload.php';

$Vi5uqhlkbfzi = new PHPUnit_Framework_MockObject_Generator;

$Va4elnpuniwh = $Vi5uqhlkbfzi->generate(
  'ClassWithMethodWithVariadicArguments',
  array(),
  'MockFoo',
  TRUE,
  TRUE
);

print $Va4elnpuniwh['code'];
?>
--EXPECTF--
class MockFoo extends ClassWithMethodWithVariadicArguments implements PHPUnit_Framework_MockObject_MockObject
{
    private $Vynjhvp3xxy3;
    private $Vfhlah5ehwpr;

    public function __clone()
    {
        $this->__phpunit_invocationMocker = clone $this->__phpunit_getInvocationMocker();
    }

    public function methodWithVariadicArguments($Vmbzc5xgwrgo, ...$Vsazp03zrvte)
    {
        $Vmbzc5xgwrgorguments = array($Vmbzc5xgwrgo);
        $Vdbkece3gnp5     = func_num_args();

        if ($Vdbkece3gnp5 > 1) {
            $Vq15aehmzl1k = func_get_args();

            for ($Vxja1abp34yq = 1; $Vxja1abp34yq < $Vdbkece3gnp5; $Vxja1abp34yq++) {
                $Vmbzc5xgwrgorguments[] = $Vq15aehmzl1k[$Vxja1abp34yq];
            }
        }

        $Vv0hyvhlkjqr = $this->__phpunit_getInvocationMocker()->invoke(
          new PHPUnit_Framework_MockObject_Invocation_Object(
            'ClassWithMethodWithVariadicArguments', 'methodWithVariadicArguments', $Vmbzc5xgwrgorguments, $this, TRUE
          )
        );

        return $Vv0hyvhlkjqr;
    }

    public function expects(PHPUnit_Framework_MockObject_Matcher_Invocation $V22uxeddyuqg)
    {
        return $this->__phpunit_getInvocationMocker()->expects($V22uxeddyuqg);
    }

    public function method()
    {
        $Vmbzc5xgwrgony = new PHPUnit_Framework_MockObject_Matcher_AnyInvokedCount;
        $Vvnzy30vrsjs = $this->expects($Vmbzc5xgwrgony);
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
