<?php



class PHP_CodeCoverage_Report_XML_Tests
{
    private $Vqtcub1zcma5;

    private $V51f1ewxfx1g = array(
        0 => 'PASSED',     
        1 => 'SKIPPED',    
        2 => 'INCOMPLETE', 
        3 => 'FAILURE',    
        4 => 'ERROR',      
        5 => 'RISKY'       
    );

    public function __construct(DOMElement $Vylnw34ljlp1)
    {
        $this->contextNode = $Vylnw34ljlp1;
    }

    public function addTest($Vpswbntjg3pr, array $Vv0hyvhlkjqr)
    {
        $Vpbrymo1kvdk = $this->contextNode->appendChild(
            $this->contextNode->ownerDocument->createElementNS(
                'http://schema.phpunit.de/coverage/1.0',
                'test'
            )
        );
        $Vpbrymo1kvdk->setAttribute('name', $Vpswbntjg3pr);
        $Vpbrymo1kvdk->setAttribute('size', $Vv0hyvhlkjqr['size']);
        $Vpbrymo1kvdk->setAttribute('result', (int) $Vv0hyvhlkjqr['status']);
        $Vpbrymo1kvdk->setAttribute('status', $this->codeMap[(int) $Vv0hyvhlkjqr['status']]);
    }
}
