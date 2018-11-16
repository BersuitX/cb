<?php



class PHPUnit_Extensions_GroupTestSuite extends PHPUnit_Framework_TestSuite
{
    public function __construct(PHPUnit_Framework_TestSuite $Vrrxtoyyy15e, array $V00tm5epe1pm)
    {
        $Vuauenwi3hkj = array();
        $Vgpjmw221p0b        = $Vrrxtoyyy15e->getName();

        foreach ($V00tm5epe1pm as $Vsq5adfvkj3r) {
            $Vuauenwi3hkj[$Vsq5adfvkj3r] = new PHPUnit_Framework_TestSuite($Vgpjmw221p0b . ' - ' . $Vsq5adfvkj3r);
            $this->addTest($Vuauenwi3hkj[$Vsq5adfvkj3r]);
        }

        $Vo50qpjpkko3 = new RecursiveIteratorIterator(
            new PHPUnit_Util_TestSuiteIterator($Vrrxtoyyy15e),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($Vo50qpjpkko3 as $Vpswbntjg3pr) {
            if ($Vpswbntjg3pr instanceof PHPUnit_Framework_TestCase) {
                $Vpswbntjg3prGroups = PHPUnit_Util_Test::getGroups(
                    get_class($Vpswbntjg3pr),
                    $Vpswbntjg3pr->getName(false)
                );

                foreach ($V00tm5epe1pm as $Vsq5adfvkj3r) {
                    foreach ($Vpswbntjg3prGroups as $Vpswbntjg3prGroup) {
                        if ($Vsq5adfvkj3r == $Vpswbntjg3prGroup) {
                            $Vuauenwi3hkj[$Vsq5adfvkj3r]->addTest($Vpswbntjg3pr);
                        }
                    }
                }
            }
        }
    }
}
