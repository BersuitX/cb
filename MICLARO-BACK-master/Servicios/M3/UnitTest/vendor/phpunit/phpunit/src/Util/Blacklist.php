<?php



class PHPUnit_Util_Blacklist
{
    
    public static $V0sraegdxyyl = array(
        'File_Iterator'                              => 1,
        'PHP_CodeCoverage'                           => 1,
        'PHP_Invoker'                                => 1,
        'PHP_Timer'                                  => 1,
        'PHP_Token'                                  => 1,
        'PHPUnit_Framework_TestCase'                 => 2,
        'PHPUnit_Extensions_Database_TestCase'       => 2,
        'PHPUnit_Framework_MockObject_Generator'     => 2,
        'PHPUnit_Extensions_SeleniumTestCase'        => 2,
        'Text_Template'                              => 1,
        'Symfony\Component\Yaml\Yaml'                => 1,
        'SebastianBergmann\Diff\Diff'                => 1,
        'SebastianBergmann\Environment\Runtime'      => 1,
        'SebastianBergmann\Comparator\Comparator'    => 1,
        'SebastianBergmann\Exporter\Exporter'        => 1,
        'SebastianBergmann\GlobalState\Snapshot'     => 1,
        'SebastianBergmann\RecursionContext\Context' => 1,
        'SebastianBergmann\Version'                  => 1,
        'Composer\Autoload\ClassLoader'              => 1,
        'Doctrine\Instantiator\Instantiator'         => 1,
        'phpDocumentor\Reflection\DocBlock'          => 1,
        'Prophecy\Prophet'                           => 1
    );

    
    private static $Vyzstc3ohmps;

    
    public function getBlacklistedDirectories()
    {
        $this->initialize();

        return self::$Vyzstc3ohmps;
    }

    
    public function isBlacklisted($Vpu3xl4uhgg5)
    {
        if (defined('PHPUNIT_TESTSUITE')) {
            return false;
        }

        $this->initialize();

        foreach (self::$Vyzstc3ohmps as $Vghfube41qyl) {
            if (strpos($Vpu3xl4uhgg5, $Vghfube41qyl) === 0) {
                return true;
            }
        }

        return false;
    }

    private function initialize()
    {
        if (self::$Vyzstc3ohmps === null) {
            self::$Vyzstc3ohmps = array();

            foreach (self::$V0sraegdxyyl as $Vh0iae5cev4i => $Vz4c1zo3dvrb) {
                if (!class_exists($Vh0iae5cev4i)) {
                    continue;
                }

                $Vf4nbpoij40n = new ReflectionClass($Vh0iae5cev4i);
                $Vghfube41qyl = $Vf4nbpoij40n->getFileName();

                for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vz4c1zo3dvrb; $Vxja1abp34yq++) {
                    $Vghfube41qyl = dirname($Vghfube41qyl);
                }

                self::$Vyzstc3ohmps[] = $Vghfube41qyl;
            }

            
            
            
            if (DIRECTORY_SEPARATOR === '\\') {
                
                
                self::$Vyzstc3ohmps[] = sys_get_temp_dir() . '\\PHP';
            }
        }
    }
}
