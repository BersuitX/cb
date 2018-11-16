<?php



class PHP_CodeCoverage_Report_Node_File extends PHP_CodeCoverage_Report_Node
{
    
    protected $Vquvjmjj3pih;

    
    protected $Vkjxtxkqa4lw;

    
    protected $Vzuy5chseadz = 0;

    
    protected $Vpld0k3vaxvw = 0;

    
    protected $Vcoznk2huoff = array();

    
    protected $Vml1s3yuysul = array();

    
    protected $V1smq0dxjwv1 = array();

    
    protected $Vandnyyo3klq = array();

    
    protected $Vzhzpzvaxv25 = 0;

    
    protected $Vom2z0wj2d1v = 0;

    
    protected $Vvt54wtopojd = null;

    
    protected $Vjd4caseyb3f = null;

    
    protected $V4wggtoib31n = null;

    
    protected $Vz31onmrjxx0 = array();

    
    protected $V2pb1zwsu5fh = array();

    
    protected $Vlbjlgfocnro;

    
    public function __construct($Vgpjmw221p0b, PHP_CodeCoverage_Report_Node $Vz4c1zo3dvrb, array $Vquvjmjj3pih, array $Vkjxtxkqa4lw, $Vlbjlgfocnro)
    {
        if (!is_bool($Vlbjlgfocnro)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
                1,
                'boolean'
            );
        }

        parent::__construct($Vgpjmw221p0b, $Vz4c1zo3dvrb);

        $this->coverageData = $Vquvjmjj3pih;
        $this->testData     = $Vkjxtxkqa4lw;
        $this->cacheTokens  = $Vlbjlgfocnro;

