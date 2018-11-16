<?php



class PHP_CodeCoverage_Report_XML
{
    
    private $Vec3c2fwpbib;

    
    private $V43ee3vldohf;

    public function process(PHP_CodeCoverage $Vbt1bqdir3su, $Vec3c2fwpbib)
    {
        if (substr($Vec3c2fwpbib, -1, 1) != DIRECTORY_SEPARATOR) {
            $Vec3c2fwpbib .= DIRECTORY_SEPARATOR;
        }

        $this->target = $Vec3c2fwpbib;
        $this->initTargetDirectory($Vec3c2fwpbib);

        $Vem32crslzoa = $Vbt1bqdir3su->getReport();

        $this->project = new PHP_CodeCoverage_Report_XML_Project(
            $Vbt1bqdir3su->getReport()->getName()
        );

        $this->processTests($Vbt1bqdir3su->getTests());
        $this->processDirectory($Vem32crslzoa, $this->project);

        $Vojnsu0ourck                     = $this->project->asDom();
        $Vojnsu0ourck->formatOutput       = true;
        $Vojnsu0ourck->preserveWhiteSpace = false;
        $Vojnsu0ourck->save($Vec3c2fwpbib . '/index.xml');
    }

    private function initTargetDirectory($Vb3iift025ov)
    {
        if (file_exists($Vb3iift025ov)) {
            if (!is_dir($Vb3iift025ov)) {
                throw new PHP_CodeCoverage_Exception(
                    "'$Vb3iift025ov' exists but is not a directory."
                );
            }

            if (!is_writable($Vb3iift025ov)) {
                throw new PHP_CodeCoverage_Exception(
                    "'$Vb3iift025ov' exists but is not writable."
                );
            }
        } elseif (!@mkdir($Vb3iift025ov, 0777, true)) {
            throw new PHP_CodeCoverage_Exception(
                "'$Vb3iift025ov' could not be created."
            );
        }
    }

    private function processDirectory(PHP_CodeCoverage_Report_Node_Directory $Vb3iift025ovectory, PHP_CodeCoverage_Report_XML_Node $Vylnw34ljlp1)
    {
        $Vb3iift025ovObject = $Vylnw34ljlp1->addDirectory($Vb3iift025ovectory->getName());

        $this->setTotals($Vb3iift025ovectory, $Vb3iift025ovObject->getTotals());

        foreach ($Vb3iift025ovectory as $Vpbrymo1kvdk) {
            if ($Vpbrymo1kvdk instanceof PHP_CodeCoverage_Report_Node_Directory) {
                $this->processDirectory($Vpbrymo1kvdk, $Vb3iift025ovObject);
                continue;
            }

            if ($Vpbrymo1kvdk instanceof PHP_CodeCoverage_Report_Node_File) {
                $this->processFile($Vpbrymo1kvdk, $Vb3iift025ovObject);
                continue;
            }

            throw new PHP_CodeCoverage_Exception(
                'Unknown node type for XML report'
            );
        }
    }

    private function processFile(PHP_CodeCoverage_Report_Node_File $Vpu3xl4uhgg5, PHP_CodeCoverage_Report_XML_Directory $Vylnw34ljlp1)
    {
        $Vpu3xl4uhgg5Object = $Vylnw34ljlp1->addFile(
            $Vpu3xl4uhgg5->getName(),
            $Vpu3xl4uhgg5->getId() . '.xml'
        );

        $this->setTotals($Vpu3xl4uhgg5, $Vpu3xl4uhgg5Object->getTotals());

        $Vpu3xl4uhgg5Report = new PHP_CodeCoverage_Report_XML_File_Report(
            $Vpu3xl4uhgg5->getName()
        );

        $this->setTotals($Vpu3xl4uhgg5, $Vpu3xl4uhgg5Report->getTotals());

        foreach ($Vpu3xl4uhgg5->getClassesAndTraits() as $Vt00otk43ld4) {
            $this->processUnit($Vt00otk43ld4, $Vpu3xl4uhgg5Report);
        }

        foreach ($Vpu3xl4uhgg5->getFunctions() as $Vi5khqarjczp) {
            $this->processFunction($Vi5khqarjczp, $Vpu3xl4uhgg5Report);
        }

        foreach ($Vpu3xl4uhgg5->getCoverageData() as $Vrwsmtja4f2j => $Vo50qpjpkko3) {
            if (!is_array($Vo50qpjpkko3) || count($Vo50qpjpkko3) == 0) {
                continue;
            }

            $Vbt1bqdir3su = $Vpu3xl4uhgg5Report->getLineCoverage($Vrwsmtja4f2j);

            foreach ($Vo50qpjpkko3 as $Vpswbntjg3pr) {
                $Vbt1bqdir3su->addTest($Vpswbntjg3pr);
            }

            $Vbt1bqdir3su->finalize();
        }

        $this->initTargetDirectory(
            $this->target . dirname($Vpu3xl4uhgg5->getId()) . '/'
        );

        $Vpu3xl4uhgg5Dom                     = $Vpu3xl4uhgg5Report->asDom();
        $Vpu3xl4uhgg5Dom->formatOutput       = true;
        $Vpu3xl4uhgg5Dom->preserveWhiteSpace = false;
        $Vpu3xl4uhgg5Dom->save($this->target . $Vpu3xl4uhgg5->getId() . '.xml');
    }

