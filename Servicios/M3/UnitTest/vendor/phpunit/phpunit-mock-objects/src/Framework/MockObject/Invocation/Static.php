<?php


use SebastianBergmann\Exporter\Exporter;


class PHPUnit_Framework_MockObject_Invocation_Static implements PHPUnit_Framework_MockObject_Invocation, PHPUnit_Framework_SelfDescribing
{
    
    protected static $Vqq5xqiscylb = array(
      'mysqli'    => true,
      'SQLite'    => true,
      'sqlite3'   => true,
      'tidy'      => true,
      'xmlwriter' => true,
      'xsl'       => true
    );

    
    protected static $Vn5vjasrg5ak = array(
      'Closure',
      'COMPersistHelper',
      'IteratorIterator',
      'RecursiveIteratorIterator',
      'SplFileObject',
      'PDORow',
      'ZipArchive'
    );

    
    public $Vh0iae5cev4i;

    
    public $Vc1exo5hbki5;

    
    public $Vsazp03zrvte;

    
    public function __construct($Vh0iae5cev4i, $Vc1exo5hbki5, array $Vsazp03zrvte, $V1ippfyakgbc = false)
    {
        $this->className  = $Vh0iae5cev4i;
        $this->methodName = $Vc1exo5hbki5;
        $this->parameters = $Vsazp03zrvte;

        if (!$V1ippfyakgbc) {
            return;
        }

        foreach ($this->parameters as $Vlpbz5aloxqt => $Vcptarsq5qe4) {
            if (is_object($Vcptarsq5qe4)) {
                $this->parameters[$Vlpbz5aloxqt] = $this->cloneObject($Vcptarsq5qe4);
            }
        }
    }

    
    public function toString()
    {
        $Vnqoiikqsyp5 = new Exporter;

        return sprintf(
            '%s::%s(%s)',
            $this->className,
            $this->methodName,
            implode(
                ', ',
                array_map(
                    array($Vnqoiikqsyp5, 'shortenedExport'),
                    $this->parameters
                )
            )
        );
    }

    
    protected function cloneObject($Vzxjtibpieyg)
    {
        $Vycbfbnvckeq = null;
        $Vbj3pw2f5egf    = new ReflectionObject($Vzxjtibpieyg);

        
        
        if ($Vbj3pw2f5egf->isInternal() &&
            isset(self::$Vqq5xqiscylb[$Vbj3pw2f5egf->getExtensionName()])) {
            $Vycbfbnvckeq = false;
        }

        if ($Vycbfbnvckeq === null) {
            foreach (self::$Vn5vjasrg5ak as $Vqmu1sajhgfn) {
                if ($Vzxjtibpieyg instanceof $Vqmu1sajhgfn) {
                    $Vycbfbnvckeq = false;
                    break;
                }
            }
        }

        if ($Vycbfbnvckeq === null && method_exists($Vbj3pw2f5egf, 'isCloneable')) {
            $Vycbfbnvckeq = $Vbj3pw2f5egf->isCloneable();
        }

        if ($Vycbfbnvckeq === null && $Vbj3pw2f5egf->hasMethod('__clone')) {
            $Vtlfvdwskdge    = $Vbj3pw2f5egf->getMethod('__clone');
            $Vycbfbnvckeq = $Vtlfvdwskdge->isPublic();
        }

        if ($Vycbfbnvckeq === null) {
            $Vycbfbnvckeq = true;
        }

        if ($Vycbfbnvckeq) {
            try {
                return clone $Vzxjtibpieyg;
            } catch (Exception $Vpt32vvhspnv) {
                return $Vzxjtibpieyg;
            }
        } else {
            return $Vzxjtibpieyg;
        }
    }
}
