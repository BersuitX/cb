<?php


namespace SebastianBergmann\RecursionContext;


final class Context
{
    
    private $Vjj4niuetmc1;

    
    private $Vzrklfec4ids;

    
    public function __construct()
    {
        $this->arrays  = array();
        $this->objects = new \SplObjectStorage;
    }

    
    public function add(&$Vcptarsq5qe4)
    {
        if (is_array($Vcptarsq5qe4)) {
            return $this->addArray($Vcptarsq5qe4);
        } elseif (is_object($Vcptarsq5qe4)) {
            return $this->addObject($Vcptarsq5qe4);
        }

        throw new InvalidArgumentException(
            'Only arrays and objects are supported'
        );
    }

    
    public function contains(&$Vcptarsq5qe4)
    {
        if (is_array($Vcptarsq5qe4)) {
            return $this->containsArray($Vcptarsq5qe4);
        } elseif (is_object($Vcptarsq5qe4)) {
            return $this->containsObject($Vcptarsq5qe4);
        }

        throw new InvalidArgumentException(
            'Only arrays and objects are supported'
        );
    }

    
    private function addArray(array &$Vvs0hc5bhqj3)
    {
        $Vlpbz5aloxqt = $this->containsArray($Vvs0hc5bhqj3);

        if ($Vlpbz5aloxqt !== false) {
            return $Vlpbz5aloxqt;
        }

        $this->arrays[] = &$Vvs0hc5bhqj3;

        return count($this->arrays) - 1;
    }

    
    private function addObject($Vbj3pw2f5egf)
    {
        if (!$this->objects->contains($Vbj3pw2f5egf)) {
            $this->objects->attach($Vbj3pw2f5egf);
        }

        return spl_object_hash($Vbj3pw2f5egf);
    }

    
    private function containsArray(array &$Vvs0hc5bhqj3)
    {
        $Vlpbz5aloxqts = array_keys($this->arrays, $Vvs0hc5bhqj3, true);
        $Vfrjid4vr3ci = '_Key_' . microtime(true);

        foreach ($Vlpbz5aloxqts as $Vlpbz5aloxqt) {
            $this->arrays[$Vlpbz5aloxqt][$Vfrjid4vr3ci] = $Vfrjid4vr3ci;

            if (isset($Vvs0hc5bhqj3[$Vfrjid4vr3ci]) && $Vvs0hc5bhqj3[$Vfrjid4vr3ci] === $Vfrjid4vr3ci) {
                unset($this->arrays[$Vlpbz5aloxqt][$Vfrjid4vr3ci]);

                return $Vlpbz5aloxqt;
            }

            unset($this->arrays[$Vlpbz5aloxqt][$Vfrjid4vr3ci]);
        }

        return false;
    }

    
    private function containsObject($Vcptarsq5qe4)
    {
        if ($this->objects->contains($Vcptarsq5qe4)) {
            return spl_object_hash($Vcptarsq5qe4);
        }

        return false;
    }
}
