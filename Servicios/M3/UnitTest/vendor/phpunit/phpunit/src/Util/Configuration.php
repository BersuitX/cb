<?php



class PHPUnit_Util_Configuration
{
    private static $Vk0ukwdme1q4 = array();

    protected $Vn3u2xbvygpr;
    protected $Vcbqcawr5t3a;
    protected $Va3qqb0vgkhy;

    
    protected function __construct($Va3qqb0vgkhy)
    {
        $this->filename = $Va3qqb0vgkhy;
        $this->document = PHPUnit_Util_XML::loadFile($Va3qqb0vgkhy, false, true, true);
        $this->xpath    = new DOMXPath($this->document);
    }

    
    final private function __clone()
    {
    }

    
    public static function getInstance($Va3qqb0vgkhy)
    {
        $Vlzf1ob0wbpj = realpath($Va3qqb0vgkhy);

        if ($Vlzf1ob0wbpj === false) {
            throw new PHPUnit_Framework_Exception(
                sprintf(
                    'Could not read "%s".',
                    $Va3qqb0vgkhy
                )
            );
        }

        if (!isset(self::$Vk0ukwdme1q4[$Vlzf1ob0wbpj])) {
            self::$Vk0ukwdme1q4[$Vlzf1ob0wbpj] = new self($Vlzf1ob0wbpj);
        }

        return self::$Vk0ukwdme1q4[$Vlzf1ob0wbpj];
    }

    
    public function getFilename()
    {
        return $this->filename;
    }

    
    public function getFilterConfiguration()
    {
        $Vdboy4jhxvl2     = true;
        $V2n1khqlsel1 = false;

        $Vvurliuircct = $this->xpath->query('filter/whitelist');

        if ($Vvurliuircct->length == 1) {
            if ($Vvurliuircct->item(0)->hasAttribute('addUncoveredFilesFromWhitelist')) {
                $Vdboy4jhxvl2 = $this->getBoolean(
                    (string) $Vvurliuircct->item(0)->getAttribute(
                        'addUncoveredFilesFromWhitelist'
                    ),
                    true
                );
            }

            if ($Vvurliuircct->item(0)->hasAttribute('processUncoveredFilesFromWhitelist')) {
                $V2n1khqlsel1 = $this->getBoolean(
                    (string) $Vvurliuircct->item(0)->getAttribute(
                        'processUncoveredFilesFromWhitelist'
                    ),
                    false
                );
            }
        }

        return array(
          'blacklist' => array(
            'include' => array(
              'directory' => $this->readFilterDirectories(
                  'filter/blacklist/directory'
              ),
              'file' => $this->readFilterFiles(
                  'filter/blacklist/file'
              )
            ),
            'exclude' => array(
              'directory' => $this->readFilterDirectories(
                  'filter/blacklist/exclude/directory'
              ),
              'file' => $this->readFilterFiles(
                  'filter/blacklist/exclude/file'
              )
            )
          ),
          'whitelist' => array(
            'addUncoveredFilesFromWhitelist'     => $Vdboy4jhxvl2,
            'processUncoveredFilesFromWhitelist' => $V2n1khqlsel1,
            'include'                            => array(
              'directory' => $this->readFilterDirectories(
                  'filter/whitelist/directory'
              ),
              'file' => $this->readFilterFiles(
                  'filter/whitelist/file'
              )
            ),
            'exclude' => array(
              'directory' => $this->readFilterDirectories(
                  'filter/whitelist/exclude/directory'
              ),
              'file' => $this->readFilterFiles(
                  'filter/whitelist/exclude/file'
              )
            )
          )
        );
    }

    
    public function getGroupConfiguration()
    {
        $V00tm5epe1pm = array(
          'include' => array(),
          'exclude' => array()
        );

        foreach ($this->xpath->query('groups/include/group') as $Vsq5adfvkj3r) {
            $V00tm5epe1pm['include'][] = (string) $Vsq5adfvkj3r->textContent;
        }

        foreach ($this->xpath->query('groups/exclude/group') as $Vsq5adfvkj3r) {
            $V00tm5epe1pm['exclude'][] = (string) $Vsq5adfvkj3r->textContent;
        }

        return $V00tm5epe1pm;
    }

    
    public function getListenerConfiguration()
    {
        $Vv0hyvhlkjqr = array();

        foreach ($this->xpath->query('listeners/listener') as $V13lyfwn4lxw) {
            $Vqmu1sajhgfn     = (string) $V13lyfwn4lxw->getAttribute('class');
            $Vpu3xl4uhgg5      = '';
            $Vj23lbel2xn0 = array();

            if ($V13lyfwn4lxw->getAttribute('file')) {
                $Vpu3xl4uhgg5 = $this->toAbsolutePath(
                    (string) $V13lyfwn4lxw->getAttribute('file'),
                    true
                );
            }

            foreach ($V13lyfwn4lxw->childNodes as $Vpbrymo1kvdk) {
                if ($Vpbrymo1kvdk instanceof DOMElement && $Vpbrymo1kvdk->tagName == 'arguments') {
                    foreach ($Vpbrymo1kvdk->childNodes as $Vlf5kwra10uk) {
                        if ($Vlf5kwra10uk instanceof DOMElement) {
                            if ($Vlf5kwra10uk->tagName == 'file' ||
                            $Vlf5kwra10uk->tagName == 'directory') {
                                $Vj23lbel2xn0[] = $this->toAbsolutePath((string) $Vlf5kwra10uk->textContent);
                            } else {
                                $Vj23lbel2xn0[] = PHPUnit_Util_XML::xmlToVariable($Vlf5kwra10uk);
                            }
                        }
                    }
                }
            }

            $Vv0hyvhlkjqr[] = array(
              'class'     => $Vqmu1sajhgfn,
              'file'      => $Vpu3xl4uhgg5,
              'arguments' => $Vj23lbel2xn0
            );
        }

        return $Vv0hyvhlkjqr;
    }

    
    public function getLoggingConfiguration()
    {
        $Vv0hyvhlkjqr = array();

        foreach ($this->xpath->query('logging/log') as $Va4njuxc5kxm) {
            $V31qrja1w0r2   = (string) $Va4njuxc5kxm->getAttribute('type');
            $Vec3c2fwpbib = (string) $Va4njuxc5kxm->getAttribute('target');

            if (!$Vec3c2fwpbib) {
                continue;
            }

            $Vec3c2fwpbib = $this->toAbsolutePath($Vec3c2fwpbib);

            if ($V31qrja1w0r2 == 'coverage-html') {
                if ($Va4njuxc5kxm->hasAttribute('lowUpperBound')) {
                    $Vv0hyvhlkjqr['lowUpperBound'] = $this->getInteger(
                        (string) $Va4njuxc5kxm->getAttribute('lowUpperBound'),
                        50
                    );
                }

                if ($Va4njuxc5kxm->hasAttribute('highLowerBound')) {
                    $Vv0hyvhlkjqr['highLowerBound'] = $this->getInteger(
                        (string) $Va4njuxc5kxm->getAttribute('highLowerBound'),
                        90
                    );
                }
            } elseif ($V31qrja1w0r2 == 'coverage-crap4j') {
                if ($Va4njuxc5kxm->hasAttribute('threshold')) {
                    $Vv0hyvhlkjqr['crap4jThreshold'] = $this->getInteger(
                        (string) $Va4njuxc5kxm->getAttribute('threshold'),
                        30
                    );
                }
            } elseif ($V31qrja1w0r2 == 'junit') {
                if ($Va4njuxc5kxm->hasAttribute('logIncompleteSkipped')) {
                    $Vv0hyvhlkjqr['logIncompleteSkipped'] = $this->getBoolean(
                        (string) $Va4njuxc5kxm->getAttribute('logIncompleteSkipped'),
                        false
                    );
                }
            } elseif ($V31qrja1w0r2 == 'coverage-text') {
                if ($Va4njuxc5kxm->hasAttribute('showUncoveredFiles')) {
                    $Vv0hyvhlkjqr['coverageTextShowUncoveredFiles'] = $this->getBoolean(
                        (string) $Va4njuxc5kxm->getAttribute('showUncoveredFiles'),
                        false
                    );
                }
                if ($Va4njuxc5kxm->hasAttribute('showOnlySummary')) {
                    $Vv0hyvhlkjqr['coverageTextShowOnlySummary'] = $this->getBoolean(
                        (string) $Va4njuxc5kxm->getAttribute('showOnlySummary'),
                        false
                    );
                }
            }

            $Vv0hyvhlkjqr[$V31qrja1w0r2] = $Vec3c2fwpbib;
        }

        return $Vv0hyvhlkjqr;
    }

    
    public function getPHPConfiguration()
    {
        $Vv0hyvhlkjqr = array(
          'include_path' => array(),
          'ini'          => array(),
          'const'        => array(),
          'var'          => array(),
          'env'          => array(),
          'post'         => array(),
          'get'          => array(),
          'cookie'       => array(),
          'server'       => array(),
          'files'        => array(),
          'request'      => array()
        );

        foreach ($this->xpath->query('php/includePath') as $Vdvo2o2gi4j1) {
            $V2bpoh5hagzp = (string) $Vdvo2o2gi4j1->textContent;
            if ($V2bpoh5hagzp) {
                $Vv0hyvhlkjqr['include_path'][] = $this->toAbsolutePath($V2bpoh5hagzp);
            }
        }

        foreach ($this->xpath->query('php/ini') as $Vny2uq2slirh) {
            $Vgpjmw221p0b  = (string) $Vny2uq2slirh->getAttribute('name');
            $Vcptarsq5qe4 = (string) $Vny2uq2slirh->getAttribute('value');

            $Vv0hyvhlkjqr['ini'][$Vgpjmw221p0b] = $Vcptarsq5qe4;
        }

        foreach ($this->xpath->query('php/const') as $V43ory1xqr50) {
            $Vgpjmw221p0b  = (string) $V43ory1xqr50->getAttribute('name');
            $Vcptarsq5qe4 = (string) $V43ory1xqr50->getAttribute('value');

            $Vv0hyvhlkjqr['const'][$Vgpjmw221p0b] = $this->getBoolean($Vcptarsq5qe4, $Vcptarsq5qe4);
        }

        foreach (array('var', 'env', 'post', 'get', 'cookie', 'server', 'files', 'request') as $Vvs0hc5bhqj3) {
            foreach ($this->xpath->query('php/' . $Vvs0hc5bhqj3) as $Vwe0n3klwyea) {
                $Vgpjmw221p0b  = (string) $Vwe0n3klwyea->getAttribute('name');
                $Vcptarsq5qe4 = (string) $Vwe0n3klwyea->getAttribute('value');

                $Vv0hyvhlkjqr[$Vvs0hc5bhqj3][$Vgpjmw221p0b] = $this->getBoolean($Vcptarsq5qe4, $Vcptarsq5qe4);
            }
        }

        return $Vv0hyvhlkjqr;
    }

    
    public function handlePHPConfiguration()
    {
        $Vagofhq2gyvt = $this->getPHPConfiguration();

        if (! empty($Vagofhq2gyvt['include_path'])) {
            ini_set(
                'include_path',
                implode(PATH_SEPARATOR, $Vagofhq2gyvt['include_path']) .
                PATH_SEPARATOR .
                ini_get('include_path')
            );
        }

        foreach ($Vagofhq2gyvt['ini'] as $Vgpjmw221p0b => $Vcptarsq5qe4) {
            if (defined($Vcptarsq5qe4)) {
                $Vcptarsq5qe4 = constant($Vcptarsq5qe4);
            }

            ini_set($Vgpjmw221p0b, $Vcptarsq5qe4);
        }

        foreach ($Vagofhq2gyvt['const'] as $Vgpjmw221p0b => $Vcptarsq5qe4) {
            if (!defined($Vgpjmw221p0b)) {
                define($Vgpjmw221p0b, $Vcptarsq5qe4);
            }
        }

        foreach (array('var', 'post', 'get', 'cookie', 'server', 'files', 'request') as $Vvs0hc5bhqj3) {
            
            switch ($Vvs0hc5bhqj3) {
                case 'var':
                    $Vec3c2fwpbib = &$GLOBALS;
                    break;

                case 'server':
                    $Vec3c2fwpbib = &$_SERVER;
                    break;

                default:
                    $Vec3c2fwpbib = &$GLOBALS['_' . strtoupper($Vvs0hc5bhqj3)];
                    break;
            }

            foreach ($Vagofhq2gyvt[$Vvs0hc5bhqj3] as $Vgpjmw221p0b => $Vcptarsq5qe4) {
                $Vec3c2fwpbib[$Vgpjmw221p0b] = $Vcptarsq5qe4;
            }
        }

        foreach ($Vagofhq2gyvt['env'] as $Vgpjmw221p0b => $Vcptarsq5qe4) {
            if (false === getenv($Vgpjmw221p0b)) {
                putenv("{$Vgpjmw221p0b}={$Vcptarsq5qe4}");
            }
            if (!isset($_ENV[$Vgpjmw221p0b])) {
                $_ENV[$Vgpjmw221p0b] = $Vcptarsq5qe4;
            }
        }
    }

    
    public function getPHPUnitConfiguration()
    {
        $Vv0hyvhlkjqr = array();
        $Vixd4iv51rfm   = $this->document->documentElement;

        if ($Vixd4iv51rfm->hasAttribute('cacheTokens')) {
            $Vv0hyvhlkjqr['cacheTokens'] = $this->getBoolean(
                (string) $Vixd4iv51rfm->getAttribute('cacheTokens'),
                false
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('columns')) {
            $Vtq2rgtvyetr = (string) $Vixd4iv51rfm->getAttribute('columns');

            if ($Vtq2rgtvyetr == 'max') {
                $Vv0hyvhlkjqr['columns'] = 'max';
            } else {
                $Vv0hyvhlkjqr['columns'] = $this->getInteger($Vtq2rgtvyetr, 80);
            }
        }

        if ($Vixd4iv51rfm->hasAttribute('colors')) {
            
            if ($this->getBoolean($Vixd4iv51rfm->getAttribute('colors'), false)) {
                $Vv0hyvhlkjqr['colors'] = PHPUnit_TextUI_ResultPrinter::COLOR_AUTO;
            } else {
                $Vv0hyvhlkjqr['colors'] = PHPUnit_TextUI_ResultPrinter::COLOR_NEVER;
            }
        }

        
        if ($Vixd4iv51rfm->hasAttribute('stderr')) {
            $Vv0hyvhlkjqr['stderr'] = $this->getBoolean(
                (string) $Vixd4iv51rfm->getAttribute('stderr'),
                false
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('backupGlobals')) {
            $Vv0hyvhlkjqr['backupGlobals'] = $this->getBoolean(
                (string) $Vixd4iv51rfm->getAttribute('backupGlobals'),
                true
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('backupStaticAttributes')) {
            $Vv0hyvhlkjqr['backupStaticAttributes'] = $this->getBoolean(
                (string) $Vixd4iv51rfm->getAttribute('backupStaticAttributes'),
                false
            );
        }

        if ($Vixd4iv51rfm->getAttribute('bootstrap')) {
            $Vv0hyvhlkjqr['bootstrap'] = $this->toAbsolutePath(
                (string) $Vixd4iv51rfm->getAttribute('bootstrap')
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('convertErrorsToExceptions')) {
            $Vv0hyvhlkjqr['convertErrorsToExceptions'] = $this->getBoolean(
                (string) $Vixd4iv51rfm->getAttribute('convertErrorsToExceptions'),
                true
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('convertNoticesToExceptions')) {
            $Vv0hyvhlkjqr['convertNoticesToExceptions'] = $this->getBoolean(
                (string) $Vixd4iv51rfm->getAttribute('convertNoticesToExceptions'),
                true
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('convertWarningsToExceptions')) {
            $Vv0hyvhlkjqr['convertWarningsToExceptions'] = $this->getBoolean(
                (string) $Vixd4iv51rfm->getAttribute('convertWarningsToExceptions'),
                true
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('forceCoversAnnotation')) {
            $Vv0hyvhlkjqr['forceCoversAnnotation'] = $this->getBoolean(
                (string) $Vixd4iv51rfm->getAttribute('forceCoversAnnotation'),
                false
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('mapTestClassNameToCoveredClassName')) {
            $Vv0hyvhlkjqr['mapTestClassNameToCoveredClassName'] = $this->getBoolean(
                (string) $Vixd4iv51rfm->getAttribute('mapTestClassNameToCoveredClassName'),
                false
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('processIsolation')) {
            $Vv0hyvhlkjqr['processIsolation'] = $this->getBoolean(
                (string) $Vixd4iv51rfm->getAttribute('processIsolation'),
                false
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('stopOnError')) {
            $Vv0hyvhlkjqr['stopOnError'] = $this->getBoolean(
                (string) $Vixd4iv51rfm->getAttribute('stopOnError'),
                false
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('stopOnFailure')) {
            $Vv0hyvhlkjqr['stopOnFailure'] = $this->getBoolean(
                (string) $Vixd4iv51rfm->getAttribute('stopOnFailure'),
                false
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('stopOnIncomplete')) {
            $Vv0hyvhlkjqr['stopOnIncomplete'] = $this->getBoolean(
                (string) $Vixd4iv51rfm->getAttribute('stopOnIncomplete'),
                false
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('stopOnRisky')) {
            $Vv0hyvhlkjqr['stopOnRisky'] = $this->getBoolean(
                (string) $Vixd4iv51rfm->getAttribute('stopOnRisky'),
                false
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('stopOnSkipped')) {
            $Vv0hyvhlkjqr['stopOnSkipped'] = $this->getBoolean(
                (string) $Vixd4iv51rfm->getAttribute('stopOnSkipped'),
                false
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('testSuiteLoaderClass')) {
            $Vv0hyvhlkjqr['testSuiteLoaderClass'] = (string) $Vixd4iv51rfm->getAttribute(
                'testSuiteLoaderClass'
            );
        }

        if ($Vixd4iv51rfm->getAttribute('testSuiteLoaderFile')) {
            $Vv0hyvhlkjqr['testSuiteLoaderFile'] = $this->toAbsolutePath(
                (string) $Vixd4iv51rfm->getAttribute('testSuiteLoaderFile')
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('printerClass')) {
            $Vv0hyvhlkjqr['printerClass'] = (string) $Vixd4iv51rfm->getAttribute(
                'printerClass'
            );
        }

        if ($Vixd4iv51rfm->getAttribute('printerFile')) {
            $Vv0hyvhlkjqr['printerFile'] = $this->toAbsolutePath(
                (string) $Vixd4iv51rfm->getAttribute('printerFile')
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('timeoutForSmallTests')) {
            $Vv0hyvhlkjqr['timeoutForSmallTests'] = $this->getInteger(
                (string) $Vixd4iv51rfm->getAttribute('timeoutForSmallTests'),
                1
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('timeoutForMediumTests')) {
            $Vv0hyvhlkjqr['timeoutForMediumTests'] = $this->getInteger(
                (string) $Vixd4iv51rfm->getAttribute('timeoutForMediumTests'),
                10
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('timeoutForLargeTests')) {
            $Vv0hyvhlkjqr['timeoutForLargeTests'] = $this->getInteger(
                (string) $Vixd4iv51rfm->getAttribute('timeoutForLargeTests'),
                60
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('beStrictAboutTestsThatDoNotTestAnything')) {
            $Vv0hyvhlkjqr['reportUselessTests'] = $this->getBoolean(
                (string) $Vixd4iv51rfm->getAttribute('beStrictAboutTestsThatDoNotTestAnything'),
                false
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('checkForUnintentionallyCoveredCode')) {
            $Vv0hyvhlkjqr['strictCoverage'] = $this->getBoolean(
                (string) $Vixd4iv51rfm->getAttribute('checkForUnintentionallyCoveredCode'),
                false
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('beStrictAboutOutputDuringTests')) {
            $Vv0hyvhlkjqr['disallowTestOutput'] = $this->getBoolean(
                (string) $Vixd4iv51rfm->getAttribute('beStrictAboutOutputDuringTests'),
                false
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('beStrictAboutChangesToGlobalState')) {
            $Vv0hyvhlkjqr['disallowChangesToGlobalState'] = $this->getBoolean(
                (string) $Vixd4iv51rfm->getAttribute('beStrictAboutChangesToGlobalState'),
                false
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('beStrictAboutTestSize')) {
            $Vv0hyvhlkjqr['enforceTimeLimit'] = $this->getBoolean(
                (string) $Vixd4iv51rfm->getAttribute('beStrictAboutTestSize'),
                false
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('beStrictAboutTodoAnnotatedTests')) {
            $Vv0hyvhlkjqr['disallowTodoAnnotatedTests'] = $this->getBoolean(
                (string) $Vixd4iv51rfm->getAttribute('beStrictAboutTodoAnnotatedTests'),
                false
            );
        }

        if ($Vixd4iv51rfm->hasAttribute('strict')) {
            $Vxda0t54j0xz = $this->getBoolean(
                (string) $Vixd4iv51rfm->getAttribute('strict'),
                false
            );

            $Vv0hyvhlkjqr['reportUselessTests']          = $Vxda0t54j0xz;
            $Vv0hyvhlkjqr['strictCoverage']              = $Vxda0t54j0xz;
            $Vv0hyvhlkjqr['disallowTestOutput']          = $Vxda0t54j0xz;
            $Vv0hyvhlkjqr['enforceTimeLimit']            = $Vxda0t54j0xz;
            $Vv0hyvhlkjqr['disallowTodoAnnotatedTests']  = $Vxda0t54j0xz;
            $Vv0hyvhlkjqr['deprecatedStrictModeSetting'] = true;
        }

        if ($Vixd4iv51rfm->hasAttribute('verbose')) {
            $Vv0hyvhlkjqr['verbose'] = $this->getBoolean(
                (string) $Vixd4iv51rfm->getAttribute('verbose'),
                false
            );
        }

        return $Vv0hyvhlkjqr;
    }

    
    public function getSeleniumBrowserConfiguration()
    {
        $Vv0hyvhlkjqr = array();

        foreach ($this->xpath->query('selenium/browser') as $Vzln21bnzdcs) {
            $Vgpjmw221p0b    = (string) $Vzln21bnzdcs->getAttribute('name');
            $V2cstxqd2kvc = (string) $Vzln21bnzdcs->getAttribute('browser');

            if ($Vzln21bnzdcs->hasAttribute('host')) {
                $Votmxko4hrhx = (string) $Vzln21bnzdcs->getAttribute('host');
            } else {
                $Votmxko4hrhx = 'localhost';
            }

            if ($Vzln21bnzdcs->hasAttribute('port')) {
                $Vtdpfzm0vmqb = $this->getInteger(
                    (string) $Vzln21bnzdcs->getAttribute('port'),
                    4444
                );
            } else {
                $Vtdpfzm0vmqb = 4444;
            }

            if ($Vzln21bnzdcs->hasAttribute('timeout')) {
                $Vm5fob1huynh = $this->getInteger(
                    (string) $Vzln21bnzdcs->getAttribute('timeout'),
                    30000
                );
            } else {
                $Vm5fob1huynh = 30000;
            }

            $Vv0hyvhlkjqr[] = array(
              'name'    => $Vgpjmw221p0b,
              'browser' => $V2cstxqd2kvc,
              'host'    => $Votmxko4hrhx,
              'port'    => $Vtdpfzm0vmqb,
              'timeout' => $Vm5fob1huynh
            );
        }

        return $Vv0hyvhlkjqr;
    }

    
    public function getTestSuiteConfiguration($Vnqdnzaql55y = null)
    {
        $Vuhz30igv1tj = $this->xpath->query('testsuites/testsuite');

        if ($Vuhz30igv1tj->length == 0) {
            $Vuhz30igv1tj = $this->xpath->query('testsuite');
        }

        if ($Vuhz30igv1tj->length == 1) {
            return $this->getTestSuite($Vuhz30igv1tj->item(0), $Vnqdnzaql55y);
        }

        if ($Vuhz30igv1tj->length > 1) {
            $Vrrxtoyyy15e = new PHPUnit_Framework_TestSuite;

            foreach ($Vuhz30igv1tj as $Vybo5rbdked3) {
                $Vrrxtoyyy15e->addTestSuite(
                    $this->getTestSuite($Vybo5rbdked3, $Vnqdnzaql55y)
                );
            }

            return $Vrrxtoyyy15e;
        }
    }

    
    protected function getTestSuite(DOMElement $Vybo5rbdked3, $Vnqdnzaql55y = null)
    {
        if ($Vybo5rbdked3->hasAttribute('name')) {
            $Vrrxtoyyy15e = new PHPUnit_Framework_TestSuite(
                (string) $Vybo5rbdked3->getAttribute('name')
            );
        } else {
            $Vrrxtoyyy15e = new PHPUnit_Framework_TestSuite;
        }

        $Vd0fgqkfpr15 = array();

        foreach ($Vybo5rbdked3->getElementsByTagName('exclude') as $Vd0fgqkfpr15Node) {
            $Vd0fgqkfpr15File = (string) $Vd0fgqkfpr15Node->textContent;
            if ($Vd0fgqkfpr15File) {
                $Vd0fgqkfpr15[] = $this->toAbsolutePath($Vd0fgqkfpr15File);
            }
        }

        $Vpu3xl4uhgg5IteratorFacade = new File_Iterator_Facade;

        foreach ($Vybo5rbdked3->getElementsByTagName('directory') as $Vvf4v5vadnk4) {
            if ($Vnqdnzaql55y && $Vvf4v5vadnk4->parentNode->getAttribute('name') != $Vnqdnzaql55y) {
                continue;
            }

            $Vghfube41qyl = (string) $Vvf4v5vadnk4->textContent;

            if (empty($Vghfube41qyl)) {
                continue;
            }

            if ($Vvf4v5vadnk4->hasAttribute('phpVersion')) {
                $Vytyqezjnloc = (string) $Vvf4v5vadnk4->getAttribute('phpVersion');
            } else {
                $Vytyqezjnloc = PHP_VERSION;
            }

            if ($Vvf4v5vadnk4->hasAttribute('phpVersionOperator')) {
                $VytyqezjnlocOperator = (string) $Vvf4v5vadnk4->getAttribute('phpVersionOperator');
            } else {
                $VytyqezjnlocOperator = '>=';
            }

            if (!version_compare(PHP_VERSION, $Vytyqezjnloc, $VytyqezjnlocOperator)) {
                continue;
            }

            if ($Vvf4v5vadnk4->hasAttribute('prefix')) {
                $V2hf2uebv5m0 = (string) $Vvf4v5vadnk4->getAttribute('prefix');
            } else {
                $V2hf2uebv5m0 = '';
            }

            if ($Vvf4v5vadnk4->hasAttribute('suffix')) {
                $V52q32upexbe = (string) $Vvf4v5vadnk4->getAttribute('suffix');
            } else {
                $V52q32upexbe = 'Test.php';
            }

            $Vpu3xl4uhgg5s = $Vpu3xl4uhgg5IteratorFacade->getFilesAsArray(
                $this->toAbsolutePath($Vghfube41qyl),
                $V52q32upexbe,
                $V2hf2uebv5m0,
                $Vd0fgqkfpr15
            );
            $Vrrxtoyyy15e->addTestFiles($Vpu3xl4uhgg5s);
        }

        foreach ($Vybo5rbdked3->getElementsByTagName('file') as $Vpu3xl4uhgg5Node) {
            if ($Vnqdnzaql55y && $Vpu3xl4uhgg5Node->parentNode->getAttribute('name') != $Vnqdnzaql55y) {
                continue;
            }

            $Vpu3xl4uhgg5 = (string) $Vpu3xl4uhgg5Node->textContent;

            if (empty($Vpu3xl4uhgg5)) {
                continue;
            }

            
            $Vpu3xl4uhgg5 = $Vpu3xl4uhgg5IteratorFacade->getFilesAsArray(
                $this->toAbsolutePath($Vpu3xl4uhgg5)
            );

            if (!isset($Vpu3xl4uhgg5[0])) {
                continue;
            }

            $Vpu3xl4uhgg5 = $Vpu3xl4uhgg5[0];

            if ($Vpu3xl4uhgg5Node->hasAttribute('phpVersion')) {
                $Vytyqezjnloc = (string) $Vpu3xl4uhgg5Node->getAttribute('phpVersion');
            } else {
                $Vytyqezjnloc = PHP_VERSION;
            }

            if ($Vpu3xl4uhgg5Node->hasAttribute('phpVersionOperator')) {
                $VytyqezjnlocOperator = (string) $Vpu3xl4uhgg5Node->getAttribute('phpVersionOperator');
            } else {
                $VytyqezjnlocOperator = '>=';
            }

            if (!version_compare(PHP_VERSION, $Vytyqezjnloc, $VytyqezjnlocOperator)) {
                continue;
            }

            $Vrrxtoyyy15e->addTestFile($Vpu3xl4uhgg5);
        }

        return $Vrrxtoyyy15e;
    }

    
    protected function getBoolean($Vcptarsq5qe4, $V0ekusmibtbl)
    {
        if (strtolower($Vcptarsq5qe4) == 'false') {
            return false;
        } elseif (strtolower($Vcptarsq5qe4) == 'true') {
            return true;
        }

        return $V0ekusmibtbl;
    }

    
    protected function getInteger($Vcptarsq5qe4, $V0ekusmibtbl)
    {
        if (is_numeric($Vcptarsq5qe4)) {
            return (int) $Vcptarsq5qe4;
        }

        return $V0ekusmibtbl;
    }

    
    protected function readFilterDirectories($Vfbt3who3l5d)
    {
        $Vyzstc3ohmps = array();

        foreach ($this->xpath->query($Vfbt3who3l5d) as $Vghfube41qyl) {
            $Vghfube41qylPath = (string) $Vghfube41qyl->textContent;

            if (!$Vghfube41qylPath) {
                continue;
            }

            if ($Vghfube41qyl->hasAttribute('prefix')) {
                $V2hf2uebv5m0 = (string) $Vghfube41qyl->getAttribute('prefix');
            } else {
                $V2hf2uebv5m0 = '';
            }

            if ($Vghfube41qyl->hasAttribute('suffix')) {
                $V52q32upexbe = (string) $Vghfube41qyl->getAttribute('suffix');
            } else {
                $V52q32upexbe = '.php';
            }

            if ($Vghfube41qyl->hasAttribute('group')) {
                $Vsq5adfvkj3r = (string) $Vghfube41qyl->getAttribute('group');
            } else {
                $Vsq5adfvkj3r = 'DEFAULT';
            }

            $Vyzstc3ohmps[] = array(
              'path'   => $this->toAbsolutePath($Vghfube41qylPath),
              'prefix' => $V2hf2uebv5m0,
              'suffix' => $V52q32upexbe,
              'group'  => $Vsq5adfvkj3r
            );
        }

        return $Vyzstc3ohmps;
    }

    
    protected function readFilterFiles($Vfbt3who3l5d)
    {
        $Vpu3xl4uhgg5s = array();

        foreach ($this->xpath->query($Vfbt3who3l5d) as $Vpu3xl4uhgg5) {
            $Vpu3xl4uhgg5Path = (string) $Vpu3xl4uhgg5->textContent;

            if ($Vpu3xl4uhgg5Path) {
                $Vpu3xl4uhgg5s[] = $this->toAbsolutePath($Vpu3xl4uhgg5Path);
            }
        }

        return $Vpu3xl4uhgg5s;
    }

    
    protected function toAbsolutePath($V2bpoh5hagzp, $Vosfxp2jpope = false)
    {
        $V2bpoh5hagzp = trim($V2bpoh5hagzp);

        if ($V2bpoh5hagzp[0] === '/') {
            return $V2bpoh5hagzp;
        }

        
        
        
        
        
        
        
        
        if (defined('PHP_WINDOWS_VERSION_BUILD') &&
            ($V2bpoh5hagzp[0] === '\\' ||
            (strlen($V2bpoh5hagzp) >= 3 && preg_match('#^[A-Z]\:[/\\\]#i', substr($V2bpoh5hagzp, 0, 3))))) {
            return $V2bpoh5hagzp;
        }

        
        if (strpos($V2bpoh5hagzp, '://') !== false) {
            return $V2bpoh5hagzp;
        }

        $Vpu3xl4uhgg5 = dirname($this->filename) . DIRECTORY_SEPARATOR . $V2bpoh5hagzp;

        if ($Vosfxp2jpope && !file_exists($Vpu3xl4uhgg5)) {
            $Vdvo2o2gi4j1File = stream_resolve_include_path($V2bpoh5hagzp);

            if ($Vdvo2o2gi4j1File) {
                $Vpu3xl4uhgg5 = $Vdvo2o2gi4j1File;
            }
        }

        return $Vpu3xl4uhgg5;
    }
}
