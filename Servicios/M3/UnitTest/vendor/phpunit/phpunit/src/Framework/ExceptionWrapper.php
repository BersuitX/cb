<?php



class PHPUnit_Framework_ExceptionWrapper extends PHPUnit_Framework_Exception
{
    
    protected $V3ngkdmbo02c;

    
    protected $Vvnhp4yqbunj;

    
    public function __construct($Vpt32vvhspnv)
    {
        
        
        parent::__construct($Vpt32vvhspnv->getMessage(), (int) $Vpt32vvhspnv->getCode());

        $this->classname = get_class($Vpt32vvhspnv);
        $this->file      = $Vpt32vvhspnv->getFile();
        $this->line      = $Vpt32vvhspnv->getLine();

        $this->serializableTrace = $Vpt32vvhspnv->getTrace();

        foreach ($this->serializableTrace as $Vxja1abp34yq => $V2if5e0ncexa) {
            unset($this->serializableTrace[$Vxja1abp34yq]['args']);
        }

        if ($Vpt32vvhspnv->getPrevious()) {
            $this->previous = new self($Vpt32vvhspnv->getPrevious());
        }
    }

    
    public function getClassname()
    {
        return $this->classname;
    }

    
    public function getPreviousWrapped()
    {
        return $this->previous;
    }

    
    public function __toString()
    {
        $Ve5tcsso230g = PHPUnit_Framework_TestFailure::exceptionToString($this);

        if ($V1babchxe11h = PHPUnit_Util_Filter::getFilteredStacktrace($this)) {
            $Ve5tcsso230g .= "\n" . $V1babchxe11h;
        }

        if ($this->previous) {
            $Ve5tcsso230g .= "\nCaused by\n" . $this->previous;
        }

        return $Ve5tcsso230g;
    }
}
