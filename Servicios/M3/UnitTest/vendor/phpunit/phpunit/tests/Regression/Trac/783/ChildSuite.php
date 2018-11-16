<?php
require_once 'OneTest.php';
require_once 'TwoTest.php';

class ChildSuite
{
    public static function suite()
    {
        $Vrrxtoyyy15e = new PHPUnit_Framework_TestSuite('Child');
        $Vrrxtoyyy15e->addTestSuite('OneTest');
        $Vrrxtoyyy15e->addTestSuite('TwoTest');

        return $Vrrxtoyyy15e;
    }
}
