<?php
require_once 'ChildSuite.php';

class ParentSuite
{
    public static function suite()
    {
        $Vrrxtoyyy15e = new PHPUnit_Framework_TestSuite('Parent');
        $Vrrxtoyyy15e->addTest(ChildSuite::suite());

        return $Vrrxtoyyy15e;
    }
}