        $this->calculateStatistics();
    }

    
    public function count()
    {
        return 1;
    }

    
    public function getCoverageData()
    {
        return $this->coverageData;
    }

    
    public function getTestData()
    {
        return $this->testData;
    }

    
    public function getClasses()
    {
        return $this->classes;
    }

    
    public function getTraits()
    {
        return $this->traits;
    }

    
    public function getFunctions()
    {
        return $this->functions;
    }

    
    public function getLinesOfCode()
    {
        return $this->linesOfCode;
    }

    
    public function getNumExecutableLines()
    {
        return $this->numExecutableLines;
    }

    
    public function getNumExecutedLines()
    {
        return $this->numExecutedLines;
    }

    
    public function getNumClasses()
    {
        return count($this->classes);
    }

    
    public function getNumTestedClasses()
    {
        return $this->numTestedClasses;
    }

    
    public function getNumTraits()
    {
        return count($this->traits);
    }

    
    public function getNumTestedTraits()
    {
        return $this->numTestedTraits;
    }

    
    public function getNumMethods()
    {
        if ($this->numMethods === null) {
            $this->numMethods = 0;

            foreach ($this->classes as $Vqmu1sajhgfn) {
                foreach ($Vqmu1sajhgfn['methods'] as $Vtlfvdwskdge) {
                    if ($Vtlfvdwskdge['executableLines'] > 0) {
                        $this->numMethods++;
                    }
                }
            }

            foreach ($this->traits as $V1nnncjv3xfc) {
                foreach ($V1nnncjv3xfc['methods'] as $Vtlfvdwskdge) {
                    if ($Vtlfvdwskdge['executableLines'] > 0) {
                        $this->numMethods++;
                    }
                }
            }
        }

        return $this->numMethods;
    }

    
    public function getNumTestedMethods()
    {
        if ($this->numTestedMethods === null) {
            $this->numTestedMethods = 0;

            foreach ($this->classes as $Vqmu1sajhgfn) {
                foreach ($Vqmu1sajhgfn['methods'] as $Vtlfvdwskdge) {
                    if ($Vtlfvdwskdge['executableLines'] > 0 &&
                        $Vtlfvdwskdge['coverage'] == 100) {
                        $this->numTestedMethods++;
                    }
                }
            }

            foreach ($this->traits as $V1nnncjv3xfc) {
                foreach ($V1nnncjv3xfc['methods'] as $Vtlfvdwskdge) {
                    if ($Vtlfvdwskdge['executableLines'] > 0 &&
                        $Vtlfvdwskdge['coverage'] == 100) {
                        $this->numTestedMethods++;
                    }
                }
            }
        }

        return $this->numTestedMethods;
    }

    
    public function getNumFunctions()
    {
        return count($this->functions);
    }

    
    public function getNumTestedFunctions()
    {
        if ($this->numTestedFunctions === null) {
            $this->numTestedFunctions = 0;

            foreach ($this->functions as $Vi5khqarjczp) {
                if ($Vi5khqarjczp['executableLines'] > 0 &&
                    $Vi5khqarjczp['coverage'] == 100) {
                    $this->numTestedFunctions++;
                }
            }
        }

        return $this->numTestedFunctions;
    }

    
    protected function calculateStatistics()
    {
        $Vqmu1sajhgfnStack = $Vi5khqarjczpStack = array();

        if ($this->cacheTokens) {
            $Vthon1suqmsr = PHP_Token_Stream_CachingFactory::get($this->getPath());
        } else {
            $Vthon1suqmsr = new PHP_Token_Stream($this->getPath());
        }

        $this->processClasses($Vthon1suqmsr);
        $this->processTraits($Vthon1suqmsr);
        $this->processFunctions($Vthon1suqmsr);
        $this->linesOfCode = $Vthon1suqmsr->getLinesOfCode();
        unset($Vthon1suqmsr);

        for ($Vft5ytzqy3fl = 1; $Vft5ytzqy3fl <= $this->linesOfCode['loc']; $Vft5ytzqy3fl++) {
            if (isset($this->startLines[$Vft5ytzqy3fl])) {
                
                if (isset($this->startLines[$Vft5ytzqy3fl]['className'])) {
                    if (isset($Vjlj0x4dbbi5)) {
                        $Vqmu1sajhgfnStack[] = &$Vjlj0x4dbbi5;
                    }

                    $Vjlj0x4dbbi5 = &$this->startLines[$Vft5ytzqy3fl];
                } 
                elseif (isset($this->startLines[$Vft5ytzqy3fl]['traitName'])) {
                    $V5cvb1gsgf1h = &$this->startLines[$Vft5ytzqy3fl];
                } 
                elseif (isset($this->startLines[$Vft5ytzqy3fl]['methodName'])) {
                    $V3xt0deppapf = &$this->startLines[$Vft5ytzqy3fl];
                } 
                elseif (isset($this->startLines[$Vft5ytzqy3fl]['functionName'])) {
                    if (isset($V2kjutyau25n)) {
                        $Vi5khqarjczpStack[] = &$V2kjutyau25n;
                    }

                    $V2kjutyau25n = &$this->startLines[$Vft5ytzqy3fl];
                }
            }

            if (isset($this->coverageData[$Vft5ytzqy3fl])) {
                if (isset($Vjlj0x4dbbi5)) {
                    $Vjlj0x4dbbi5['executableLines']++;
                }

                if (isset($V5cvb1gsgf1h)) {
                    $V5cvb1gsgf1h['executableLines']++;
                }

                if (isset($V3xt0deppapf)) {
                    $V3xt0deppapf['executableLines']++;
                }

                if (isset($V2kjutyau25n)) {
                    $V2kjutyau25n['executableLines']++;
                }

                $this->numExecutableLines++;

                if (count($this->coverageData[$Vft5ytzqy3fl]) > 0) {
                    if (isset($Vjlj0x4dbbi5)) {
                        $Vjlj0x4dbbi5['executedLines']++;
                    }

                    if (isset($V5cvb1gsgf1h)) {
                        $V5cvb1gsgf1h['executedLines']++;
                    }

                    if (isset($V3xt0deppapf)) {
                        $V3xt0deppapf['executedLines']++;
                    }

                    if (isset($V2kjutyau25n)) {
                        $V2kjutyau25n['executedLines']++;
                    }

                    $this->numExecutedLines++;
                }
            }

            if (isset($this->endLines[$Vft5ytzqy3fl])) {
                
                if (isset($this->endLines[$Vft5ytzqy3fl]['className'])) {
                    unset($Vjlj0x4dbbi5);

                    if ($Vqmu1sajhgfnStack) {
                        end($Vqmu1sajhgfnStack);
                        $Vlpbz5aloxqt          = key($Vqmu1sajhgfnStack);
                        $Vjlj0x4dbbi5 = &$Vqmu1sajhgfnStack[$Vlpbz5aloxqt];
                        unset($Vqmu1sajhgfnStack[$Vlpbz5aloxqt]);
                    }
                } 
                elseif (isset($this->endLines[$Vft5ytzqy3fl]['traitName'])) {
                    unset($V5cvb1gsgf1h);
                } 
                elseif (isset($this->endLines[$Vft5ytzqy3fl]['methodName'])) {
                    unset($V3xt0deppapf);
                } 
                elseif (isset($this->endLines[$Vft5ytzqy3fl]['functionName'])) {
                    unset($V2kjutyau25n);

                    if ($Vi5khqarjczpStack) {
                        end($Vi5khqarjczpStack);
                        $Vlpbz5aloxqt             = key($Vi5khqarjczpStack);
                        $V2kjutyau25n = &$Vi5khqarjczpStack[$Vlpbz5aloxqt];
                        unset($Vi5khqarjczpStack[$Vlpbz5aloxqt]);
                    }
                }
            }
        }

        foreach ($this->traits as &$V1nnncjv3xfc) {
            foreach ($V1nnncjv3xfc['methods'] as &$Vtlfvdwskdge) {
                if ($Vtlfvdwskdge['executableLines'] > 0) {
                    $Vtlfvdwskdge['coverage'] = ($Vtlfvdwskdge['executedLines'] /
                            $Vtlfvdwskdge['executableLines']) * 100;
                } else {
                    $Vtlfvdwskdge['coverage'] = 100;
                }

                $Vtlfvdwskdge['crap'] = $this->crap(
                    $Vtlfvdwskdge['ccn'],
                    $Vtlfvdwskdge['coverage']
                );

                $V1nnncjv3xfc['ccn'] += $Vtlfvdwskdge['ccn'];
            }

            if ($V1nnncjv3xfc['executableLines'] > 0) {
                $V1nnncjv3xfc['coverage'] = ($V1nnncjv3xfc['executedLines'] /
                        $V1nnncjv3xfc['executableLines']) * 100;
            } else {
                $V1nnncjv3xfc['coverage'] = 100;
            }

            if ($V1nnncjv3xfc['coverage'] == 100) {
                $this->numTestedClasses++;
            }

            $V1nnncjv3xfc['crap'] = $this->crap(
                $V1nnncjv3xfc['ccn'],
                $V1nnncjv3xfc['coverage']
            );
        }

        foreach ($this->classes as &$Vqmu1sajhgfn) {
            foreach ($Vqmu1sajhgfn['methods'] as &$Vtlfvdwskdge) {
                if ($Vtlfvdwskdge['executableLines'] > 0) {
                    $Vtlfvdwskdge['coverage'] = ($Vtlfvdwskdge['executedLines'] /
                            $Vtlfvdwskdge['executableLines']) * 100;
                } else {
                    $Vtlfvdwskdge['coverage'] = 100;
                }

                $Vtlfvdwskdge['crap'] = $this->crap(
                    $Vtlfvdwskdge['ccn'],
                    $Vtlfvdwskdge['coverage']
                );

                $Vqmu1sajhgfn['ccn'] += $Vtlfvdwskdge['ccn'];
            }

            if ($Vqmu1sajhgfn['executableLines'] > 0) {
                $Vqmu1sajhgfn['coverage'] = ($Vqmu1sajhgfn['executedLines'] /
                        $Vqmu1sajhgfn['executableLines']) * 100;
            } else {
                $Vqmu1sajhgfn['coverage'] = 100;
            }

            if ($Vqmu1sajhgfn['coverage'] == 100) {
                $this->numTestedClasses++;
            }

            $Vqmu1sajhgfn['crap'] = $this->crap(
                $Vqmu1sajhgfn['ccn'],
                $Vqmu1sajhgfn['coverage']
            );
        }
    }

    
    protected function processClasses(PHP_Token_Stream $Vthon1suqmsr)
    {
        $Vcoznk2huoff = $Vthon1suqmsr->getClasses();
        unset($Vthon1suqmsr);

        $Vwczhh2w44hn = $this->getId() . '.html#';

        foreach ($Vcoznk2huoff as $Vqmu1sajhgfnName => $Vqmu1sajhgfn) {
            $this->classes[$Vqmu1sajhgfnName] = array(
                'className'       => $Vqmu1sajhgfnName,
                'methods'         => array(),
                'startLine'       => $Vqmu1sajhgfn['startLine'],
                'executableLines' => 0,
                'executedLines'   => 0,
                'ccn'             => 0,
                'coverage'        => 0,
                'crap'            => 0,
                'package'         => $Vqmu1sajhgfn['package'],
                'link'            => $Vwczhh2w44hn . $Vqmu1sajhgfn['startLine']
            );

            $this->startLines[$Vqmu1sajhgfn['startLine']] = &$this->classes[$Vqmu1sajhgfnName];
            $this->endLines[$Vqmu1sajhgfn['endLine']]     = &$this->classes[$Vqmu1sajhgfnName];

            foreach ($Vqmu1sajhgfn['methods'] as $VtlfvdwskdgeName => $Vtlfvdwskdge) {
                $this->classes[$Vqmu1sajhgfnName]['methods'][$VtlfvdwskdgeName] = array(
                    'methodName'      => $VtlfvdwskdgeName,
                    'signature'       => $Vtlfvdwskdge['signature'],
                    'startLine'       => $Vtlfvdwskdge['startLine'],
                    'endLine'         => $Vtlfvdwskdge['endLine'],
                    'executableLines' => 0,
                    'executedLines'   => 0,
                    'ccn'             => $Vtlfvdwskdge['ccn'],
                    'coverage'        => 0,
                    'crap'            => 0,
                    'link'            => $Vwczhh2w44hn . $Vtlfvdwskdge['startLine']
                );

                $this->startLines[$Vtlfvdwskdge['startLine']] = &$this->classes[$Vqmu1sajhgfnName]['methods'][$VtlfvdwskdgeName];
                $this->endLines[$Vtlfvdwskdge['endLine']]     = &$this->classes[$Vqmu1sajhgfnName]['methods'][$VtlfvdwskdgeName];
            }
        }
    }

    
    protected function processTraits(PHP_Token_Stream $Vthon1suqmsr)
    {
        $Vml1s3yuysul = $Vthon1suqmsr->getTraits();
        unset($Vthon1suqmsr);

        $Vwczhh2w44hn = $this->getId() . '.html#';

        foreach ($Vml1s3yuysul as $V1nnncjv3xfcName => $V1nnncjv3xfc) {
            $this->traits[$V1nnncjv3xfcName] = array(
                'traitName'       => $V1nnncjv3xfcName,
                'methods'         => array(),
                'startLine'       => $V1nnncjv3xfc['startLine'],
                'executableLines' => 0,
                'executedLines'   => 0,
                'ccn'             => 0,
                'coverage'        => 0,
                'crap'            => 0,
                'package'         => $V1nnncjv3xfc['package'],
                'link'            => $Vwczhh2w44hn . $V1nnncjv3xfc['startLine']
            );

            $this->startLines[$V1nnncjv3xfc['startLine']] = &$this->traits[$V1nnncjv3xfcName];
            $this->endLines[$V1nnncjv3xfc['endLine']]     = &$this->traits[$V1nnncjv3xfcName];

            foreach ($V1nnncjv3xfc['methods'] as $VtlfvdwskdgeName => $Vtlfvdwskdge) {
                $this->traits[$V1nnncjv3xfcName]['methods'][$VtlfvdwskdgeName] = array(
                    'methodName'      => $VtlfvdwskdgeName,
                    'signature'       => $Vtlfvdwskdge['signature'],
                    'startLine'       => $Vtlfvdwskdge['startLine'],
                    'endLine'         => $Vtlfvdwskdge['endLine'],
                    'executableLines' => 0,
                    'executedLines'   => 0,
                    'ccn'             => $Vtlfvdwskdge['ccn'],
                    'coverage'        => 0,
                    'crap'            => 0,
                    'link'            => $Vwczhh2w44hn . $Vtlfvdwskdge['startLine']
                );

                $this->startLines[$Vtlfvdwskdge['startLine']] = &$this->traits[$V1nnncjv3xfcName]['methods'][$VtlfvdwskdgeName];
                $this->endLines[$Vtlfvdwskdge['endLine']]     = &$this->traits[$V1nnncjv3xfcName]['methods'][$VtlfvdwskdgeName];
            }
        }
    }

    
    protected function processFunctions(PHP_Token_Stream $Vthon1suqmsr)
    {
        $V1smq0dxjwv1 = $Vthon1suqmsr->getFunctions();
        unset($Vthon1suqmsr);

        $Vwczhh2w44hn = $this->getId() . '.html#';

        foreach ($V1smq0dxjwv1 as $Vi5khqarjczpName => $Vi5khqarjczp) {
            $this->functions[$Vi5khqarjczpName] = array(
                'functionName'    => $Vi5khqarjczpName,
                'signature'       => $Vi5khqarjczp['signature'],
                'startLine'       => $Vi5khqarjczp['startLine'],
                'executableLines' => 0,
                'executedLines'   => 0,
                'ccn'             => $Vi5khqarjczp['ccn'],
                'coverage'        => 0,
                'crap'            => 0,
                'link'            => $Vwczhh2w44hn . $Vi5khqarjczp['startLine']
            );

            $this->startLines[$Vi5khqarjczp['startLine']] = &$this->functions[$Vi5khqarjczpName];
            $this->endLines[$Vi5khqarjczp['endLine']]     = &$this->functions[$Vi5khqarjczpName];
        }
    }

    
    protected function crap($V1k1x3e3yr54, $Vbt1bqdir3su)
    {
        if ($Vbt1bqdir3su == 0) {
            return (string) (pow($V1k1x3e3yr54, 2) + $V1k1x3e3yr54);
        }

        if ($Vbt1bqdir3su >= 95) {
            return (string) $V1k1x3e3yr54;
        }

        return sprintf(
            '%01.2F',
            pow($V1k1x3e3yr54, 2) * pow(1 - $Vbt1bqdir3su/100, 3) + $V1k1x3e3yr54
        );
    }
}
