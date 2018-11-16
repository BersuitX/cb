<?php
class ExceptionStackTest extends PHPUnit_Framework_TestCase
{
    public function testPrintingChildException()
    {
        try {
            $this->assertEquals(array(1), array(2), 'message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $Vbl4yrmdan1y = $Vpt32vvhspnv->getMessage() . $Vpt32vvhspnv->getComparisonFailure()->getDiff();
            throw new PHPUnit_Framework_Exception("Child exception\n$Vbl4yrmdan1y", 101, $Vpt32vvhspnv);
        }
    }

    public function testNestedExceptions()
    {
        $Vpt32vvhspnvxceptionThree = new Exception('Three');
        $Vpt32vvhspnvxceptionTwo   = new InvalidArgumentException('Two', 0, $Vpt32vvhspnvxceptionThree);
        $Vpt32vvhspnvxceptionOne   = new Exception('One', 0, $Vpt32vvhspnvxceptionTwo);
        throw $Vpt32vvhspnvxceptionOne;
    }
}
