<?php



class PHP_CodeCoverage_Report_XML_File_Coverage
{
    
    private $Vjp01nlr1dqs;

    
    private $Vqtcub1zcma5;

    
    private $Vua3jp5zxf5r = false;

    public function __construct(DOMElement $Vylnw34ljlp1, $Vrwsmtja4f2j)
    {
        $this->contextNode = $Vylnw34ljlp1;

        $this->writer = new XMLWriter();
        $this->writer->openMemory();
        $this->writer->startElementNs(null, $Vylnw34ljlp1->nodeName, 'http://schema.phpunit.de/coverage/1.0');
        $this->writer->writeAttribute('nr', $Vrwsmtja4f2j);
    }

    public function addTest($Vpswbntjg3pr)
    {
        if ($this->finalized) {
            throw new PHP_CodeCoverage_Exception('Coverage Report already finalized');
        }

        $this->writer->startElement('covered');
        $this->writer->writeAttribute('by', $Vpswbntjg3pr);
        $this->writer->endElement();
    }

    public function finalize()
    {
        $this->writer->endElement();

        $Vzmx43dmvjzn = $this->contextNode->ownerDocument->createDocumentFragment();
        $Vzmx43dmvjzn->appendXML($this->writer->outputMemory());

        $this->contextNode->parentNode->replaceChild(
            $Vzmx43dmvjzn,
            $this->contextNode
        );

        $this->finalized = true;
    }
}
