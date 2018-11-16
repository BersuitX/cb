<?php



class PHP_CodeCoverage_Report_XML_File_Report extends PHP_CodeCoverage_Report_XML_File
{
    public function __construct($Vgpjmw221p0b)
    {
        $this->dom = new DOMDocument;
        $this->dom->loadXML('<?xml version="1.0" ?><phpunit xmlns="http://schema.phpunit.de/coverage/1.0"><file /></phpunit>');

        $this->contextNode = $this->dom->getElementsByTagNameNS(
            'http://schema.phpunit.de/coverage/1.0',
            'file'
        )->item(0);

        $this->setName($Vgpjmw221p0b);
    }

    private function setName($Vgpjmw221p0b)
    {
        $this->contextNode->setAttribute('name', $Vgpjmw221p0b);
    }

    public function asDom()
    {
        return $this->dom;
    }

    public function getFunctionObject($Vgpjmw221p0b)
    {
        $Vpbrymo1kvdk = $this->contextNode->appendChild(
            $this->dom->createElementNS(
                'http://schema.phpunit.de/coverage/1.0',
                'function'
            )
        );

        return new PHP_CodeCoverage_Report_XML_File_Method($Vpbrymo1kvdk, $Vgpjmw221p0b);
    }

    public function getClassObject($Vgpjmw221p0b)
    {
        return $this->getUnitObject('class', $Vgpjmw221p0b);
    }

    public function getTraitObject($Vgpjmw221p0b)
    {
        return $this->getUnitObject('trait', $Vgpjmw221p0b);
    }

    private function getUnitObject($Vmjfipxuy55p, $Vgpjmw221p0b)
    {
        $Vpbrymo1kvdk = $this->contextNode->appendChild(
            $this->dom->createElementNS(
                'http://schema.phpunit.de/coverage/1.0',
                $Vmjfipxuy55p
            )
        );

        return new PHP_CodeCoverage_Report_XML_File_Unit($Vpbrymo1kvdk, $Vgpjmw221p0b);
    }
}
