<?php


use SebastianBergmann\Environment\Runtime;


class PHP_CodeCoverage
{
    
    private $Vry5a2jsvmlw;

    
    private $Vgpt4we0cx0b;

    
    private $Vlbjlgfocnro = false;

    
    private $Vdlsqvmwvpyg = false;

    
    private $V023bttuuzz5 = false;

    
    private $Vjl1brythiz0 = false;

    
    private $Vdboy4jhxvl2 = true;

    
    private $V2n1khqlsel1 = false;

    
    private $V4yomkrpwo42;

    
    private $Vqhzkfsafzrc = array();

    
    private $Vxhyjjyap2bu = array();

    
    private $V3bkg2wnmtkt = false;

    
    private $Vo50qpjpkko3 = array();

    
    public function __construct(PHP_CodeCoverage_Driver $Vry5a2jsvmlw = null, PHP_CodeCoverage_Filter $Vgpt4we0cx0b = null)
    {
        if ($Vry5a2jsvmlw === null) {
            $Vry5a2jsvmlw = $this->selectDriver();
        }

        if ($Vgpt4we0cx0b === null) {
            $Vgpt4we0cx0b = new PHP_CodeCoverage_Filter;
        }

        $this->driver = $Vry5a2jsvmlw;
        $this->filter = $Vgpt4we0cx0b;
    }

    
    public function getReport()
    {
        $Vdnxqjiaf0hs = new PHP_CodeCoverage_Report_Factory;

        return $Vdnxqjiaf0hs->create($this);
    }

    
    public function clear()
    {
        $this->currentId = null;
        $this->data      = array();
        $this->tests     = array();
    }

    
    public function filter()
    {
        return $this->filter;
    }

    
    public function getData($V0tqxrkqznqp = false)
    {
        if (!$V0tqxrkqznqp && $this->addUncoveredFilesFromWhitelist) {
            $this->addUncoveredFilesFromWhitelist();
        }

        
        
        if (!$V0tqxrkqznqp && !$this->filter->hasWhitelist()) {
            $this->applyListsFilter($this->data);
        }

        return $this->data;
    }

    
    public function setData(array $Vqhzkfsafzrc)
    {
        $this->data = $Vqhzkfsafzrc;
    }

    
    public function getTests()
    {
        return $this->tests;
    }

    
    public function setTests(array $Vo50qpjpkko3)
    {
        $this->tests = $Vo50qpjpkko3;
    }

    
    public function start($V4mdxaz2cfcr, $Viotohtytgvi = false)
    {
        if (!is_bool($Viotohtytgvi)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
                1,
                'boolean'
            );
        }

        if ($Viotohtytgvi) {
            $this->clear();
        }

        $this->currentId = $V4mdxaz2cfcr;

