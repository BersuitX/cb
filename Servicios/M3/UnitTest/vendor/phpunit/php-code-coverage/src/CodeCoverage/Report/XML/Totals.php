<?php



class PHP_CodeCoverage_Report_XML_Totals
{
    
    private $Vb1jhtbuqbys;

    
    private $Vflxrh2mmm43;

    
    private $Vdocb5jgiq1n;

    
    private $Vdivlswzgjcp;

    
    private $Vjlyuo01j35v;

    
    private $Vxujukvfxmtx;

    public function __construct(DOMElement $Vb1jhtbuqbys)
    {
        $this->container = $Vb1jhtbuqbys;
        $Veu4emafikgi             = $Vb1jhtbuqbys->ownerDocument;

        $this->linesNode = $Veu4emafikgi->createElementNS(
            'http://schema.phpunit.de/coverage/1.0',
            'lines'
        );

        $this->methodsNode = $Veu4emafikgi->createElementNS(
            'http://schema.phpunit.de/coverage/1.0',
            'methods'
        );

        $this->functionsNode = $Veu4emafikgi->createElementNS(
            'http://schema.phpunit.de/coverage/1.0',
            'functions'
        );

        $this->classesNode = $Veu4emafikgi->createElementNS(
            'http://schema.phpunit.de/coverage/1.0',
            'classes'
        );

        $this->traitsNode = $Veu4emafikgi->createElementNS(
            'http://schema.phpunit.de/coverage/1.0',
            'traits'
        );

        $Vb1jhtbuqbys->appendChild($this->linesNode);
        $Vb1jhtbuqbys->appendChild($this->methodsNode);
        $Vb1jhtbuqbys->appendChild($this->functionsNode);
        $Vb1jhtbuqbys->appendChild($this->classesNode);
        $Vb1jhtbuqbys->appendChild($this->traitsNode);
    }

    public function getContainer()
    {
        return $this->container;
    }

    public function setNumLines($Vzx3dp2agaxb, $Vco0zdsa4yma, $V2tlg2nko5sk, $Vmgoympig51z, $Vez0dzc0mlyc)
    {
        $this->linesNode->setAttribute('total', $Vzx3dp2agaxb);
        $this->linesNode->setAttribute('comments', $Vco0zdsa4yma);
        $this->linesNode->setAttribute('code', $V2tlg2nko5sk);
        $this->linesNode->setAttribute('executable', $Vmgoympig51z);
        $this->linesNode->setAttribute('executed', $Vez0dzc0mlyc);
        $this->linesNode->setAttribute(
            'percent',
            PHP_CodeCoverage_Util::percent($Vez0dzc0mlyc, $Vmgoympig51z, true)
        );
    }

    public function setNumClasses($Vdbkece3gnp5, $Vnzoiv2j1y0v)
    {
        $this->classesNode->setAttribute('count', $Vdbkece3gnp5);
        $this->classesNode->setAttribute('tested', $Vnzoiv2j1y0v);
        $this->classesNode->setAttribute(
            'percent',
            PHP_CodeCoverage_Util::percent($Vnzoiv2j1y0v, $Vdbkece3gnp5, true)
        );
    }

    public function setNumTraits($Vdbkece3gnp5, $Vnzoiv2j1y0v)
    {
        $this->traitsNode->setAttribute('count', $Vdbkece3gnp5);
        $this->traitsNode->setAttribute('tested', $Vnzoiv2j1y0v);
        $this->traitsNode->setAttribute(
            'percent',
            PHP_CodeCoverage_Util::percent($Vnzoiv2j1y0v, $Vdbkece3gnp5, true)
        );
    }

    public function setNumMethods($Vdbkece3gnp5, $Vnzoiv2j1y0v)
    {
        $this->methodsNode->setAttribute('count', $Vdbkece3gnp5);
        $this->methodsNode->setAttribute('tested', $Vnzoiv2j1y0v);
        $this->methodsNode->setAttribute(
            'percent',
            PHP_CodeCoverage_Util::percent($Vnzoiv2j1y0v, $Vdbkece3gnp5, true)
        );
    }

    public function setNumFunctions($Vdbkece3gnp5, $Vnzoiv2j1y0v)
    {
        $this->functionsNode->setAttribute('count', $Vdbkece3gnp5);
        $this->functionsNode->setAttribute('tested', $Vnzoiv2j1y0v);
        $this->functionsNode->setAttribute(
            'percent',
            PHP_CodeCoverage_Util::percent($Vnzoiv2j1y0v, $Vdbkece3gnp5, true)
        );
    }
}
