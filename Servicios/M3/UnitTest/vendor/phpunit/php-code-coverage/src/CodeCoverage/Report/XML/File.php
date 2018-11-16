<?php



class PHP_CodeCoverage_Report_XML_File
{
    
    protected $Veu4emafikgi;

    
    protected $Vqtcub1zcma5;

    public function __construct(DOMElement $Vylnw34ljlp1)
    {
        $this->dom         = $Vylnw34ljlp1->ownerDocument;
        $this->contextNode = $Vylnw34ljlp1;
    }

    public function getTotals()
    {
        $V24vmwhp11qa = $this->contextNode->firstChild;

        if (!$V24vmwhp11qa) {
            $V24vmwhp11qa = $this->contextNode->appendChild(
                $this->dom->createElementNS(
                    'http://schema.phpunit.de/coverage/1.0',
                    'totals'
                )
            );
        }

        return new PHP_CodeCoverage_Report_XML_Totals($V24vmwhp11qa);
    }

    public function getLineCoverage($Vrwsmtja4f2j)
    {
        $Vbt1bqdir3su = $this->contextNode->getElementsByTagNameNS(
            'http://schema.phpunit.de/coverage/1.0',
            'coverage'
        )->item(0);

        if (!$Vbt1bqdir3su) {
            $Vbt1bqdir3su = $this->contextNode->appendChild(
                $this->dom->createElementNS(
                    'http://schema.phpunit.de/coverage/1.0',
                    'coverage'
                )
            );
        }

        $Vrwsmtja4f2jNode = $Vbt1bqdir3su->appendChild(
            $this->dom->createElementNS(
                'http://schema.phpunit.de/coverage/1.0',
                'line'
            )
        );

        return new PHP_CodeCoverage_Report_XML_File_Coverage($Vrwsmtja4f2jNode, $Vrwsmtja4f2j);
    }
}
