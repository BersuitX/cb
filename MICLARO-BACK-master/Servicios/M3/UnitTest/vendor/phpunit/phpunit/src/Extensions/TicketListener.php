<?php



abstract class PHPUnit_Extensions_TicketListener implements PHPUnit_Framework_TestListener
{
    
    protected $Vx1vrstff55o = array();

    
    protected $V0ieplumaj3d = false;

    
    public function addError(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
    }

    
    public function addFailure(PHPUnit_Framework_Test $Vpswbntjg3pr, PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
    }

    
    public function addIncompleteTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
    }

    
    public function addRiskyTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
    }

    
    public function addSkippedTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
    }

    
    public function startTestSuite(PHPUnit_Framework_TestSuite $Vrrxtoyyy15e)
    {
    }

    
    public function endTestSuite(PHPUnit_Framework_TestSuite $Vrrxtoyyy15e)
    {
    }

    
    public function startTest(PHPUnit_Framework_Test $Vpswbntjg3pr)
    {
        if (!$Vpswbntjg3pr instanceof PHPUnit_Framework_Warning) {
            if ($this->ran) {
                return;
            }

            $Vgpjmw221p0b    = $Vpswbntjg3pr->getName(false);
            $Vop5v3zrjzhy = PHPUnit_Util_Test::getTickets(get_class($Vpswbntjg3pr), $Vgpjmw221p0b);

            foreach ($Vop5v3zrjzhy as $V2nwiukddp1d) {
                $this->ticketCounts[$V2nwiukddp1d][$Vgpjmw221p0b] = 1;
            }

            $this->ran = true;
        }
    }

    
    public function endTest(PHPUnit_Framework_Test $Vpswbntjg3pr, $Vlbwbnl10iav)
    {
        if (!$Vpswbntjg3pr instanceof PHPUnit_Framework_Warning) {
            if ($Vpswbntjg3pr->getStatus() == PHPUnit_Runner_BaseTestRunner::STATUS_PASSED) {
                $Vjmeyvcwjaop   = array('assigned', 'new', 'reopened');
                $Vqmm4kkuwxyk  = 'closed';
                $Vbl4yrmdan1y    = 'Automatically closed by PHPUnit (test passed).';
                $V4c2lrqkb4vy = 'fixed';
                $Vd5spwrf3dda = true;
            } elseif ($Vpswbntjg3pr->getStatus() == PHPUnit_Runner_BaseTestRunner::STATUS_FAILURE) {
                $Vjmeyvcwjaop   = array('closed');
                $Vqmm4kkuwxyk  = 'reopened';
                $Vbl4yrmdan1y    = 'Automatically reopened by PHPUnit (test failed).';
                $V4c2lrqkb4vy = '';
                $Vd5spwrf3dda = false;
            } else {
                return;
            }

            $Vgpjmw221p0b    = $Vpswbntjg3pr->getName(false);
            $Vop5v3zrjzhy = PHPUnit_Util_Test::getTickets(get_class($Vpswbntjg3pr), $Vgpjmw221p0b);

            foreach ($Vop5v3zrjzhy as $V2nwiukddp1d) {
                
                if ($Vpswbntjg3pr->getStatus() == PHPUnit_Runner_BaseTestRunner::STATUS_PASSED) {
                    unset($this->ticketCounts[$V2nwiukddp1d][$Vgpjmw221p0b]);
                }

                
                
                if ($Vd5spwrf3dda) {
                    
                    if (count($this->ticketCounts[$V2nwiukddp1d]) > 0) {
                        
                        $Von5t0n3jnbq = false;
                    } else {
                        
                        $Von5t0n3jnbq = true;
                    }
                } else {
                    $Von5t0n3jnbq = true;
                }

                $V2nwiukddp1dInfo = $this->getTicketInfo($V2nwiukddp1d);

                if ($Von5t0n3jnbq && in_array($V2nwiukddp1dInfo['status'], $Vjmeyvcwjaop)) {
                    $this->updateTicket($V2nwiukddp1d, $Vqmm4kkuwxyk, $Vbl4yrmdan1y, $V4c2lrqkb4vy);
                }
            }
        }
    }

    
    abstract protected function getTicketInfo($V2nwiukddp1dId = null);

    
    abstract protected function updateTicket($V2nwiukddp1dId, $Vqmm4kkuwxyk, $Vbl4yrmdan1y, $V4c2lrqkb4vy);
}
