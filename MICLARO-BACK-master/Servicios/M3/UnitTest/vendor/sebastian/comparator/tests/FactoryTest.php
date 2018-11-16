<?php


namespace SebastianBergmann\Comparator;


class FactoryTest extends \PHPUnit_Framework_TestCase
{
    public function instanceProvider()
    {
        $V0r5yqgvv0pd = tmpfile();

        return array(
            array(NULL, NULL, 'SebastianBergmann\\Comparator\\ScalarComparator'),
            array(NULL, TRUE, 'SebastianBergmann\\Comparator\\ScalarComparator'),
            array(TRUE, NULL, 'SebastianBergmann\\Comparator\\ScalarComparator'),
            array(TRUE, TRUE, 'SebastianBergmann\\Comparator\\ScalarComparator'),
            array(FALSE, FALSE, 'SebastianBergmann\\Comparator\\ScalarComparator'),
            array(TRUE, FALSE, 'SebastianBergmann\\Comparator\\ScalarComparator'),
            array(FALSE, TRUE, 'SebastianBergmann\\Comparator\\ScalarComparator'),
            array('', '', 'SebastianBergmann\\Comparator\\ScalarComparator'),
            array('0', '0', 'SebastianBergmann\\Comparator\\ScalarComparator'),
            array('0', 0, 'SebastianBergmann\\Comparator\\NumericComparator'),
            array(0, '0', 'SebastianBergmann\\Comparator\\NumericComparator'),
            array(0, 0, 'SebastianBergmann\\Comparator\\NumericComparator'),
            array(1.0, 0, 'SebastianBergmann\\Comparator\\DoubleComparator'),
            array(0, 1.0, 'SebastianBergmann\\Comparator\\DoubleComparator'),
            array(1.0, 1.0, 'SebastianBergmann\\Comparator\\DoubleComparator'),
            array(array(1), array(1), 'SebastianBergmann\\Comparator\\ArrayComparator'),
            array($V0r5yqgvv0pd, $V0r5yqgvv0pd, 'SebastianBergmann\\Comparator\\ResourceComparator'),
            array(new \stdClass, new \stdClass, 'SebastianBergmann\\Comparator\\ObjectComparator'),
            array(new \DateTime, new \DateTime, 'SebastianBergmann\\Comparator\\DateTimeComparator'),
            array(new \SplObjectStorage, new \SplObjectStorage, 'SebastianBergmann\\Comparator\\SplObjectStorageComparator'),
            array(new \Exception, new \Exception, 'SebastianBergmann\\Comparator\\ExceptionComparator'),
            array(new \DOMDocument, new \DOMDocument, 'SebastianBergmann\\Comparator\\DOMNodeComparator'),
            
            array($V0r5yqgvv0pd, array(1), 'SebastianBergmann\\Comparator\\TypeComparator'),
            array(array(1), $V0r5yqgvv0pd, 'SebastianBergmann\\Comparator\\TypeComparator'),
            array($V0r5yqgvv0pd, '1', 'SebastianBergmann\\Comparator\\TypeComparator'),
            array('1', $V0r5yqgvv0pd, 'SebastianBergmann\\Comparator\\TypeComparator'),
            array($V0r5yqgvv0pd, new \stdClass, 'SebastianBergmann\\Comparator\\TypeComparator'),
            array(new \stdClass, $V0r5yqgvv0pd, 'SebastianBergmann\\Comparator\\TypeComparator'),
            array(new \stdClass, array(1), 'SebastianBergmann\\Comparator\\TypeComparator'),
            array(array(1), new \stdClass, 'SebastianBergmann\\Comparator\\TypeComparator'),
            array(new \stdClass, '1', 'SebastianBergmann\\Comparator\\TypeComparator'),
            array('1', new \stdClass, 'SebastianBergmann\\Comparator\\TypeComparator'),
            array(new ClassWithToString, '1', 'SebastianBergmann\\Comparator\\ScalarComparator'),
            array('1', new ClassWithToString, 'SebastianBergmann\\Comparator\\ScalarComparator'),
            array(1.0, new \stdClass, 'SebastianBergmann\\Comparator\\TypeComparator'),
            array(new \stdClass, 1.0, 'SebastianBergmann\\Comparator\\TypeComparator'),
            array(1.0, array(1), 'SebastianBergmann\\Comparator\\TypeComparator'),
            array(array(1), 1.0, 'SebastianBergmann\\Comparator\\TypeComparator'),
        );
    }

    
    public function testGetComparatorFor($Vmbzc5xgwrgo, $Vglk1nbl1t2o, $Vwcb1oykhumm)
    {
        $Vdnxqjiaf0hs = new Factory;
        $Vmbzc5xgwrgoctual = $Vdnxqjiaf0hs->getComparatorFor($Vmbzc5xgwrgo, $Vglk1nbl1t2o);
        $this->assertInstanceOf($Vwcb1oykhumm, $Vmbzc5xgwrgoctual);
    }

    
    public function testRegister()
    {
        $V23fl2cvtaex = new TestClassComparator;

        $Vdnxqjiaf0hs = new Factory;
        $Vdnxqjiaf0hs->register($V23fl2cvtaex);

        $Vmbzc5xgwrgo = new TestClass;
        $Vglk1nbl1t2o = new TestClass;
        $Vwcb1oykhumm = 'SebastianBergmann\\Comparator\\TestClassComparator';
        $Vmbzc5xgwrgoctual = $Vdnxqjiaf0hs->getComparatorFor($Vmbzc5xgwrgo, $Vglk1nbl1t2o);

        $Vdnxqjiaf0hs->unregister($V23fl2cvtaex);
        $this->assertInstanceOf($Vwcb1oykhumm, $Vmbzc5xgwrgoctual);
    }

    
    public function testUnregister()
    {
        $V23fl2cvtaex = new TestClassComparator;

        $Vdnxqjiaf0hs = new Factory;
        $Vdnxqjiaf0hs->register($V23fl2cvtaex);
        $Vdnxqjiaf0hs->unregister($V23fl2cvtaex);

        $Vmbzc5xgwrgo = new TestClass;
        $Vglk1nbl1t2o = new TestClass;
        $Vwcb1oykhumm = 'SebastianBergmann\\Comparator\\ObjectComparator';
        $Vmbzc5xgwrgoctual = $Vdnxqjiaf0hs->getComparatorFor($Vmbzc5xgwrgo, $Vglk1nbl1t2o);

        $this->assertInstanceOf($Vwcb1oykhumm, $Vmbzc5xgwrgoctual);
    }
}
