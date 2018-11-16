<?php


namespace SebastianBergmann\GlobalState;

use ReflectionClass;


class Blacklist
{
    
    private $Vyfqsmk1cf1s = array();

    
    private $Vcoznk2huoff = array();

    
    private $Va05xkixtekx = array();

    
    private $Voyolhiiby4r = array();

    
    private $Voahpkaubtr3 = array();

    
    private $V5g41w4jzcol = array();

    
    public function addGlobalVariable($Vksf0mqerbxo)
    {
        $this->globalVariables[$Vksf0mqerbxo] = true;
    }

    
    public function addClass($Vh0iae5cev4i)
    {
        $this->classes[] = $Vh0iae5cev4i;
    }

    
    public function addSubclassesOf($Vh0iae5cev4i)
    {
        $this->parentClasses[] = $Vh0iae5cev4i;
    }

    
    public function addImplementorsOf($Vwvks4chiweg)
    {
        $this->interfaces[] = $Vwvks4chiweg;
    }

    
    public function addClassNamePrefix($Vh0iae5cev4iPrefix)
    {
        $this->classNamePrefixes[] = $Vh0iae5cev4iPrefix;
    }

    
    public function addStaticAttribute($Vh0iae5cev4i, $Vwdqynfrh4s0)
    {
        if (!isset($this->staticAttributes[$Vh0iae5cev4i])) {
            $this->staticAttributes[$Vh0iae5cev4i] = array();
        }

        $this->staticAttributes[$Vh0iae5cev4i][$Vwdqynfrh4s0] = true;
    }

    
    public function isGlobalVariableBlacklisted($Vksf0mqerbxo)
    {
        return isset($this->globalVariables[$Vksf0mqerbxo]);
    }

    
    public function isStaticAttributeBlacklisted($Vh0iae5cev4i, $Vwdqynfrh4s0)
    {
        if (in_array($Vh0iae5cev4i, $this->classes)) {
            return true;
        }

        foreach ($this->classNamePrefixes as $V2hf2uebv5m0) {
            if (strpos($Vh0iae5cev4i, $V2hf2uebv5m0) === 0) {
                return true;
            }
        }

        $Vqmu1sajhgfn = new ReflectionClass($Vh0iae5cev4i);

        foreach ($this->parentClasses as $V31qrja1w0r2) {
            if ($Vqmu1sajhgfn->isSubclassOf($V31qrja1w0r2)) {
                return true;
            }
        }

        foreach ($this->interfaces as $V31qrja1w0r2) {
            if ($Vqmu1sajhgfn->implementsInterface($V31qrja1w0r2)) {
                return true;
            }
        }

        if (isset($this->staticAttributes[$Vh0iae5cev4i][$Vwdqynfrh4s0])) {
            return true;
        }

        return false;
    }
}
