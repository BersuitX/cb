<?php



class PHP_CodeCoverage_Report_XML_Project extends PHP_CodeCoverage_Report_XML_Node
{
    public function __construct($Vgpjmw221p0b)
    {
        $this->init();
        $this->setProjectName($Vgpjmw221p0b);
    }

    private function init()
    {
        $Veu4emafikgi = new DOMDocument;
        $Veu4emafikgi->loadXML('<?xml version="1.0" ?><phpunit xmlns="http://schema.phpunit.de/coverage/1.0"><project/></phpunit>');

        $this->setContextNode(
            $Veu4emafikgi->getElementsByTagNameNS(
                'http://schema.phpunit.de/coverage/1.0',
                'project'
            )->item(0)
        );
    }

    private function setProjectName($Vgpjmw221p0b)
    {
        $this->getContextNode()->setAttribute('name', $Vgpjmw221p0b);
    }

    public function getTests()
    {
        $V5e2ibqko4vo = $this->getContextNode()->getElementsByTagNameNS(
            'http://schema.phpunit.de/coverage/1.0',
            'tests'
        )->item(0);

        if (!$V5e2ibqko4vo) {
            $V5e2ibqko4vo = $this->getContextNode()->appendChild(
                $this->getDom()->createElementNS(
                    'http://schema.phpunit.de/coverage/1.0',
                    'tests'
                )
            );
        }

        return new PHP_CodeCoverage_Report_XML_Tests($V5e2ibqko4vo);
    }

    public function asDom()
    {
        return $this->getDom();
    }
}
