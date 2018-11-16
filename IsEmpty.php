<?php



class PHPUnit_Framework_Constraint_IsEmpty extends PHPUnit_Framework_Constraint
{
    
    protected function matches($Vddxcctrvo5d)
    {
        if ($Vddxcctrvo5d instanceof Countable) {
            return count($Vddxcctrvo5d) === 0;
        }

        return empty($Vddxcctrvo5d);
    }

    
    public function toString()
    {
        return 'is empty';
    }

    
    protected function failureDescription($Vddxcctrvo5d)
    {
        $V31qrja1w0r2 = gettype($Vddxcctrvo5d);

        return sprintf(
            '%s %s %s',
            $V31qrja1w0r2[0] == 'a' || $V31qrja1w0r2[0] == 'o' ? 'an' : 'a',
            $V31qrja1w0r2,
            $this->toString()
        );
    }
}
