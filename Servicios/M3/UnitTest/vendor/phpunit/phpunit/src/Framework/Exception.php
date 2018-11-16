<?php



class PHPUnit_Framework_Exception extends RuntimeException implements PHPUnit_Exception
{
    
    protected $Vy1yy1ixxat1;

    public function __construct($Vbl4yrmdan1y = '', $V5kll1klco0v = 0, Exception $Vvnhp4yqbunj = null)
    {
        parent::__construct($Vbl4yrmdan1y, $V5kll1klco0v, $Vvnhp4yqbunj);

        $this->serializableTrace = $this->getTrace();
        foreach ($this->serializableTrace as $Vxja1abp34yq => $V2if5e0ncexa) {
            unset($this->serializableTrace[$Vxja1abp34yq]['args']);
        }
    }

    
    public function getSerializableTrace()
    {
        return $this->serializableTrace;
    }

    
    public function __toString()
    {
        $Ve5tcsso230g = PHPUnit_Framework_TestFailure::exceptionToString($this);

        if ($V1babchxe11h = PHPUnit_Util_Filter::getFilteredStacktrace($this)) {
            $Ve5tcsso230g .= "\n" . $V1babchxe11h;
        }

        return $Ve5tcsso230g;
    }

    public function __sleep()
    {
        return array_keys(get_object_vars($this));
    }
}
