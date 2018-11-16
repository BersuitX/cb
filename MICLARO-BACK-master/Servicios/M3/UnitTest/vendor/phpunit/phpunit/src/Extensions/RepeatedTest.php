<?php



class PHPUnit_Extensions_RepeatedTest extends PHPUnit_Extensions_TestDecorator
{
    
    protected $V5cwyibcyfcs = false;

    
    protected $Vzuu1i24shte = 1;

    
    public function __construct(PHPUnit_Framework_Test $Vpswbntjg3pr, $Vzuu1i24shte = 1, $V5cwyibcyfcs = false)
    {
        parent::__construct($Vpswbntjg3pr);

        if (is_integer($Vzuu1i24shte) &&
            $Vzuu1i24shte >= 0) {
            $this->timesRepeat = $Vzuu1i24shte;
        } else {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                2,
                'positive integer'
            );
        }

        $this->processIsolation = $V5cwyibcyfcs;
    }

    
    public function count()
    {
        return $this->timesRepeat * count($this->test);
    }

    
    public function run(PHPUnit_Framework_TestResult $Vv0hyvhlkjqr = null)
    {
        if ($Vv0hyvhlkjqr === null) {
            $Vv0hyvhlkjqr = $this->createResult();
        }

        
        for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $this->timesRepeat && !$Vv0hyvhlkjqr->shouldStop(); $Vxja1abp34yq++) {
            
            if ($this->test instanceof PHPUnit_Framework_TestSuite) {
                $this->test->setRunTestInSeparateProcess($this->processIsolation);
            }
            $this->test->run($Vv0hyvhlkjqr);
        }

        return $Vv0hyvhlkjqr;
    }
}
