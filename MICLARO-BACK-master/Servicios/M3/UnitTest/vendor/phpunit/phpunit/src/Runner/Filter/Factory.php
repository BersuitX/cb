<?php



class PHPUnit_Runner_Filter_Factory
{
    
    private $Vmm0juc5yckf = array();

    
    public function addFilter(ReflectionClass $Vgpt4we0cx0b, $Veox3iprl5oz)
    {
        if (!$Vgpt4we0cx0b->isSubclassOf('RecursiveFilterIterator')) {
            throw new InvalidArgumentException(
                sprintf(
                    'Class "%s" does not extend RecursiveFilterIterator',
                    $Vgpt4we0cx0b->name
                )
            );
        }

        $this->filters[] = array($Vgpt4we0cx0b, $Veox3iprl5oz);
    }

    
    public function factory(Iterator $Vnv250ah4t1q, PHPUnit_Framework_TestSuite $Vrrxtoyyy15e)
    {
        foreach ($this->filters as $Vgpt4we0cx0b) {
            list($Vqmu1sajhgfn, $Veox3iprl5oz) = $Vgpt4we0cx0b;
            $Vnv250ah4t1q           = $Vqmu1sajhgfn->newInstance($Vnv250ah4t1q, $Veox3iprl5oz, $Vrrxtoyyy15e);
        }

        return $Vnv250ah4t1q;
    }
}
