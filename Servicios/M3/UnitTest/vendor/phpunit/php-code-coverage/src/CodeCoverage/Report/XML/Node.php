<?php



class PHP_CodeCoverage_Report_XML_Node
{
    
    private $Veu4emafikgi;

    
    private $Vqtcub1zcma5;

    public function __construct(DOMElement $Vylnw34ljlp1)
    {
        $this->setContextNode($Vylnw34ljlp1);
    }

    protected function setContextNode(DOMElement $Vylnw34ljlp1)
    {
        $this->dom         = $Vylnw34ljlp1->ownerDocument;
        $this->contextNode = $Vylnw34ljlp1;
    }

    public function getDom()
    {
        return $this->dom;
    }

    protected function getContextNode()
    {
        return $this->contextNode;
    }

    public function getTotals()
    {
        $V24vmwhp11qa = $this->getContextNode()->firstChild;

        if (!$V24vmwhp11qa) {
            $V24vmwhp11qa = $this->getContextNode()->appendChild(
                $this->dom->createElementNS(
                    'http://schema.phpunit.de/coverage/1.0',
                    'totals'
                )
            );
        }

        return new PHP_CodeCoverage_Report_XML_Totals($V24vmwhp11qa);
    }

    public function addDirectory($Vgpjmw221p0b)
    {
        $Vciqgjc1lehh = $this->getDom()->createElementNS(
            'http://schema.phpunit.de/coverage/1.0',
            'directory'
        );

        $Vciqgjc1lehh->setAttribute('name', $Vgpjmw221p0b);
        $this->getContextNode()->appendChild($Vciqgjc1lehh);

        return new PHP_CodeCoverage_Report_XML_Directory($Vciqgjc1lehh);
    }

    public function addFile($Vgpjmw221p0b, $V2mn4gj4bo24)
    {
        $Vgr1lupecb3f = $this->getDom()->createElementNS(
            'http://schema.phpunit.de/coverage/1.0',
            'file'
        );

        $Vgr1lupecb3f->setAttribute('name', $Vgpjmw221p0b);
        $Vgr1lupecb3f->setAttribute('href', $V2mn4gj4bo24);
        $this->getContextNode()->appendChild($Vgr1lupecb3f);

        return new PHP_CodeCoverage_Report_XML_File($Vgr1lupecb3f);
    }
}
