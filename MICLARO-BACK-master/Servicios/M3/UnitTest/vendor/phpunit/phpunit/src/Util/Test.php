<?php


if (!function_exists('trait_exists')) {
    function trait_exists($Vt0hgvwnxauq, $Vbzbu05r0wfv = true)
    {
        return false;
    }
}


class PHPUnit_Util_Test
{
    const REGEX_DATA_PROVIDER      = '/@dataProvider\s+([a-zA-Z0-9._:-\\\\x7f-\xff]+)/';
    const REGEX_TEST_WITH          = '/@testWith\s+/';
    const REGEX_EXPECTED_EXCEPTION = '(@expectedException\s+([:.\w\\\\x7f-\xff]+)(?:[\t ]+(\S*))?(?:[\t ]+(\S*))?\s*$)m';
    const REGEX_REQUIRES_VERSION   = '/@requires\s+(?P<name>PHP(?:Unit)?)\s+(?P<value>[\d\.-]+(dev|(RC|alpha|beta)[\d\.])?)[ \t]*\r?$/m';
    const REGEX_REQUIRES_OS        = '/@requires\s+OS\s+(?P<value>.+?)[ \t]*\r?$/m';
    const REGEX_REQUIRES           = '/@requires\s+(?P<name>function|extension)\s+(?P<value>([^ ]+?))[ \t]*\r?$/m';

    const UNKNOWN = -1;
    const SMALL   = 0;
    const MEDIUM  = 1;
    const LARGE   = 2;

    private static $Vg5ziqegvksp = array();

    private static $Vvq52l1ahlwn = array();

    
    public static function describe(PHPUnit_Framework_Test $Vpswbntjg3pr, $Vmlbtxzqe4g3 = true)
    {
        if ($Vmlbtxzqe4g3) {
            if ($Vpswbntjg3pr instanceof PHPUnit_Framework_SelfDescribing) {
                return $Vpswbntjg3pr->toString();
            } else {
                return get_class($Vpswbntjg3pr);
            }
        } else {
            if ($Vpswbntjg3pr instanceof PHPUnit_Framework_TestCase) {
                return array(
                  get_class($Vpswbntjg3pr), $Vpswbntjg3pr->getName()
                );
            } elseif ($Vpswbntjg3pr instanceof PHPUnit_Framework_SelfDescribing) {
                return array('', $Vpswbntjg3pr->toString());
            } else {
                return array('', get_class($Vpswbntjg3pr));
            }
        }
    }

    
    public static function getLinesToBeCovered($Vh0iae5cev4i, $Vc1exo5hbki5)
    {
        $Vqececac1ouq = self::parseTestMethodAnnotations(
            $Vh0iae5cev4i,
            $Vc1exo5hbki5
        );

        if (isset($Vqececac1ouq['class']['coversNothing']) || isset($Vqececac1ouq['method']['coversNothing'])) {
            return false;
        }

        return self::getLinesToBeCoveredOrUsed($Vh0iae5cev4i, $Vc1exo5hbki5, 'covers');
    }

    
    public static function getLinesToBeUsed($Vh0iae5cev4i, $Vc1exo5hbki5)
    {
        return self::getLinesToBeCoveredOrUsed($Vh0iae5cev4i, $Vc1exo5hbki5, 'uses');
    }

    
    private static function getLinesToBeCoveredOrUsed($Vh0iae5cev4i, $Vc1exo5hbki5, $V4ci5ldaqb4a)
    {
        $Vqececac1ouq = self::parseTestMethodAnnotations(
            $Vh0iae5cev4i,
            $Vc1exo5hbki5
        );

        $Vabccyhyrbqu = null;

        if (!empty($Vqececac1ouq['class'][$V4ci5ldaqb4a . 'DefaultClass'])) {
            if (count($Vqececac1ouq['class'][$V4ci5ldaqb4a . 'DefaultClass']) > 1) {
                throw new PHPUnit_Framework_CodeCoverageException(
                    sprintf(
                        'More than one @%sClass annotation in class or interface "%s".',
                        $V4ci5ldaqb4a,
                        $Vh0iae5cev4i
                    )
                );
            }

            $Vabccyhyrbqu = $Vqececac1ouq['class'][$V4ci5ldaqb4a . 'DefaultClass'][0];
        }

        $Vautxf03llyt = array();

        if (isset($Vqececac1ouq['class'][$V4ci5ldaqb4a])) {
            $Vautxf03llyt = $Vqececac1ouq['class'][$V4ci5ldaqb4a];
        }

        if (isset($Vqececac1ouq['method'][$V4ci5ldaqb4a])) {
            $Vautxf03llyt = array_merge($Vautxf03llyt, $Vqececac1ouq['method'][$V4ci5ldaqb4a]);
        }

        $Vrremcigosxy = array();

        foreach (array_unique($Vautxf03llyt) as $Vbzemolr5akx) {
            if ($Vabccyhyrbqu && strncmp($Vbzemolr5akx, '::', 2) === 0) {
                $Vbzemolr5akx = $Vabccyhyrbqu . $Vbzemolr5akx;
            }

            $Vbzemolr5akx = preg_replace('/[\s()]+$/', '', $Vbzemolr5akx);
            $Vbzemolr5akx = explode(' ', $Vbzemolr5akx);
            $Vbzemolr5akx = $Vbzemolr5akx[0];

            $Vrremcigosxy = array_merge(
                $Vrremcigosxy,
                self::resolveElementToReflectionObjects($Vbzemolr5akx)
            );
        }

        return self::resolveReflectionObjectsToLines($Vrremcigosxy);
    }

    
    public static function getRequirements($Vh0iae5cev4i, $Vc1exo5hbki5)
    {
        $Vf4nbpoij40n  = new ReflectionClass($Vh0iae5cev4i);
        $Vcvn1sexkvds = $Vf4nbpoij40n->getDocComment();
        $Vf4nbpoij40n  = new ReflectionMethod($Vh0iae5cev4i, $Vc1exo5hbki5);
        $Vcvn1sexkvds .= "\n" . $Vf4nbpoij40n->getDocComment();
        $Vcknggt0oowx   = array();

        if ($Vdbkece3gnp5 = preg_match_all(self::REGEX_REQUIRES_OS, $Vcvn1sexkvds, $Virbphhh55ue)) {
            $Vcknggt0oowx['OS'] = sprintf(
                '/%s/i',
                addcslashes($Virbphhh55ue['value'][$Vdbkece3gnp5 - 1], '/')
            );
        }
        if ($Vdbkece3gnp5 = preg_match_all(self::REGEX_REQUIRES_VERSION, $Vcvn1sexkvds, $Virbphhh55ue)) {
            for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vdbkece3gnp5; $Vxja1abp34yq++) {
                $Vcknggt0oowx[$Virbphhh55ue['name'][$Vxja1abp34yq]] = $Virbphhh55ue['value'][$Vxja1abp34yq];
            }
        }

        
        $Virbphhh55ue = array();