    private function processUnit($Vt00otk43ld4, PHP_CodeCoverage_Report_XML_File_Report $Vem32crslzoa)
    {
        if (isset($Vt00otk43ld4['className'])) {
            $Vt00otk43ld4Object = $Vem32crslzoa->getClassObject($Vt00otk43ld4['className']);
        } else {
            $Vt00otk43ld4Object = $Vem32crslzoa->getTraitObject($Vt00otk43ld4['traitName']);
        }

        $Vt00otk43ld4Object->setLines(
            $Vt00otk43ld4['startLine'],
            $Vt00otk43ld4['executableLines'],
            $Vt00otk43ld4['executedLines']
        );

        $Vt00otk43ld4Object->setCrap($Vt00otk43ld4['crap']);

        $Vt00otk43ld4Object->setPackage(
            $Vt00otk43ld4['package']['fullPackage'],
            $Vt00otk43ld4['package']['package'],
            $Vt00otk43ld4['package']['subpackage'],
            $Vt00otk43ld4['package']['category']
        );

        $Vt00otk43ld4Object->setNamespace($Vt00otk43ld4['package']['namespace']);

        foreach ($Vt00otk43ld4['methods'] as $Vtlfvdwskdge) {
            $VtlfvdwskdgeObject = $Vt00otk43ld4Object->addMethod($Vtlfvdwskdge['methodName']);
            $VtlfvdwskdgeObject->setSignature($Vtlfvdwskdge['signature']);
            $VtlfvdwskdgeObject->setLines($Vtlfvdwskdge['startLine'], $Vtlfvdwskdge['endLine']);
            $VtlfvdwskdgeObject->setCrap($Vtlfvdwskdge['crap']);
            $VtlfvdwskdgeObject->setTotals(
                $Vtlfvdwskdge['executableLines'],
                $Vtlfvdwskdge['executedLines'],
                $Vtlfvdwskdge['coverage']
            );
        }
    }

    private function processFunction($Vi5khqarjczp, PHP_CodeCoverage_Report_XML_File_Report $Vem32crslzoa)
    {
        $Vi5khqarjczpObject = $Vem32crslzoa->getFunctionObject($Vi5khqarjczp['functionName']);

        $Vi5khqarjczpObject->setSignature($Vi5khqarjczp['signature']);
        $Vi5khqarjczpObject->setLines($Vi5khqarjczp['startLine']);
        $Vi5khqarjczpObject->setCrap($Vi5khqarjczp['crap']);
        $Vi5khqarjczpObject->setTotals($Vi5khqarjczp['executableLines'], $Vi5khqarjczp['executedLines'], $Vi5khqarjczp['coverage']);
    }

    private function processTests(array $Vo50qpjpkko3)
    {
        $Vo50qpjpkko3Object = $this->project->getTests();

        foreach ($Vo50qpjpkko3 as $Vpswbntjg3pr => $Vv0hyvhlkjqr) {
            if ($Vpswbntjg3pr == 'UNCOVERED_FILES_FROM_WHITELIST') {
                continue;
            }

            $Vo50qpjpkko3Object->addTest($Vpswbntjg3pr, $Vv0hyvhlkjqr);
        }
    }

    private function setTotals(PHP_CodeCoverage_Report_Node $Vpbrymo1kvdk, PHP_CodeCoverage_Report_XML_Totals $V2yvizkdl5os)
    {
        $Vzx3dp2agaxb = $Vpbrymo1kvdk->getLinesOfCode();

        $V2yvizkdl5os->setNumLines(
            $Vzx3dp2agaxb['loc'],
            $Vzx3dp2agaxb['cloc'],
            $Vzx3dp2agaxb['ncloc'],
            $Vpbrymo1kvdk->getNumExecutableLines(),
            $Vpbrymo1kvdk->getNumExecutedLines()
        );

        $V2yvizkdl5os->setNumClasses(
            $Vpbrymo1kvdk->getNumClasses(),
            $Vpbrymo1kvdk->getNumTestedClasses()
        );

        $V2yvizkdl5os->setNumTraits(
            $Vpbrymo1kvdk->getNumTraits(),
            $Vpbrymo1kvdk->getNumTestedTraits()
        );

        $V2yvizkdl5os->setNumMethods(
            $Vpbrymo1kvdk->getNumMethods(),
            $Vpbrymo1kvdk->getNumTestedMethods()
        );

        $V2yvizkdl5os->setNumFunctions(
            $Vpbrymo1kvdk->getNumFunctions(),
            $Vpbrymo1kvdk->getNumTestedFunctions()
        );
    }
}
