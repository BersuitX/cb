<?php



class PHPUnit_Runner_Filter_Test extends RecursiveFilterIterator
{
    
    protected $Vgpt4we0cx0b = null;

    
    protected $Vgpt4we0cx0bMin;
    
    protected $Vgpt4we0cx0bMax;

    
    public function __construct(RecursiveIterator $Vnv250ah4t1q, $Vgpt4we0cx0b)
    {
        parent::__construct($Vnv250ah4t1q);
        $this->setFilter($Vgpt4we0cx0b);
    }

    
    protected function setFilter($Vgpt4we0cx0b)
    {
        if (PHPUnit_Util_Regex::pregMatchSafe($Vgpt4we0cx0b, '') === false) {
            
            
            
            if (preg_match('/^(.*?)#(\d+)(?:-(\d+))?$/', $Vgpt4we0cx0b, $Virbphhh55ue)) {
                if (isset($Virbphhh55ue[3]) && $Virbphhh55ue[2] < $Virbphhh55ue[3]) {
                    $Vgpt4we0cx0b = sprintf(
                        '%s.*with data set #(\d+)$',
                        $Virbphhh55ue[1]
                    );

                    $this->filterMin = $Virbphhh55ue[2];
                    $this->filterMax = $Virbphhh55ue[3];
                } else {
                    $Vgpt4we0cx0b = sprintf(
                        '%s.*with data set #%s$',
                        $Virbphhh55ue[1],
                        $Virbphhh55ue[2]
                    );
                }
            } 
            
            
            elseif (preg_match('/^(.*?)@(.+)$/', $Vgpt4we0cx0b, $Virbphhh55ue)) {
                $Vgpt4we0cx0b = sprintf(
                    '%s.*with data set "%s"$',
                    $Virbphhh55ue[1],
                    $Virbphhh55ue[2]
                );
            }

            
            
            $Vgpt4we0cx0b = sprintf('/%s/', str_replace(
                '/',
                '\\/',
                $Vgpt4we0cx0b
            ));
        }

        $this->filter = $Vgpt4we0cx0b;
    }

    
    public function accept()
    {
        $Vpswbntjg3pr = $this->getInnerIterator()->current();

        if ($Vpswbntjg3pr instanceof PHPUnit_Framework_TestSuite) {
            return true;
        }

        $Vvurliuircct = PHPUnit_Util_Test::describe($Vpswbntjg3pr, false);

        if ($Vvurliuircct[0] != '') {
            $Vgpjmw221p0b = implode('::', $Vvurliuircct);
        } else {
            $Vgpjmw221p0b = $Vvurliuircct[1];
        }

        $Vxizayrp4m5q = @preg_match($this->filter, $Vgpjmw221p0b, $Virbphhh55ue);

        if ($Vxizayrp4m5q && isset($this->filterMax)) {
            $V1guocehqkuk      = end($Virbphhh55ue);
            $Vxizayrp4m5q = $V1guocehqkuk >= $this->filterMin && $V1guocehqkuk <= $this->filterMax;
        }

        return $Vxizayrp4m5q;
    }
}
