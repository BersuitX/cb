<?php
class DependencyTestSuite
{
    public static function suite()
    {
        $Vrrxtoyyy15e = new PHPUnit_Framework_TestSuite('Test Dependencies');

        $Vrrxtoyyy15e->addTestSuite('DependencySuccessTest');
        $Vrrxtoyyy15e->addTestSuite('DependencyFailureTest');

        return $Vrrxtoyyy15e;
    }
}
