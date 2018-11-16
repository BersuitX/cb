<?php



class PHPUnit_Framework_ExpectationFailedException extends PHPUnit_Framework_AssertionFailedError
{
    
    protected $Vu2boav2khfu;

    public function __construct($Vbl4yrmdan1y, SebastianBergmann\Comparator\ComparisonFailure $Vu2boav2khfu = null, Exception $Vvnhp4yqbunj = null)
    {
        $this->comparisonFailure = $Vu2boav2khfu;

        parent::__construct($Vbl4yrmdan1y, 0, $Vvnhp4yqbunj);
    }

    
    public function getComparisonFailure()
    {
        return $this->comparisonFailure;
    }
}
