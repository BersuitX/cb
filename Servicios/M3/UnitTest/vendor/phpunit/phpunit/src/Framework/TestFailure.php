<?php



class PHPUnit_Framework_TestFailure
{
    
    private $Valtmuj0conq;

    
    protected $Vefbtmepbgga;

    
    protected $Visnwbywk535;

    
    public function __construct(PHPUnit_Framework_Test $Vefbtmepbgga, Exception $Visnwbywk535)
    {
        if ($Vefbtmepbgga instanceof PHPUnit_Framework_SelfDescribing) {
            $this->testName = $Vefbtmepbgga->toString();
        } else {
            $this->testName = get_class($Vefbtmepbgga);
        }
        if (!$Vefbtmepbgga instanceof PHPUnit_Framework_TestCase || !$Vefbtmepbgga->isInIsolation()) {
            $this->failedTest = $Vefbtmepbgga;
        }
        $this->thrownException = $Visnwbywk535;
    }

    
    public function toString()
    {
        return sprintf(
            '%s: %s',
            $this->testName,
            $this->thrownException->getMessage()
        );
    }

    
    public function getExceptionAsString()
    {
        return self::exceptionToString($this->thrownException);
    }

    
    public static function exceptionToString(Exception $Vpt32vvhspnv)
    {
        if ($Vpt32vvhspnv instanceof PHPUnit_Framework_SelfDescribing) {
            $Vd3322ljwbqh = $Vpt32vvhspnv->toString();

            if ($Vpt32vvhspnv instanceof PHPUnit_Framework_ExpectationFailedException && $Vpt32vvhspnv->getComparisonFailure()) {
                $Vd3322ljwbqh = $Vd3322ljwbqh . $Vpt32vvhspnv->getComparisonFailure()->getDiff();
            }

            if (!empty($Vd3322ljwbqh)) {
                $Vd3322ljwbqh = trim($Vd3322ljwbqh) . "\n";
            }
        } elseif ($Vpt32vvhspnv instanceof PHPUnit_Framework_Error) {
            $Vd3322ljwbqh = $Vpt32vvhspnv->getMessage() . "\n";
        } elseif ($Vpt32vvhspnv instanceof PHPUnit_Framework_ExceptionWrapper) {
            $Vd3322ljwbqh = $Vpt32vvhspnv->getClassname() . ': ' . $Vpt32vvhspnv->getMessage() . "\n";
        } else {
            $Vd3322ljwbqh = get_class($Vpt32vvhspnv) . ': ' . $Vpt32vvhspnv->getMessage() . "\n";
        }

        return $Vd3322ljwbqh;
    }

    
    public function getTestName()
    {
        return $this->testName;
    }

    
    public function failedTest()
    {
        return $this->failedTest;
    }

    
    public function thrownException()
    {
        return $this->thrownException;
    }

    
    public function exceptionMessage()
    {
        return $this->thrownException()->getMessage();
    }

    
    public function isFailure()
    {
        return ($this->thrownException() instanceof PHPUnit_Framework_AssertionFailedError);
    }
}
