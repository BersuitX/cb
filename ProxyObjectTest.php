<?php



class Framework_ProxyObjectTest extends PHPUnit_Framework_TestCase
{
    public function testMockedMethodIsProxiedToOriginalMethod()
    {
        $V5uykzzhmp1k = $this->getMockBuilder('Bar')
                      ->enableProxyingToOriginalMethods()
                      ->getMock();

        $V5uykzzhmp1k->expects($this->once())
              ->method('doSomethingElse');

        $Vrqaitdc0ft3 = new Foo;
        $this->assertEquals('result', $Vrqaitdc0ft3->doSomething($V5uykzzhmp1k));
    }

    public function testMockedMethodWithReferenceIsProxiedToOriginalMethod()
    {
        $V5uykzzhmp1k = $this->getMockBuilder('MethodCallbackByReference')
                      ->enableProxyingToOriginalMethods()
                      ->getMock();
        $Vmbzc5xgwrgo = $Vglk1nbl1t2o = $Vibefsvmlpru = 0;

        $V5uykzzhmp1k->callback($Vmbzc5xgwrgo, $Vglk1nbl1t2o, $Vibefsvmlpru);

        $this->assertEquals(1, $Vglk1nbl1t2o);
    }
}
