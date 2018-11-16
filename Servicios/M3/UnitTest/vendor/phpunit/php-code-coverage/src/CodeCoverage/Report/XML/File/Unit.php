<?php



class PHP_CodeCoverage_Report_XML_File_Unit
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

    public function setLines($Vtpoxs3gutsc, $Vmgoympig51z, $Vez0dzc0mlyc)
    {
        $this->contextNode->setAttribute('start', $Vtpoxs3gutsc);
        $this->contextNode->setAttribute('executable', $Vmgoympig51z);
        $this->contextNode->setAttribute('executed', $Vez0dzc0mlyc);
    }

    public function setCrap($V1lej2e3dbqt)
    {
        $this->contextNode->setAttribute('crap', $V1lej2e3dbqt);
    }

    public function setPackage($V3nqimyyibix, $Vhtagczfnncx, $Vonrk21gsfbb, $Vya5mg3c0osr)
    {
        $Vpbrymo1kvdk = $this->contextNode->getElementsByTagNameNS(
            'http://schema.phpunit.de/coverage/1.0',
            'package'
        )->item(0);

        if (!$Vpbrymo1kvdk) {
            $Vpbrymo1kvdk = $this->contextNode->appendChild(
                $this->contextNode->ownerDocument->createElementNS(
                    'http://schema.phpunit.de/coverage/1.0',
                    'package'
                )
            );
        }

        $Vpbrymo1kvdk->setAttribute('full', $V3nqimyyibix);
        $Vpbrymo1kvdk->setAttribute('name', $Vhtagczfnncx);
        $Vpbrymo1kvdk->setAttribute('sub', $Vonrk21gsfbb);
        $Vpbrymo1kvdk->setAttribute('category', $Vya5mg3c0osr);
    }

    public function setNamespace($Vgpjmw221p0bspace)
    {
        $Vpbrymo1kvdk = $this->contextNode->getElementsByTagNameNS(
            'http://schema.phpunit.de/coverage/1.0',
            'namespace'
        )->item(0);

        if (!$Vpbrymo1kvdk) {
            $Vpbrymo1kvdk = $this->contextNode->appendChild(
                $this->contextNode->ownerDocument->createElementNS(
                    'http://schema.phpunit.de/coverage/1.0',
                    'namespace'
                )
            );
        }

        $Vpbrymo1kvdk->setAttribute('name', $Vgpjmw221p0bspace);
    }

    public function addMethod($Vgpjmw221p0b)
    {
        $Vpbrymo1kvdk = $this->contextNode->appendChild(
            $this->contextNode->ownerDocument->createElementNS(
                'http://schema.phpunit.de/coverage/1.0',
                'method'
            )
        );

        return new PHP_CodeCoverage_Report_XML_File_Method($Vpbrymo1kvdk, $Vgpjmw221p0b);
    }
}
