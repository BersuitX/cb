<?php



class Runner_BaseTestRunnerTest extends PHPUnit_Framework_TestCase
{
    public function testInvokeNonStaticSuite()
    {
        $Vp304br0tuhk = new MockRunner;
        $Vp304br0tuhk->getTest('NonStatic');
    }
}
