<?php



abstract class PHPUnit_Runner_Filter_GroupFilterIterator extends RecursiveFilterIterator
{
    
    protected $Vymqmfqw1qqz = array();

    
    public function __construct(RecursiveIterator $Vnv250ah4t1q, array $V00tm5epe1pm, PHPUnit_Framework_TestSuite $Vrrxtoyyy15e)
    {
        parent::__construct($Vnv250ah4t1q);

        foreach ($Vrrxtoyyy15e->getGroupDetails() as $Vsq5adfvkj3r => $Vo50qpjpkko3) {
            if (in_array($Vsq5adfvkj3r, $V00tm5epe1pm)) {
                $Vtm2mkltv0qk = array_map(
                    function ($Vpswbntjg3pr) {
                        return spl_object_hash($Vpswbntjg3pr);
                    },
                    $Vo50qpjpkko3
                );

                $this->groupTests = array_merge($this->groupTests, $Vtm2mkltv0qk);
            }
        }
    }

    
    public function accept()
    {
        $Vpswbntjg3pr = $this->getInnerIterator()->current();

        if ($Vpswbntjg3pr instanceof PHPUnit_Framework_TestSuite) {
            return true;
        }

        return $this->doAccept(spl_object_hash($Vpswbntjg3pr));
    }

    abstract protected function doAccept($Vfrjid4vr3ci);
}
