<?php



class PHPUnit_Framework_Constraint_ObjectHasAttribute extends PHPUnit_Framework_Constraint_ClassHasAttribute
{
    
    protected function matches($Vddxcctrvo5d)
    {
        $Vbj3pw2f5egf = new ReflectionObject($Vddxcctrvo5d);

        return $Vbj3pw2f5egf->hasProperty($this->attributeName);
    }
}
