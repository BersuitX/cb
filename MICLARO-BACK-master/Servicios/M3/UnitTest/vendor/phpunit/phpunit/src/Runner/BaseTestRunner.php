<?php



abstract class PHPUnit_Runner_BaseTestRunner
{
    const STATUS_PASSED     = 0;
    const STATUS_SKIPPED    = 1;
    const STATUS_INCOMPLETE = 2;
    const STATUS_FAILURE    = 3;
    const STATUS_ERROR      = 4;
    const STATUS_RISKY      = 5;
    const SUITE_METHODNAME  = 'suite';

    
    public function getLoader()
    {
        return new PHPUnit_Runner_StandardTestSuiteLoader;
    }

    
    public function getTest($Vxve5jyfmhzo, $Vtcfwf2f1luj = '', $Vj5tuqhgx1hz = '')
    {
        if (is_dir($Vxve5jyfmhzo) &&
            !is_file($Vxve5jyfmhzo . '.php') && empty($Vtcfwf2f1luj)) {
            $Vxvtuduzlxzp = new File_Iterator_Facade;
            $V5s0rodgwwbv  = $Vxvtuduzlxzp->getFilesAsArray(
                $Vxve5jyfmhzo,
                $Vj5tuqhgx1hz
            );

            $Vrrxtoyyy15e = new PHPUnit_Framework_TestSuite($Vxve5jyfmhzo);
            $Vrrxtoyyy15e->addTestFiles($V5s0rodgwwbv);

            return $Vrrxtoyyy15e;
        }

        try {
            $Vawfkxxex1u2 = $this->loadSuiteClass(
                $Vxve5jyfmhzo,
                $Vtcfwf2f1luj
            );
        } catch (PHPUnit_Framework_Exception $Vpt32vvhspnv) {
            $this->runFailed($Vpt32vvhspnv->getMessage());

            return;
        }

        try {
            $Vrrxtoyyy15eMethod = $Vawfkxxex1u2->getMethod(self::SUITE_METHODNAME);

            if (!$Vrrxtoyyy15eMethod->isStatic()) {
                $this->runFailed(
                    'suite() method must be static.'
                );

                return;
            }

            try {
                $Vpswbntjg3pr = $Vrrxtoyyy15eMethod->invoke(null, $Vawfkxxex1u2->getName());
            } catch (ReflectionException $Vpt32vvhspnv) {
                $this->runFailed(
                    sprintf(
                        "Failed to invoke suite() method.\n%s",
                        $Vpt32vvhspnv->getMessage()
                    )
                );

                return;
            }
        } catch (ReflectionException $Vpt32vvhspnv) {
            try {
                $Vpswbntjg3pr = new PHPUnit_Framework_TestSuite($Vawfkxxex1u2);
            } catch (PHPUnit_Framework_Exception $Vpt32vvhspnv) {
                $Vpswbntjg3pr = new PHPUnit_Framework_TestSuite;
                $Vpswbntjg3pr->setName($Vxve5jyfmhzo);
            }
        }

        $this->clearStatus();

        return $Vpswbntjg3pr;
    }

    
    protected function loadSuiteClass($Vxve5jyfmhzo, $Vtcfwf2f1luj = '')
    {
        $Vovnziqng5rv = $this->getLoader();

        return $Vovnziqng5rv->load($Vxve5jyfmhzo, $Vtcfwf2f1luj);
    }

    
    protected function clearStatus()
    {
    }

    
    abstract protected function runFailed($Vbl4yrmdan1y);
}
