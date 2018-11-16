<?php



class PHPUnit_Framework_Constraint_ClassHasStaticAttribute extends PHPUnit_Framework_Constraint_ClassHasAttribute
{
    
    protected function matches($Vddxcctrvo5d)
    {
        $Vqmu1sajhgfn = new ReflectionClass($Vddxcctrvo5d);

        if ($Vqmu1sajhgfn->hasProperty($this->attributeName)) {
            $Vxw4jdz2m4w0 = $Vqmu1sajhgfn->getProperty($this->attributeName);

            return $Vxw4jdz2m4w0->isStatic();
        } else {
            return false;
        }
    }

    
    public function toString()
    {
        return sprintf(
            'has static attribute "%s"',
            $this->attributeName
        );
    }
}
