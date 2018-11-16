<?php



class PHP_CodeCoverage_Report_XML_File_Method
{
    
    private $Vqtcub1zcma5;

    public function __construct(DOMElement $Vylnw34ljlp1, $Vgpjmw221p0b)
    {
        $this->contextNode = $Vylnw34ljlp1;

        $this->setName($Vgpjmw221p0b);
    }

    private function setName($Vgpjmw221p0b)
    {
        $this->contextNode->setAttribute('name', $Vgpjmw221p0b);
    }

    public function setSignature($Vrfbtwulwl1z)
    {
        $this->contextNode->setAttribute('signature', $Vrfbtwulwl1z);
    }

    public function setLines($Vtpoxs3gutsc, $Vppalz5j4b4w = null)
    {
        $this->contextNode->setAttribute('start', $Vtpoxs3gutsc);

        if ($Vppalz5j4b4w !== null) {
            $this->contextNode->setAttribute('end', $Vppalz5j4b4w);
        }
    }

    public function setTotals($Vmgoympig51z, $Vez0dzc0mlyc, $Vbt1bqdir3su)
    {
        $this->contextNode->setAttribute('executable', $Vmgoympig51z);
        $this->contextNode->setAttribute('executed', $Vez0dzc0mlyc);
        $this->contextNode->setAttribute('coverage', $Vbt1bqdir3su);
    }

    public function setCrap($V1lej2e3dbqt)
    {
        $this->contextNode->setAttribute('crap', $V1lej2e3dbqt);
    }
}
