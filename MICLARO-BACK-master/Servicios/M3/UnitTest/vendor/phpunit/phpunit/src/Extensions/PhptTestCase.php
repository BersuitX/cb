<?php



class PHPUnit_Extensions_PhptTestCase implements PHPUnit_Framework_Test, PHPUnit_Framework_SelfDescribing
{
    
    private $Va3qqb0vgkhy;

    
    private $Vgzibbh1fx1x = array(
        'allow_url_fopen=1',
        'auto_append_file=',
        'auto_prepend_file=',
        'disable_functions=',
        'display_errors=1',
        'docref_root=',
        'docref_ext=.html',
        'error_append_string=',
        'error_prepend_string=',
        'error_reporting=-1',
        'html_errors=0',
        'log_errors=0',
        'magic_quotes_runtime=0',
        'output_handler=',
        'open_basedir=',
        'output_buffering=Off',
        'report_memleaks=0',
        'report_zend_debug=0',
        'safe_mode=0',
        'track_errors=1',
        'xdebug.default_enable=0'
    );

    
    public function __construct($Va3qqb0vgkhy)
    {
        if (!is_string($Va3qqb0vgkhy)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_file($Va3qqb0vgkhy)) {
            throw new PHPUnit_Framework_Exception(
                sprintf(
                    'File "%s" does not exist.',
                    $Va3qqb0vgkhy
                )
            );
        }

        $Vuvamk1vhxxdhis->filename = $Va3qqb0vgkhy;
    }

    
    public function count()
    {
        return 1;
    }

    
    public function run(PHPUnit_Framework_TestResult $Vv0hyvhlkjqr = null)
    {
        $Vgc5bzmsijyh = $Vuvamk1vhxxdhis->parse();
        $V5kll1klco0v     = $Vuvamk1vhxxdhis->render($Vgc5bzmsijyh['FILE']);

        if ($Vv0hyvhlkjqr === null) {
            $Vv0hyvhlkjqr = new PHPUnit_Framework_TestResult;
        }

        $Vkyiqtoxqbdy      = PHPUnit_Util_PHP::factory();
        $Vaw1q5kfrk3y     = false;
        $Vlbwbnl10iav     = 0;
        $Vgzibbh1fx1x = $Vuvamk1vhxxdhis->settings;

        $Vv0hyvhlkjqr->startTest($Vuvamk1vhxxdhis);

        if (isset($Vgc5bzmsijyh['INI'])) {
            $Vgzibbh1fx1x = array_merge($Vgzibbh1fx1x, $Vuvamk1vhxxdhis->parseIniSection($Vgc5bzmsijyh['INI']));
        }

        if (isset($Vgc5bzmsijyh['SKIPIF'])) {
            $Vw53rgcxevao = $Vkyiqtoxqbdy->runJob($Vgc5bzmsijyh['SKIPIF'], $Vgzibbh1fx1x);

            if (!strncasecmp('skip', ltrim($Vw53rgcxevao['stdout']), 4)) {
                if (preg_match('/^\s*skip\s*(.+)\s*/i', $Vw53rgcxevao['stdout'], $Vbl4yrmdan1y)) {
                    $Vbl4yrmdan1y = substr($Vbl4yrmdan1y[1], 2);
                } else {
                    $Vbl4yrmdan1y = '';
                }

                $Vv0hyvhlkjqr->addFailure($Vuvamk1vhxxdhis, new PHPUnit_Framework_SkippedTestError($Vbl4yrmdan1y), 0);

                $Vaw1q5kfrk3y = true;
            }
        }

        if (!$Vaw1q5kfrk3y) {
            PHP_Timer::start();
            $Vw53rgcxevao = $Vkyiqtoxqbdy->runJob($V5kll1klco0v, $Vgzibbh1fx1x);
            $Vlbwbnl10iav      = PHP_Timer::stop();

            if (isset($Vgc5bzmsijyh['EXPECT'])) {
                $Vjtkrkc5dxqg = 'assertEquals';
                $Vwcb1oykhumm  = $Vgc5bzmsijyh['EXPECT'];
            } else {
                $Vjtkrkc5dxqg = 'assertStringMatchesFormat';
                $Vwcb1oykhumm  = $Vgc5bzmsijyh['EXPECTF'];
            }

            $Vvaiuwffullu   = preg_replace('/\r\n/', "\n", trim($Vw53rgcxevao['stdout']));
            $Vwcb1oykhumm = preg_replace('/\r\n/', "\n", trim($Vwcb1oykhumm));

            try {
                PHPUnit_Framework_Assert::$Vjtkrkc5dxqg($Vwcb1oykhumm, $Vvaiuwffullu);
            } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
                $Vv0hyvhlkjqr->addFailure($Vuvamk1vhxxdhis, $Vpt32vvhspnv, $Vlbwbnl10iav);
            } catch (Throwable $Vuvamk1vhxxd) {
                $Vv0hyvhlkjqr->addError($Vuvamk1vhxxdhis, $Vuvamk1vhxxd, $Vlbwbnl10iav);
            } catch (Exception $Vpt32vvhspnv) {
                $Vv0hyvhlkjqr->addError($Vuvamk1vhxxdhis, $Vpt32vvhspnv, $Vlbwbnl10iav);
            }
        }

        $Vv0hyvhlkjqr->endTest($Vuvamk1vhxxdhis, $Vlbwbnl10iav);

        return $Vv0hyvhlkjqr;
    }

    
    public function getName()
    {
        return $Vuvamk1vhxxdhis->toString();
    }

    
    public function toString()
    {
        return $Vuvamk1vhxxdhis->filename;
    }

    
    private function parse()
    {
        $Vgc5bzmsijyh = array();
        $Vp2b3wxyxfou  = '';

        foreach (file($Vuvamk1vhxxdhis->filename) as $Vrwsmtja4f2j) {
            if (preg_match('/^--([_A-Z]+)--/', $Vrwsmtja4f2j, $Vv0hyvhlkjqr)) {
                $Vp2b3wxyxfou            = $Vv0hyvhlkjqr[1];
                $Vgc5bzmsijyh[$Vp2b3wxyxfou] = '';
                continue;
            } elseif (empty($Vp2b3wxyxfou)) {
                throw new PHPUnit_Framework_Exception('Invalid PHPT file');
            }

            $Vgc5bzmsijyh[$Vp2b3wxyxfou] .= $Vrwsmtja4f2j;
        }

        if (!isset($Vgc5bzmsijyh['FILE']) ||
            (!isset($Vgc5bzmsijyh['EXPECT']) && !isset($Vgc5bzmsijyh['EXPECTF']))) {
            throw new PHPUnit_Framework_Exception('Invalid PHPT file');
        }

        return $Vgc5bzmsijyh;
    }

    
    private function render($V5kll1klco0v)
    {
        return str_replace(
            array(
            '__DIR__',
            '__FILE__'
            ),
            array(
            "'" . dirname($Vuvamk1vhxxdhis->filename) . "'",
            "'" . $Vuvamk1vhxxdhis->filename . "'"
            ),
            $V5kll1klco0v
        );
    }

    
    protected function parseIniSection($Vjdkyvjsoqdn)
    {
        return preg_split('/\n|\r/', $Vjdkyvjsoqdn, -1, PREG_SPLIT_NO_EMPTY);
    }
}
