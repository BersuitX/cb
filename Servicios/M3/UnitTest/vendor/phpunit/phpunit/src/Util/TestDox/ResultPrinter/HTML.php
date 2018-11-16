<?php



class PHPUnit_Util_TestDox_ResultPrinter_HTML extends PHPUnit_Util_TestDox_ResultPrinter
{
    
    protected $Vgmnanxojbfn = true;

    
    protected function startRun()
    {
        $this->write('<html><body>');
    }

    
    protected function startClass($Vgpjmw221p0b)
    {
        $this->write(
            '<h2 id="' . $Vgpjmw221p0b . '">' . $this->currentTestClassPrettified .
            '</h2><ul>'
        );
    }

    
    protected function onTest($Vgpjmw221p0b, $V1haejvd0urz = true)
    {
        if (!$V1haejvd0urz) {
            $Vmrxemoep3be  = '<span style="text-decoration:line-through;">';
            $V1yrdh5tqmry = '</span>';
        } else {
            $Vmrxemoep3be  = '';
            $V1yrdh5tqmry = '';
        }

        $this->write('<li>' . $Vmrxemoep3be . $Vgpjmw221p0b . $V1yrdh5tqmry . '</li>');
    }

    
    protected function endClass($Vgpjmw221p0b)
    {
        $this->write('</ul>');
    }

    
    protected function endRun()
    {
        $this->write('</body></html>');
    }
}
