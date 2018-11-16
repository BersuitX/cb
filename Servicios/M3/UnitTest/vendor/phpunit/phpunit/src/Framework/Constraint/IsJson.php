<?php



class PHPUnit_Framework_Constraint_IsJson extends PHPUnit_Framework_Constraint
{
    
    protected function matches($Vddxcctrvo5d)
    {
        json_decode($Vddxcctrvo5d);
        if (json_last_error()) {
            return false;
        }

        return true;
    }

    
    protected function failureDescription($Vddxcctrvo5d)
    {
        json_decode($Vddxcctrvo5d);
        $Vpsm42ro4mkq = PHPUnit_Framework_Constraint_JsonMatches_ErrorMessageProvider::determineJsonError(
            json_last_error()
        );

        return sprintf(
            '%s is valid JSON (%s)',
            $this->exporter->shortenedExport($Vddxcctrvo5d),
            $Vpsm42ro4mkq
        );
    }

    
    public function toString()
    {
        return 'is valid JSON';
    }
}