        $this->driver->start();
    }

    
    public function stop($Vjznpzrwkw3n = true, $V34rdprczie1 = array(), array $Vws0vthwrneb = array())
    {
        if (!is_bool($Vjznpzrwkw3n)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
                1,
                'boolean'
            );
        }

        if (!is_array($V34rdprczie1) && $V34rdprczie1 !== false) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
                2,
                'array or false'
            );
        }

        $Vqhzkfsafzrc = $this->driver->stop();
        $this->append($Vqhzkfsafzrc, null, $Vjznpzrwkw3n, $V34rdprczie1, $Vws0vthwrneb);

        $this->currentId = null;

        return $Vqhzkfsafzrc;
    }

    
    public function append(array $Vqhzkfsafzrc, $V4mdxaz2cfcr = null, $Vjznpzrwkw3n = true, $V34rdprczie1 = array(), array $Vws0vthwrneb = array())
    {
        if ($V4mdxaz2cfcr === null) {
            $V4mdxaz2cfcr = $this->currentId;
        }

        if ($V4mdxaz2cfcr === null) {
            throw new PHP_CodeCoverage_Exception;
        }

        $this->applyListsFilter($Vqhzkfsafzrc);
        $this->applyIgnoredLinesFilter($Vqhzkfsafzrc);
        $this->initializeFilesThatAreSeenTheFirstTime($Vqhzkfsafzrc);

        if (!$Vjznpzrwkw3n) {
            return;
        }

        if ($V4mdxaz2cfcr != 'UNCOVERED_FILES_FROM_WHITELIST') {
            $this->applyCoversAnnotationFilter(
                $Vqhzkfsafzrc,
                $V34rdprczie1,
                $Vws0vthwrneb
            );
        }

        if (empty($Vqhzkfsafzrc)) {
            return;
        }

        $V5mlu1ykrbu5   = 'unknown';
        $Vmtvkqxvklrv = null;

        if ($V4mdxaz2cfcr instanceof PHPUnit_Framework_TestCase) {
            $Vu5omwabzhut = $V4mdxaz2cfcr->getSize();

            if ($Vu5omwabzhut == PHPUnit_Util_Test::SMALL) {
                $V5mlu1ykrbu5 = 'small';
            } elseif ($Vu5omwabzhut == PHPUnit_Util_Test::MEDIUM) {
                $V5mlu1ykrbu5 = 'medium';
            } elseif ($Vu5omwabzhut == PHPUnit_Util_Test::LARGE) {
                $V5mlu1ykrbu5 = 'large';
            }

            $Vmtvkqxvklrv = $V4mdxaz2cfcr->getStatus();
            $V4mdxaz2cfcr     = get_class($V4mdxaz2cfcr) . '::' . $V4mdxaz2cfcr->getName();
        } elseif ($V4mdxaz2cfcr instanceof PHPUnit_Extensions_PhptTestCase) {
            $V5mlu1ykrbu5 = 'large';
            $V4mdxaz2cfcr   = $V4mdxaz2cfcr->getName();
        }

        $this->tests[$V4mdxaz2cfcr] = array('size' => $V5mlu1ykrbu5, 'status' => $Vmtvkqxvklrv);

        foreach ($Vqhzkfsafzrc as $Vpu3xl4uhgg5 => $Vbkt5laoakgf) {
            if (!$this->filter->isFile($Vpu3xl4uhgg5)) {
                continue;
            }

            foreach ($Vbkt5laoakgf as $Vyiw1hdwmjmw => $V3jv1il2hqc3) {
                if ($V3jv1il2hqc3 == PHP_CodeCoverage_Driver::LINE_EXECUTED) {
                    if (empty($this->data[$Vpu3xl4uhgg5][$Vyiw1hdwmjmw]) || !in_array($V4mdxaz2cfcr, $this->data[$Vpu3xl4uhgg5][$Vyiw1hdwmjmw])) {
                        $this->data[$Vpu3xl4uhgg5][$Vyiw1hdwmjmw][] = $V4mdxaz2cfcr;
                    }
                }
            }
        }
    }

    
    public function merge(PHP_CodeCoverage $Vrkin5cg03qs)
    {
        $this->filter->setBlacklistedFiles(
            array_merge($this->filter->getBlacklistedFiles(), $Vrkin5cg03qs->filter()->getBlacklistedFiles())
        );

        $this->filter->setWhitelistedFiles(
            array_merge($this->filter->getWhitelistedFiles(), $Vrkin5cg03qs->filter()->getWhitelistedFiles())
        );

        foreach ($Vrkin5cg03qs->data as $Vpu3xl4uhgg5 => $Vbkt5laoakgf) {
            if (!isset($this->data[$Vpu3xl4uhgg5])) {
                if (!$this->filter->isFiltered($Vpu3xl4uhgg5)) {
                    $this->data[$Vpu3xl4uhgg5] = $Vbkt5laoakgf;
                }

                continue;
            }

            foreach ($Vbkt5laoakgf as $Vrwsmtja4f2j => $Vqhzkfsafzrc) {
                if ($Vqhzkfsafzrc !== null) {
                    if (!isset($this->data[$Vpu3xl4uhgg5][$Vrwsmtja4f2j])) {
                        $this->data[$Vpu3xl4uhgg5][$Vrwsmtja4f2j] = $Vqhzkfsafzrc;
                    } else {
                        $this->data[$Vpu3xl4uhgg5][$Vrwsmtja4f2j] = array_unique(
                            array_merge($this->data[$Vpu3xl4uhgg5][$Vrwsmtja4f2j], $Vqhzkfsafzrc)
                        );
                    }
                }
            }
        }

        $this->tests = array_merge($this->tests, $Vrkin5cg03qs->getTests());

    }

    
    public function setCacheTokens($Vxda0t54j0xz)
    {
        if (!is_bool($Vxda0t54j0xz)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
                1,
                'boolean'
            );
        }

        $this->cacheTokens = $Vxda0t54j0xz;
    }

    
    public function getCacheTokens()
    {
        return $this->cacheTokens;
    }

    
    public function setCheckForUnintentionallyCoveredCode($Vxda0t54j0xz)
    {
        if (!is_bool($Vxda0t54j0xz)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
                1,
                'boolean'
            );
        }

        $this->checkForUnintentionallyCoveredCode = $Vxda0t54j0xz;
    }

    
    public function setForceCoversAnnotation($Vxda0t54j0xz)
    {
        if (!is_bool($Vxda0t54j0xz)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
                1,
                'boolean'
            );
        }

        $this->forceCoversAnnotation = $Vxda0t54j0xz;
    }

    
    public function setMapTestClassNameToCoveredClassName($Vxda0t54j0xz)
    {
        if (!is_bool($Vxda0t54j0xz)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
                1,
                'boolean'
            );
        }

        $this->mapTestClassNameToCoveredClassName = $Vxda0t54j0xz;
    }

    
    public function setAddUncoveredFilesFromWhitelist($Vxda0t54j0xz)
    {
        if (!is_bool($Vxda0t54j0xz)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
                1,
                'boolean'
            );
        }

        $this->addUncoveredFilesFromWhitelist = $Vxda0t54j0xz;
    }

    
    public function setProcessUncoveredFilesFromWhitelist($Vxda0t54j0xz)
    {
        if (!is_bool($Vxda0t54j0xz)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
                1,
                'boolean'
            );
        }

        $this->processUncoveredFilesFromWhitelist = $Vxda0t54j0xz;
    }

    
    public function setDisableIgnoredLines($Vxda0t54j0xz)
    {
        if (!is_bool($Vxda0t54j0xz)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
                1,
                'boolean'
            );
        }

        $this->disableIgnoredLines = $Vxda0t54j0xz;
    }

    
    private function applyCoversAnnotationFilter(array &$Vqhzkfsafzrc, $V34rdprczie1, array $Vws0vthwrneb)
    {
        if ($V34rdprczie1 === false ||
            ($this->forceCoversAnnotation && empty($V34rdprczie1))) {
            $Vqhzkfsafzrc = array();

            return;
        }

        if (empty($V34rdprczie1)) {
            return;
        }

        if ($this->checkForUnintentionallyCoveredCode) {
            $this->performUnintentionallyCoveredCodeCheck(
                $Vqhzkfsafzrc,
                $V34rdprczie1,
                $Vws0vthwrneb
            );
        }

        $Vqhzkfsafzrc = array_intersect_key($Vqhzkfsafzrc, $V34rdprczie1);

        foreach (array_keys($Vqhzkfsafzrc) as $Vpu3xl4uhgg5name) {
            $Vqflk2cew4gk = array_flip($V34rdprczie1[$Vpu3xl4uhgg5name]);

            $Vqhzkfsafzrc[$Vpu3xl4uhgg5name] = array_intersect_key(
                $Vqhzkfsafzrc[$Vpu3xl4uhgg5name],
                $Vqflk2cew4gk
            );
        }
    }

    
    private function applyListsFilter(array &$Vqhzkfsafzrc)
    {
        foreach (array_keys($Vqhzkfsafzrc) as $Vpu3xl4uhgg5name) {
            if ($this->filter->isFiltered($Vpu3xl4uhgg5name)) {
                unset($Vqhzkfsafzrc[$Vpu3xl4uhgg5name]);
            }
        }
    }

    
    private function applyIgnoredLinesFilter(array &$Vqhzkfsafzrc)
    {
        foreach (array_keys($Vqhzkfsafzrc) as $Vpu3xl4uhgg5name) {
            if (!$this->filter->isFile($Vpu3xl4uhgg5name)) {
                continue;
            }

            foreach ($this->getLinesToBeIgnored($Vpu3xl4uhgg5name) as $Vrwsmtja4f2j) {
                unset($Vqhzkfsafzrc[$Vpu3xl4uhgg5name][$Vrwsmtja4f2j]);
            }
        }
    }

    
    private function initializeFilesThatAreSeenTheFirstTime(array $Vqhzkfsafzrc)
    {
        foreach ($Vqhzkfsafzrc as $Vpu3xl4uhgg5 => $Vbkt5laoakgf) {
            if ($this->filter->isFile($Vpu3xl4uhgg5) && !isset($this->data[$Vpu3xl4uhgg5])) {
                $this->data[$Vpu3xl4uhgg5] = array();

                foreach ($Vbkt5laoakgf as $Vyiw1hdwmjmw => $V3jv1il2hqc3) {
                    $this->data[$Vpu3xl4uhgg5][$Vyiw1hdwmjmw] = $V3jv1il2hqc3 == -2 ? null : array();
                }
            }
        }
    }

    
    private function addUncoveredFilesFromWhitelist()
    {
        $Vqhzkfsafzrc           = array();
        $V2zel2hglwqi = array_diff(
            $this->filter->getWhitelist(),
            array_keys($this->data)
        );

        foreach ($V2zel2hglwqi as $Vvgwlyf5lrse) {
            if (!file_exists($Vvgwlyf5lrse)) {
                continue;
            }

            if ($this->processUncoveredFilesFromWhitelist) {
                $this->processUncoveredFileFromWhitelist(
                    $Vvgwlyf5lrse,
                    $Vqhzkfsafzrc,
                    $V2zel2hglwqi
                );
            } else {
                $Vqhzkfsafzrc[$Vvgwlyf5lrse] = array();

                $Vbkt5laoakgf = count(file($Vvgwlyf5lrse));

                for ($Vxja1abp34yq = 1; $Vxja1abp34yq <= $Vbkt5laoakgf; $Vxja1abp34yq++) {
                    $Vqhzkfsafzrc[$Vvgwlyf5lrse][$Vxja1abp34yq] = PHP_CodeCoverage_Driver::LINE_NOT_EXECUTED;
                }
            }
        }

        $this->append($Vqhzkfsafzrc, 'UNCOVERED_FILES_FROM_WHITELIST');
    }

    
    private function processUncoveredFileFromWhitelist($Vvgwlyf5lrse, array &$Vqhzkfsafzrc, array $V2zel2hglwqi)
    {
        $this->driver->start();
        include_once $Vvgwlyf5lrse;
        $Vbt1bqdir3su = $this->driver->stop();

        foreach ($Vbt1bqdir3su as $Vpu3xl4uhgg5 => $Vpu3xl4uhgg5Coverage) {
            if (!isset($Vqhzkfsafzrc[$Vpu3xl4uhgg5]) &&
                in_array($Vpu3xl4uhgg5, $V2zel2hglwqi)) {
                foreach (array_keys($Vpu3xl4uhgg5Coverage) as $Vyiw1hdwmjmwey) {
                    if ($Vpu3xl4uhgg5Coverage[$Vyiw1hdwmjmwey] == PHP_CodeCoverage_Driver::LINE_EXECUTED) {
                        $Vpu3xl4uhgg5Coverage[$Vyiw1hdwmjmwey] = PHP_CodeCoverage_Driver::LINE_NOT_EXECUTED;
                    }
                }

                $Vqhzkfsafzrc[$Vpu3xl4uhgg5] = $Vpu3xl4uhgg5Coverage;
            }
        }
    }

    
    private function getLinesToBeIgnored($Vpu3xl4uhgg5name)
    {
        if (!is_string($Vpu3xl4uhgg5name)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
                1,
                'string'
            );
        }

        if (!isset($this->ignoredLines[$Vpu3xl4uhgg5name])) {
            $this->ignoredLines[$Vpu3xl4uhgg5name] = array();

            if ($this->disableIgnoredLines) {
                return $this->ignoredLines[$Vpu3xl4uhgg5name];
            }

            $Vxja1abp34yqgnore   = false;
            $Vbrre0i0j4ja     = false;
            $Vbkt5laoakgf    = file($Vpu3xl4uhgg5name);
            $Vq5gy13b53wg = count($Vbkt5laoakgf);

            foreach ($Vbkt5laoakgf as $Vxja1abp34yqndex => $Vrwsmtja4f2j) {
                if (!trim($Vrwsmtja4f2j)) {
                    $this->ignoredLines[$Vpu3xl4uhgg5name][] = $Vxja1abp34yqndex + 1;
                }
            }

            if ($this->cacheTokens) {
                $Vthon1suqmsr = PHP_Token_Stream_CachingFactory::get($Vpu3xl4uhgg5name);
            } else {
                $Vthon1suqmsr = new PHP_Token_Stream($Vpu3xl4uhgg5name);
            }

            $Vcoznk2huoff = array_merge($Vthon1suqmsr->getClasses(), $Vthon1suqmsr->getTraits());
            $Vthon1suqmsr  = $Vthon1suqmsr->tokens();

            foreach ($Vthon1suqmsr as $Vx5bl5ubgnhj) {
                switch (get_class($Vx5bl5ubgnhj)) {
                    case 'PHP_Token_COMMENT':
                    case 'PHP_Token_DOC_COMMENT':
                        $Vqal313xzoym = trim($Vx5bl5ubgnhj);
                        $Vbzc2mmr55ji  = trim($Vbkt5laoakgf[$Vx5bl5ubgnhj->getLine() - 1]);

                        if ($Vqal313xzoym == '// @codeCoverageIgnore' ||
                            $Vqal313xzoym == '//@codeCoverageIgnore') {
                            $Vxja1abp34yqgnore = true;
                            $Vbrre0i0j4ja   = true;
                        } elseif ($Vqal313xzoym == '// @codeCoverageIgnoreStart' ||
                            $Vqal313xzoym == '//@codeCoverageIgnoreStart') {
                            $Vxja1abp34yqgnore = true;
                        } elseif ($Vqal313xzoym == '// @codeCoverageIgnoreEnd' ||
                            $Vqal313xzoym == '//@codeCoverageIgnoreEnd') {
                            $Vbrre0i0j4ja = true;
                        }

                        if (!$Vxja1abp34yqgnore) {
                            $Vtpoxs3gutsc = $Vx5bl5ubgnhj->getLine();
                            $Vppalz5j4b4w   = $Vtpoxs3gutsc + substr_count($Vx5bl5ubgnhj, "\n");

                            
                            
                            if (0 !== strpos($Vqal313xzoym, $Vbzc2mmr55ji)) {
                                $Vtpoxs3gutsc++;
                            }

                            for ($Vxja1abp34yq = $Vtpoxs3gutsc; $Vxja1abp34yq < $Vppalz5j4b4w; $Vxja1abp34yq++) {
                                $this->ignoredLines[$Vpu3xl4uhgg5name][] = $Vxja1abp34yq;
                            }

                            
                            
                            if (isset($Vbkt5laoakgf[$Vxja1abp34yq-1]) && 0 === strpos($Vqal313xzoym, '/*') && '*/' === substr(trim($Vbkt5laoakgf[$Vxja1abp34yq-1]), -2)) {
                                $this->ignoredLines[$Vpu3xl4uhgg5name][] = $Vxja1abp34yq;
                            }
                        }
                        break;

                    case 'PHP_Token_INTERFACE':
                    case 'PHP_Token_TRAIT':
                    case 'PHP_Token_CLASS':
                    case 'PHP_Token_FUNCTION':
                        $Vbr0pcbogll4 = $Vx5bl5ubgnhj->getDocblock();

                        $this->ignoredLines[$Vpu3xl4uhgg5name][] = $Vx5bl5ubgnhj->getLine();

                        if (strpos($Vbr0pcbogll4, '@codeCoverageIgnore') || strpos($Vbr0pcbogll4, '@deprecated')) {
                            $Vppalz5j4b4wLine = $Vx5bl5ubgnhj->getEndLine();

                            for ($Vxja1abp34yq = $Vx5bl5ubgnhj->getLine(); $Vxja1abp34yq <= $Vppalz5j4b4wLine; $Vxja1abp34yq++) {
                                $this->ignoredLines[$Vpu3xl4uhgg5name][] = $Vxja1abp34yq;
                            }
                        } elseif ($Vx5bl5ubgnhj instanceof PHP_Token_INTERFACE ||
                            $Vx5bl5ubgnhj instanceof PHP_Token_TRAIT ||
                            $Vx5bl5ubgnhj instanceof PHP_Token_CLASS) {
                            if (empty($Vcoznk2huoff[$Vx5bl5ubgnhj->getName()]['methods'])) {
                                for ($Vxja1abp34yq = $Vx5bl5ubgnhj->getLine();
                                     $Vxja1abp34yq <= $Vx5bl5ubgnhj->getEndLine();
                                     $Vxja1abp34yq++) {
                                    $this->ignoredLines[$Vpu3xl4uhgg5name][] = $Vxja1abp34yq;
                                }
                            } else {
                                $Vmv32o1ae5k1 = array_shift(
                                    $Vcoznk2huoff[$Vx5bl5ubgnhj->getName()]['methods']
                                );

                                do {
                                    $Vnznwvnhniog = array_pop(
                                        $Vcoznk2huoff[$Vx5bl5ubgnhj->getName()]['methods']
                                    );
                                } while ($Vnznwvnhniog !== null &&
                                    substr($Vnznwvnhniog['signature'], 0, 18) == 'anonymous function');

                                if ($Vnznwvnhniog === null) {
                                    $Vnznwvnhniog = $Vmv32o1ae5k1;
                                }

                                for ($Vxja1abp34yq = $Vx5bl5ubgnhj->getLine();
                                     $Vxja1abp34yq < $Vmv32o1ae5k1['startLine'];
                                     $Vxja1abp34yq++) {
                                    $this->ignoredLines[$Vpu3xl4uhgg5name][] = $Vxja1abp34yq;
                                }

                                for ($Vxja1abp34yq = $Vx5bl5ubgnhj->getEndLine();
                                     $Vxja1abp34yq > $Vnznwvnhniog['endLine'];
                                     $Vxja1abp34yq--) {
                                    $this->ignoredLines[$Vpu3xl4uhgg5name][] = $Vxja1abp34yq;
                                }
                            }
                        }
                        break;

                    case 'PHP_Token_NAMESPACE':
                        $this->ignoredLines[$Vpu3xl4uhgg5name][] = $Vx5bl5ubgnhj->getEndLine();

                    
                    case 'PHP_Token_OPEN_TAG':
                    case 'PHP_Token_CLOSE_TAG':
                    case 'PHP_Token_USE':
                        $this->ignoredLines[$Vpu3xl4uhgg5name][] = $Vx5bl5ubgnhj->getLine();
                        break;
                }

                if ($Vxja1abp34yqgnore) {
                    $this->ignoredLines[$Vpu3xl4uhgg5name][] = $Vx5bl5ubgnhj->getLine();

                    if ($Vbrre0i0j4ja) {
                        $Vxja1abp34yqgnore = false;
                        $Vbrre0i0j4ja   = false;
                    }
                }
            }

            $this->ignoredLines[$Vpu3xl4uhgg5name][] = $Vq5gy13b53wg + 1;

            $this->ignoredLines[$Vpu3xl4uhgg5name] = array_unique(
                $this->ignoredLines[$Vpu3xl4uhgg5name]
            );

            sort($this->ignoredLines[$Vpu3xl4uhgg5name]);
        }

        return $this->ignoredLines[$Vpu3xl4uhgg5name];
    }

    
    private function performUnintentionallyCoveredCodeCheck(array &$Vqhzkfsafzrc, array $V34rdprczie1, array $Vws0vthwrneb)
    {
        $Vtusrmv5gv5l = $this->getAllowedLines(
            $V34rdprczie1,
            $Vws0vthwrneb
        );

        $Vbl4yrmdan1y = '';

        foreach ($Vqhzkfsafzrc as $Vpu3xl4uhgg5 => $V5l5lo3l3ri2) {
            foreach ($V5l5lo3l3ri2 as $Vrwsmtja4f2j => $Vxda0t54j0xz) {
                if ($Vxda0t54j0xz == 1 &&
                    (!isset($Vtusrmv5gv5l[$Vpu3xl4uhgg5]) ||
                        !isset($Vtusrmv5gv5l[$Vpu3xl4uhgg5][$Vrwsmtja4f2j]))) {
                    $Vbl4yrmdan1y .= sprintf(
                        '- %s:%d' . PHP_EOL,
                        $Vpu3xl4uhgg5,
                        $Vrwsmtja4f2j
                    );
                }
            }
        }

        if (!empty($Vbl4yrmdan1y)) {
            throw new PHP_CodeCoverage_Exception_UnintentionallyCoveredCode(
                $Vbl4yrmdan1y
            );
        }
    }

    
    private function getAllowedLines(array $V34rdprczie1, array $Vws0vthwrneb)
    {
        $Vtusrmv5gv5l = array();

        foreach (array_keys($V34rdprczie1) as $Vpu3xl4uhgg5) {
            if (!isset($Vtusrmv5gv5l[$Vpu3xl4uhgg5])) {
                $Vtusrmv5gv5l[$Vpu3xl4uhgg5] = array();
            }

            $Vtusrmv5gv5l[$Vpu3xl4uhgg5] = array_merge(
                $Vtusrmv5gv5l[$Vpu3xl4uhgg5],
                $V34rdprczie1[$Vpu3xl4uhgg5]
            );
        }

        foreach (array_keys($Vws0vthwrneb) as $Vpu3xl4uhgg5) {
            if (!isset($Vtusrmv5gv5l[$Vpu3xl4uhgg5])) {
                $Vtusrmv5gv5l[$Vpu3xl4uhgg5] = array();
            }

            $Vtusrmv5gv5l[$Vpu3xl4uhgg5] = array_merge(
                $Vtusrmv5gv5l[$Vpu3xl4uhgg5],
                $Vws0vthwrneb[$Vpu3xl4uhgg5]
            );
        }

        foreach (array_keys($Vtusrmv5gv5l) as $Vpu3xl4uhgg5) {
            $Vtusrmv5gv5l[$Vpu3xl4uhgg5] = array_flip(
                array_unique($Vtusrmv5gv5l[$Vpu3xl4uhgg5])
            );
        }

        return $Vtusrmv5gv5l;
    }

    
    private function selectDriver()
    {
        $Vrdnxfa4exum = new Runtime;

        if (!$Vrdnxfa4exum->canCollectCodeCoverage()) {
            throw new PHP_CodeCoverage_Exception('No code coverage driver available');
        }

        if ($Vrdnxfa4exum->isHHVM()) {
            return new PHP_CodeCoverage_Driver_HHVM;
        } elseif ($Vrdnxfa4exum->isPHPDBG()) {
            return new PHP_CodeCoverage_Driver_PHPDBG;
        } else {
            return new PHP_CodeCoverage_Driver_Xdebug;
        }
    }
}
