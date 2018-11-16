<?php



class PHPUnit_Framework_Constraint_FileExists extends PHPUnit_Framework_Constraint
{
    
    protected function matches($Vddxcctrvo5d)
    {
        return file_exists($Vddxcctrvo5d);
    }

    
    protected function failureDescription($Vddxcctrvo5d)
    {
        return sprintf(
            'file "%s" exists',
            $Vddxcctrvo5d
        );
    }

    
    public function toString()
    {
        return 'file exists';
    }
}
