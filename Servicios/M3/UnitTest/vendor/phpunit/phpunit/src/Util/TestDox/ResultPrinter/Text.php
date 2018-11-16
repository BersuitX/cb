<?php



class PHPUnit_Util_TestDox_ResultPrinter_Text extends PHPUnit_Util_TestDox_ResultPrinter
{
    
    protected function startClass($Vgpjmw221p0b)
    {
        $this->write($this->currentTestClassPrettified . "\n");
    }

    
    protected function onTest($Vgpjmw221p0b, $V1haejvd0urz = true)
    {
        if ($V1haejvd0urz) {
            $this->write(' [x] ');
        } else {
            $this->write(' [ ] ');
        }

        $this->write($Vgpjmw221p0b . "\n");
    }

    
    protected function endClass($Vgpjmw221p0b)
    {
        $this->write("\n");
    }
}