        if ($Vdbkece3gnp5 = preg_match_all(self::REGEX_REQUIRES, $Vcvn1sexkvds, $Virbphhh55ue)) {
            for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vdbkece3gnp5; $Vxja1abp34yq++) {
                $Vgpjmw221p0b = $Virbphhh55ue['name'][$Vxja1abp34yq] . 's';
                if (!isset($Vcknggt0oowx[$Vgpjmw221p0b])) {
                    $Vcknggt0oowx[$Vgpjmw221p0b] = array();
                }
                $Vcknggt0oowx[$Vgpjmw221p0b][] = $Virbphhh55ue['value'][$Vxja1abp34yq];
            }
        }

        return $Vcknggt0oowx;
    }

    
    public static function getMissingRequirements($Vh0iae5cev4i, $Vc1exo5hbki5)
    {
        $Vap50uf0zo5y = static::getRequirements($Vh0iae5cev4i, $Vc1exo5hbki5);
        $Vdlr1qtjmvlx  = array();

        if (!empty($Vap50uf0zo5y['PHP']) && version_compare(PHP_VERSION, $Vap50uf0zo5y['PHP'], '<')) {
            $Vdlr1qtjmvlx[] = sprintf('PHP %s (or later) is required.', $Vap50uf0zo5y['PHP']);
        }

        if (!empty($Vap50uf0zo5y['PHPUnit'])) {
            $V1fg3khsply4 = PHPUnit_Runner_Version::id();
            if (version_compare($V1fg3khsply4, $Vap50uf0zo5y['PHPUnit'], '<')) {
                $Vdlr1qtjmvlx[] = sprintf('PHPUnit %s (or later) is required.', $Vap50uf0zo5y['PHPUnit']);
            }
        }

        if (!empty($Vap50uf0zo5y['OS']) && !preg_match($Vap50uf0zo5y['OS'], PHP_OS)) {
            $Vdlr1qtjmvlx[] = sprintf('Operating system matching %s is required.', $Vap50uf0zo5y['OS']);
        }

        if (!empty($Vap50uf0zo5y['functions'])) {
            foreach ($Vap50uf0zo5y['functions'] as $Vi5khqarjczp) {
                $Vktjanwmyo04 = explode('::', $Vi5khqarjczp);
                if (2 === count($Vktjanwmyo04) && method_exists($Vktjanwmyo04[0], $Vktjanwmyo04[1])) {
                    continue;
                }
                if (function_exists($Vi5khqarjczp)) {
                    continue;
                }
                $Vdlr1qtjmvlx[] = sprintf('Function %s is required.', $Vi5khqarjczp);
            }
        }

        if (!empty($Vap50uf0zo5y['extensions'])) {
            foreach ($Vap50uf0zo5y['extensions'] as $Vtqzajmybqos) {
                if (!extension_loaded($Vtqzajmybqos)) {
                    $Vdlr1qtjmvlx[] = sprintf('Extension %s is required.', $Vtqzajmybqos);
                }
            }
        }

        return $Vdlr1qtjmvlx;
    }

    
    public static function getExpectedException($Vh0iae5cev4i, $Vc1exo5hbki5)
    {
        $Vf4nbpoij40n  = new ReflectionMethod($Vh0iae5cev4i, $Vc1exo5hbki5);
        $Vcvn1sexkvds = $Vf4nbpoij40n->getDocComment();
        $Vcvn1sexkvds = substr($Vcvn1sexkvds, 3, -2);

        if (preg_match(self::REGEX_EXPECTED_EXCEPTION, $Vcvn1sexkvds, $Virbphhh55ue)) {
            $Vqececac1ouq = self::parseTestMethodAnnotations(
                $Vh0iae5cev4i,
                $Vc1exo5hbki5
            );

            $Vqmu1sajhgfn         = $Virbphhh55ue[1];
            $V5kll1klco0v          = null;
            $Vbl4yrmdan1y       = '';
            $Vbl4yrmdan1yRegExp = '';

            if (isset($Virbphhh55ue[2])) {
                $Vbl4yrmdan1y = trim($Virbphhh55ue[2]);
            } elseif (isset($Vqececac1ouq['method']['expectedExceptionMessage'])) {
                $Vbl4yrmdan1y = self::parseAnnotationContent(
                    $Vqececac1ouq['method']['expectedExceptionMessage'][0]
                );
            }

            if (isset($Vqececac1ouq['method']['expectedExceptionMessageRegExp'])) {
                $Vbl4yrmdan1yRegExp = self::parseAnnotationContent(
                    $Vqececac1ouq['method']['expectedExceptionMessageRegExp'][0]
                );
            }

            if (isset($Virbphhh55ue[3])) {
                $V5kll1klco0v = $Virbphhh55ue[3];
            } elseif (isset($Vqececac1ouq['method']['expectedExceptionCode'])) {
                $V5kll1klco0v = self::parseAnnotationContent(
                    $Vqececac1ouq['method']['expectedExceptionCode'][0]
                );
            }

            if (is_numeric($V5kll1klco0v)) {
                $V5kll1klco0v = (int) $V5kll1klco0v;
            } elseif (is_string($V5kll1klco0v) && defined($V5kll1klco0v)) {
                $V5kll1klco0v = (int) constant($V5kll1klco0v);
            }

            return array(
              'class' => $Vqmu1sajhgfn, 'code' => $V5kll1klco0v, 'message' => $Vbl4yrmdan1y, 'message_regex' => $Vbl4yrmdan1yRegExp
            );
        }

        return false;
    }

    
    private static function parseAnnotationContent($Vbl4yrmdan1y)
    {
        if (strpos($Vbl4yrmdan1y, '::') !== false && count(explode('::', $Vbl4yrmdan1y)) == 2) {
            if (defined($Vbl4yrmdan1y)) {
                $Vbl4yrmdan1y = constant($Vbl4yrmdan1y);
            }
        }

        return $Vbl4yrmdan1y;
    }

    
    public static function getProvidedData($Vh0iae5cev4i, $Vc1exo5hbki5)
    {
        $Vf4nbpoij40n  = new ReflectionMethod($Vh0iae5cev4i, $Vc1exo5hbki5);
        $Vcvn1sexkvds = $Vf4nbpoij40n->getDocComment();

        $Vqhzkfsafzrc = self::getDataFromDataProviderAnnotation($Vcvn1sexkvds, $Vh0iae5cev4i, $Vc1exo5hbki5);

        if ($Vqhzkfsafzrc === null) {
            $Vqhzkfsafzrc = self::getDataFromTestWithAnnotation($Vcvn1sexkvds);
        }

        if (is_array($Vqhzkfsafzrc) && empty($Vqhzkfsafzrc)) {
            throw new PHPUnit_Framework_SkippedTestError;
        }

        if ($Vqhzkfsafzrc !== null) {
            if (is_object($Vqhzkfsafzrc)) {
                $Vqhzkfsafzrc = iterator_to_array($Vqhzkfsafzrc);
            }

            foreach ($Vqhzkfsafzrc as $Vlpbz5aloxqt => $Vcptarsq5qe4) {
                if (!is_array($Vcptarsq5qe4)) {
                    throw new PHPUnit_Framework_Exception(
                        sprintf(
                            'Data set %s is invalid.',
                            is_int($Vlpbz5aloxqt) ? '#' . $Vlpbz5aloxqt : '"' . $Vlpbz5aloxqt . '"'
                        )
                    );
                }
            }
        }

        return $Vqhzkfsafzrc;
    }

    
    private static function getDataFromDataProviderAnnotation($Vcvn1sexkvds, $Vh0iae5cev4i, $Vc1exo5hbki5)
    {
        if (preg_match(self::REGEX_DATA_PROVIDER, $Vcvn1sexkvds, $Virbphhh55ue)) {
            $VqhzkfsafzrcProviderMethodNameNamespace = explode('\\', $Virbphhh55ue[1]);
            $Vi0sbzlkbro4                            = explode('::', array_pop($VqhzkfsafzrcProviderMethodNameNamespace));
            $VqhzkfsafzrcProviderMethodName          = array_pop($Vi0sbzlkbro4);

            if (!empty($VqhzkfsafzrcProviderMethodNameNamespace)) {
                $VqhzkfsafzrcProviderMethodNameNamespace = implode('\\', $VqhzkfsafzrcProviderMethodNameNamespace) . '\\';
            } else {
                $VqhzkfsafzrcProviderMethodNameNamespace = '';
            }

            if (!empty($Vi0sbzlkbro4)) {
                $VqhzkfsafzrcProviderClassName = $VqhzkfsafzrcProviderMethodNameNamespace . array_pop($Vi0sbzlkbro4);
            } else {
                $VqhzkfsafzrcProviderClassName = $Vh0iae5cev4i;
            }

            $VqhzkfsafzrcProviderClass  = new ReflectionClass($VqhzkfsafzrcProviderClassName);
            $VqhzkfsafzrcProviderMethod = $VqhzkfsafzrcProviderClass->getMethod(
                $VqhzkfsafzrcProviderMethodName
            );

            if ($VqhzkfsafzrcProviderMethod->isStatic()) {
                $Vbj3pw2f5egf = null;
            } else {
                $Vbj3pw2f5egf = $VqhzkfsafzrcProviderClass->newInstance();
            }

            if ($VqhzkfsafzrcProviderMethod->getNumberOfParameters() == 0) {
                $Vqhzkfsafzrc = $VqhzkfsafzrcProviderMethod->invoke($Vbj3pw2f5egf);
            } else {
                $Vqhzkfsafzrc = $VqhzkfsafzrcProviderMethod->invoke($Vbj3pw2f5egf, $Vc1exo5hbki5);
            }

            return $Vqhzkfsafzrc;
        }
    }

    
    public static function getDataFromTestWithAnnotation($Vcvn1sexkvds)
    {
        $Vcvn1sexkvds = self::cleanUpMultiLineAnnotation($Vcvn1sexkvds);

        if (preg_match(self::REGEX_TEST_WITH, $Vcvn1sexkvds, $Virbphhh55ue, PREG_OFFSET_CAPTURE)) {
            $V5peram4ncbv            = strlen($Virbphhh55ue[0][0]) + $Virbphhh55ue[0][1];
            $Vxpqvubytcah = substr($Vcvn1sexkvds, $V5peram4ncbv);
            $Vqhzkfsafzrc              = array();

            foreach (explode("\n", $Vxpqvubytcah) as $V4hubi33brvb) {
                $V4hubi33brvb = trim($V4hubi33brvb);

                if ($V4hubi33brvb[0] !== '[') {
                    break;
                }

                $VqhzkfsafzrcSet = json_decode($V4hubi33brvb, true);

                if (json_last_error() != JSON_ERROR_NONE) {
                    $Vpsm42ro4mkq = function_exists('json_last_error_msg') ? json_last_error_msg() : json_last_error();

                    throw new PHPUnit_Framework_Exception(
                        'The dataset for the @testWith annotation cannot be parsed: ' . $Vpsm42ro4mkq
                    );
                }

                $Vqhzkfsafzrc[] = $VqhzkfsafzrcSet;
            }

            if (!$Vqhzkfsafzrc) {
                throw new PHPUnit_Framework_Exception('The dataset for the @testWith annotation cannot be parsed.');
            }

            return $Vqhzkfsafzrc;
        }
    }

    private static function cleanUpMultiLineAnnotation($Vcvn1sexkvds)
    {
        
        $Vcvn1sexkvds = preg_replace('/' . '\n' . '\s*' . '\*' . '\s?' . '/', "\n", $Vcvn1sexkvds);
        $Vcvn1sexkvds = substr($Vcvn1sexkvds, 0, -1);
        $Vcvn1sexkvds = rtrim($Vcvn1sexkvds, "\n");

        return $Vcvn1sexkvds;
    }

    
    public static function parseTestMethodAnnotations($Vh0iae5cev4i, $Vc1exo5hbki5 = '')
    {
        if (!isset(self::$Vg5ziqegvksp[$Vh0iae5cev4i])) {
            $Vqmu1sajhgfn                             = new ReflectionClass($Vh0iae5cev4i);
            self::$Vg5ziqegvksp[$Vh0iae5cev4i] = self::parseAnnotations($Vqmu1sajhgfn->getDocComment());
        }

        if (!empty($Vc1exo5hbki5) && !isset(self::$Vg5ziqegvksp[$Vh0iae5cev4i . '::' . $Vc1exo5hbki5])) {
            try {
                $Vtlfvdwskdge      = new ReflectionMethod($Vh0iae5cev4i, $Vc1exo5hbki5);
                $Vqececac1ouq = self::parseAnnotations($Vtlfvdwskdge->getDocComment());
            } catch (ReflectionException $Vpt32vvhspnv) {
                $Vqececac1ouq = array();
            }
            self::$Vg5ziqegvksp[$Vh0iae5cev4i . '::' . $Vc1exo5hbki5] = $Vqececac1ouq;
        }

        return array(
          'class'  => self::$Vg5ziqegvksp[$Vh0iae5cev4i],
          'method' => !empty($Vc1exo5hbki5) ? self::$Vg5ziqegvksp[$Vh0iae5cev4i . '::' . $Vc1exo5hbki5] : array()
        );
    }

    
    private static function parseAnnotations($Vbr0pcbogll4)
    {
        $Vqececac1ouq = array();
        
        $Vbr0pcbogll4 = substr($Vbr0pcbogll4, 3, -2);

        if (preg_match_all('/@(?P<name>[A-Za-z_-]+)(?:[ \t]+(?P<value>.*?))?[ \t]*\r?$/m', $Vbr0pcbogll4, $Virbphhh55ue)) {
            $Vht3hwgpna0w = count($Virbphhh55ue[0]);

            for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vht3hwgpna0w; ++$Vxja1abp34yq) {
                $Vqececac1ouq[$Virbphhh55ue['name'][$Vxja1abp34yq]][] = $Virbphhh55ue['value'][$Vxja1abp34yq];
            }
        }

        return $Vqececac1ouq;
    }

    
    public static function getBackupSettings($Vh0iae5cev4i, $Vc1exo5hbki5)
    {
        return array(
          'backupGlobals' => self::getBooleanAnnotationSetting(
              $Vh0iae5cev4i,
              $Vc1exo5hbki5,
              'backupGlobals'
          ),
          'backupStaticAttributes' => self::getBooleanAnnotationSetting(
              $Vh0iae5cev4i,
              $Vc1exo5hbki5,
              'backupStaticAttributes'
          )
        );
    }

    
    public static function getDependencies($Vh0iae5cev4i, $Vc1exo5hbki5)
    {
        $Vqececac1ouq = self::parseTestMethodAnnotations(
            $Vh0iae5cev4i,
            $Vc1exo5hbki5
        );

        $Vdym0g0ze30a = array();

        if (isset($Vqececac1ouq['class']['depends'])) {
            $Vdym0g0ze30a = $Vqececac1ouq['class']['depends'];
        }

        if (isset($Vqececac1ouq['method']['depends'])) {
            $Vdym0g0ze30a = array_merge(
                $Vdym0g0ze30a,
                $Vqececac1ouq['method']['depends']
            );
        }

        return array_unique($Vdym0g0ze30a);
    }

    
    public static function getErrorHandlerSettings($Vh0iae5cev4i, $Vc1exo5hbki5)
    {
        return self::getBooleanAnnotationSetting(
            $Vh0iae5cev4i,
            $Vc1exo5hbki5,
            'errorHandler'
        );
    }

    
    public static function getGroups($Vh0iae5cev4i, $Vc1exo5hbki5 = '')
    {
        $Vqececac1ouq = self::parseTestMethodAnnotations(
            $Vh0iae5cev4i,
            $Vc1exo5hbki5
        );

        $V00tm5epe1pm = array();

        if (isset($Vqececac1ouq['method']['author'])) {
            $V00tm5epe1pm = $Vqececac1ouq['method']['author'];
        } elseif (isset($Vqececac1ouq['class']['author'])) {
            $V00tm5epe1pm = $Vqececac1ouq['class']['author'];
        }

        if (isset($Vqececac1ouq['class']['group'])) {
            $V00tm5epe1pm = array_merge($V00tm5epe1pm, $Vqececac1ouq['class']['group']);
        }

        if (isset($Vqececac1ouq['method']['group'])) {
            $V00tm5epe1pm = array_merge($V00tm5epe1pm, $Vqececac1ouq['method']['group']);
        }

        if (isset($Vqececac1ouq['class']['ticket'])) {
            $V00tm5epe1pm = array_merge($V00tm5epe1pm, $Vqececac1ouq['class']['ticket']);
        }

        if (isset($Vqececac1ouq['method']['ticket'])) {
            $V00tm5epe1pm = array_merge($V00tm5epe1pm, $Vqececac1ouq['method']['ticket']);
        }

        foreach (array('method', 'class') as $Vbzemolr5akx) {
            foreach (array('small', 'medium', 'large') as $V5mlu1ykrbu5) {
                if (isset($Vqececac1ouq[$Vbzemolr5akx][$V5mlu1ykrbu5])) {
                    $V00tm5epe1pm[] = $V5mlu1ykrbu5;
                    break 2;
                }

                if (isset($Vqececac1ouq[$Vbzemolr5akx][$V5mlu1ykrbu5])) {
                    $V00tm5epe1pm[] = $V5mlu1ykrbu5;
                    break 2;
                }
            }
        }

        return array_unique($V00tm5epe1pm);
    }

    
    public static function getSize($Vh0iae5cev4i, $Vc1exo5hbki5)
    {
        $V00tm5epe1pm = array_flip(self::getGroups($Vh0iae5cev4i, $Vc1exo5hbki5));
        $V5mlu1ykrbu5   = self::UNKNOWN;
        $Vqmu1sajhgfn  = new ReflectionClass($Vh0iae5cev4i);

        if (isset($V00tm5epe1pm['large']) ||
            (class_exists('PHPUnit_Extensions_Database_TestCase', false) &&
             $Vqmu1sajhgfn->isSubclassOf('PHPUnit_Extensions_Database_TestCase')) ||
            (class_exists('PHPUnit_Extensions_SeleniumTestCase', false) &&
             $Vqmu1sajhgfn->isSubclassOf('PHPUnit_Extensions_SeleniumTestCase'))) {
            $V5mlu1ykrbu5 = self::LARGE;
        } elseif (isset($V00tm5epe1pm['medium'])) {
            $V5mlu1ykrbu5 = self::MEDIUM;
        } elseif (isset($V00tm5epe1pm['small'])) {
            $V5mlu1ykrbu5 = self::SMALL;
        }

        return $V5mlu1ykrbu5;
    }

    
    public static function getTickets($Vh0iae5cev4i, $Vc1exo5hbki5)
    {
        $Vqececac1ouq = self::parseTestMethodAnnotations(
            $Vh0iae5cev4i,
            $Vc1exo5hbki5
        );

        $Vop5v3zrjzhy = array();

        if (isset($Vqececac1ouq['class']['ticket'])) {
            $Vop5v3zrjzhy = $Vqececac1ouq['class']['ticket'];
        }

        if (isset($Vqececac1ouq['method']['ticket'])) {
            $Vop5v3zrjzhy = array_merge($Vop5v3zrjzhy, $Vqececac1ouq['method']['ticket']);
        }

        return array_unique($Vop5v3zrjzhy);
    }

    
    public static function getProcessIsolationSettings($Vh0iae5cev4i, $Vc1exo5hbki5)
    {
        $Vqececac1ouq = self::parseTestMethodAnnotations(
            $Vh0iae5cev4i,
            $Vc1exo5hbki5
        );

        if (isset($Vqececac1ouq['class']['runTestsInSeparateProcesses']) ||
            isset($Vqececac1ouq['method']['runInSeparateProcess'])) {
            return true;
        } else {
            return false;
        }
    }

    
    public static function getPreserveGlobalStateSettings($Vh0iae5cev4i, $Vc1exo5hbki5)
    {
        return self::getBooleanAnnotationSetting(
            $Vh0iae5cev4i,
            $Vc1exo5hbki5,
            'preserveGlobalState'
        );
    }

    
    public static function getHookMethods($Vh0iae5cev4i)
    {
        if (!class_exists($Vh0iae5cev4i, false)) {
            return self::emptyHookMethodsArray();
        }

        if (!isset(self::$Vvq52l1ahlwn[$Vh0iae5cev4i])) {
            self::$Vvq52l1ahlwn[$Vh0iae5cev4i] = self::emptyHookMethodsArray();

            try {
                $Vqmu1sajhgfn = new ReflectionClass($Vh0iae5cev4i);

                foreach ($Vqmu1sajhgfn->getMethods() as $Vtlfvdwskdge) {
                    if (self::isBeforeClassMethod($Vtlfvdwskdge)) {
                        self::$Vvq52l1ahlwn[$Vh0iae5cev4i]['beforeClass'][] = $Vtlfvdwskdge->getName();
                    }

                    if (self::isBeforeMethod($Vtlfvdwskdge)) {
                        self::$Vvq52l1ahlwn[$Vh0iae5cev4i]['before'][] = $Vtlfvdwskdge->getName();
                    }

                    if (self::isAfterMethod($Vtlfvdwskdge)) {
                        self::$Vvq52l1ahlwn[$Vh0iae5cev4i]['after'][] = $Vtlfvdwskdge->getName();
                    }

                    if (self::isAfterClassMethod($Vtlfvdwskdge)) {
                        self::$Vvq52l1ahlwn[$Vh0iae5cev4i]['afterClass'][] = $Vtlfvdwskdge->getName();
                    }
                }
            } catch (ReflectionException $Vpt32vvhspnv) {
            }
        }

        return self::$Vvq52l1ahlwn[$Vh0iae5cev4i];
    }

    
    private static function emptyHookMethodsArray()
    {
        return array(
            'beforeClass' => array('setUpBeforeClass'),
            'before'      => array('setUp'),
            'after'       => array('tearDown'),
            'afterClass'  => array('tearDownAfterClass')
        );
    }

    
    private static function getBooleanAnnotationSetting($Vh0iae5cev4i, $Vc1exo5hbki5, $Vfe0cvbctj45)
    {
        $Vqececac1ouq = self::parseTestMethodAnnotations(
            $Vh0iae5cev4i,
            $Vc1exo5hbki5
        );

        $Vv0hyvhlkjqr = null;

        if (isset($Vqececac1ouq['class'][$Vfe0cvbctj45])) {
            if ($Vqececac1ouq['class'][$Vfe0cvbctj45][0] == 'enabled') {
                $Vv0hyvhlkjqr = true;
            } elseif ($Vqececac1ouq['class'][$Vfe0cvbctj45][0] == 'disabled') {
                $Vv0hyvhlkjqr = false;
            }
        }

        if (isset($Vqececac1ouq['method'][$Vfe0cvbctj45])) {
            if ($Vqececac1ouq['method'][$Vfe0cvbctj45][0] == 'enabled') {
                $Vv0hyvhlkjqr = true;
            } elseif ($Vqececac1ouq['method'][$Vfe0cvbctj45][0] == 'disabled') {
                $Vv0hyvhlkjqr = false;
            }
        }

        return $Vv0hyvhlkjqr;
    }

    
    private static function resolveElementToReflectionObjects($Vbzemolr5akx)
    {
        $V5kll1klco0vToCoverList = array();

        if (strpos($Vbzemolr5akx, '\\') !== false && function_exists($Vbzemolr5akx)) {
            $V5kll1klco0vToCoverList[] = new ReflectionFunction($Vbzemolr5akx);
        } elseif (strpos($Vbzemolr5akx, '::') !== false) {
            list($Vh0iae5cev4i, $Vc1exo5hbki5) = explode('::', $Vbzemolr5akx);

            if (isset($Vc1exo5hbki5[0]) && $Vc1exo5hbki5[0] == '<') {
                $Vqmu1sajhgfnes = array($Vh0iae5cev4i);

                foreach ($Vqmu1sajhgfnes as $Vh0iae5cev4i) {
                    if (!class_exists($Vh0iae5cev4i) &&
                        !interface_exists($Vh0iae5cev4i)) {
                        throw new PHPUnit_Framework_InvalidCoversTargetException(
                            sprintf(
                                'Trying to @cover or @use not existing class or ' .
                                'interface "%s".',
                                $Vh0iae5cev4i
                            )
                        );
                    }

                    $Vqmu1sajhgfn   = new ReflectionClass($Vh0iae5cev4i);
                    $Vtlfvdwskdges = $Vqmu1sajhgfn->getMethods();
                    $Vxja1abp34yqnverse = isset($Vc1exo5hbki5[1]) && $Vc1exo5hbki5[1] == '!';

                    if (strpos($Vc1exo5hbki5, 'protected')) {
                        $Vo3cmnhpplip = 'isProtected';
                    } elseif (strpos($Vc1exo5hbki5, 'private')) {
                        $Vo3cmnhpplip = 'isPrivate';
                    } elseif (strpos($Vc1exo5hbki5, 'public')) {
                        $Vo3cmnhpplip = 'isPublic';
                    }

                    foreach ($Vtlfvdwskdges as $Vtlfvdwskdge) {
                        if ($Vxja1abp34yqnverse && !$Vtlfvdwskdge->$Vo3cmnhpplip()) {
                            $V5kll1klco0vToCoverList[] = $Vtlfvdwskdge;
                        } elseif (!$Vxja1abp34yqnverse && $Vtlfvdwskdge->$Vo3cmnhpplip()) {
                            $V5kll1klco0vToCoverList[] = $Vtlfvdwskdge;
                        }
                    }
                }
            } else {
                $Vqmu1sajhgfnes = array($Vh0iae5cev4i);

                foreach ($Vqmu1sajhgfnes as $Vh0iae5cev4i) {
                    if ($Vh0iae5cev4i == '' && function_exists($Vc1exo5hbki5)) {
                        $V5kll1klco0vToCoverList[] = new ReflectionFunction(
                            $Vc1exo5hbki5
                        );
                    } else {
                        if (!((class_exists($Vh0iae5cev4i) ||
                               interface_exists($Vh0iae5cev4i) ||
                               trait_exists($Vh0iae5cev4i)) &&
                              method_exists($Vh0iae5cev4i, $Vc1exo5hbki5))) {
                            throw new PHPUnit_Framework_InvalidCoversTargetException(
                                sprintf(
                                    'Trying to @cover or @use not existing method "%s::%s".',
                                    $Vh0iae5cev4i,
                                    $Vc1exo5hbki5
                                )
                            );
                        }

                        $V5kll1klco0vToCoverList[] = new ReflectionMethod(
                            $Vh0iae5cev4i,
                            $Vc1exo5hbki5
                        );
                    }
                }
            }
        } else {
            $Vpt32vvhspnvxtended = false;

            if (strpos($Vbzemolr5akx, '<extended>') !== false) {
                $Vbzemolr5akx  = str_replace('<extended>', '', $Vbzemolr5akx);
                $Vpt32vvhspnvxtended = true;
            }

            $Vqmu1sajhgfnes = array($Vbzemolr5akx);

            if ($Vpt32vvhspnvxtended) {
                $Vqmu1sajhgfnes = array_merge(
                    $Vqmu1sajhgfnes,
                    class_implements($Vbzemolr5akx),
                    class_parents($Vbzemolr5akx)
                );
            }

            foreach ($Vqmu1sajhgfnes as $Vh0iae5cev4i) {
                if (!class_exists($Vh0iae5cev4i) &&
                    !interface_exists($Vh0iae5cev4i) &&
                    !trait_exists($Vh0iae5cev4i)) {
                    throw new PHPUnit_Framework_InvalidCoversTargetException(
                        sprintf(
                            'Trying to @cover or @use not existing class or ' .
                            'interface "%s".',
                            $Vh0iae5cev4i
                        )
                    );
                }

                $V5kll1klco0vToCoverList[] = new ReflectionClass($Vh0iae5cev4i);
            }
        }

        return $V5kll1klco0vToCoverList;
    }

    
    private static function resolveReflectionObjectsToLines(array $Vf4nbpoij40ns)
    {
        $Vv0hyvhlkjqr = array();

        foreach ($Vf4nbpoij40ns as $Vf4nbpoij40n) {
            $Va3qqb0vgkhy = $Vf4nbpoij40n->getFileName();

            if (!isset($Vv0hyvhlkjqr[$Va3qqb0vgkhy])) {
                $Vv0hyvhlkjqr[$Va3qqb0vgkhy] = array();
            }

            $Vv0hyvhlkjqr[$Va3qqb0vgkhy] = array_unique(
                array_merge(
                    $Vv0hyvhlkjqr[$Va3qqb0vgkhy],
                    range($Vf4nbpoij40n->getStartLine(), $Vf4nbpoij40n->getEndLine())
                )
            );
        }

        return $Vv0hyvhlkjqr;
    }

    
    private static function isBeforeClassMethod(ReflectionMethod $Vtlfvdwskdge)
    {
        return $Vtlfvdwskdge->isStatic() && strpos($Vtlfvdwskdge->getDocComment(), '@beforeClass') !== false;
    }

    
    private static function isBeforeMethod(ReflectionMethod $Vtlfvdwskdge)
    {
        return preg_match('/@before\b/', $Vtlfvdwskdge->getDocComment());
    }

    
    private static function isAfterClassMethod(ReflectionMethod $Vtlfvdwskdge)
    {
        return $Vtlfvdwskdge->isStatic() && strpos($Vtlfvdwskdge->getDocComment(), '@afterClass') !== false;
    }

    
    private static function isAfterMethod(ReflectionMethod $Vtlfvdwskdge)
    {
        return preg_match('/@after\b/', $Vtlfvdwskdge->getDocComment());
    }
}
