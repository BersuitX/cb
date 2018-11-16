<?php



interface PHPUnit_Framework_TestListener
{
    
    public function addError(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav);

    
    public function addFailure(PHPUnit_Framework_Test $Vpswbntjg3pr, PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv, $Vlbwbnl10iav);

    
    public function addIncompleteTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav);

    
    public function addRiskyTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav);

    
    public function addSkippedTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav);

    
    public function startTestSuite(PHPUnit_Framework_TestSuite $Vrrxtoyyy15e);

    
    public function endTestSuite(PHPUnit_Framework_TestSuite $Vrrxtoyyy15e);

    
    public function startTest(PHPUnit_Framework_Test $Vpswbntjg3pr);

    
    public function endTest(PHPUnit_Framework_Test $Vpswbntjg3pr, $Vlbwbnl10iav);
}
