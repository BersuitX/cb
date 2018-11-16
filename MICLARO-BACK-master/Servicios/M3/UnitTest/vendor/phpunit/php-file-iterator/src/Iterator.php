<?php



class File_Iterator extends FilterIterator
{
    const PREFIX = 0;
    const SUFFIX = 1;

    
    protected $Vj5tuqhgx1hz = array();

    
    protected $Vehrcxivvt4k = array();

    
    protected $Vd0fgqkfpr15 = array();

    
    protected $Vxdqem3iefxu;

    
    public function __construct(Iterator $Vnv250ah4t1q, array $Vj5tuqhgx1hz = array(), array $Vehrcxivvt4k = array(), array $Vd0fgqkfpr15 = array(), $Vxdqem3iefxu = NULL)
    {
        $Vd0fgqkfpr15 = array_filter(array_map('realpath', $Vd0fgqkfpr15));

        if ($Vxdqem3iefxu !== NULL) {
            $Vxdqem3iefxu = realpath($Vxdqem3iefxu);
        }

        if ($Vxdqem3iefxu === FALSE) {
            $Vxdqem3iefxu = NULL;
        } else {
            foreach ($Vd0fgqkfpr15 as &$Vlp0uxr2cduj) {
                $Vlp0uxr2cduj = str_replace($Vxdqem3iefxu, '', $Vlp0uxr2cduj);
            }
        }

        $this->prefixes = $Vehrcxivvt4k;
        $this->suffixes = $Vj5tuqhgx1hz;
        $this->exclude  = $Vd0fgqkfpr15;
        $this->basepath = $Vxdqem3iefxu;

        parent::__construct($Vnv250ah4t1q);
    }

    
    public function accept()
    {
        $Vr1xdnxdcb52  = $this->getInnerIterator()->current();
        $Va3qqb0vgkhy = $Vr1xdnxdcb52->getFilename();
        $Vlzf1ob0wbpj = $Vr1xdnxdcb52->getRealPath();

        if ($this->basepath !== NULL) {
            $Vlzf1ob0wbpj = str_replace($this->basepath, '', $Vlzf1ob0wbpj);
        }

        
        if (preg_match('=/\.[^/]*/=', $Vlzf1ob0wbpj)) {
            return FALSE;
        }

        return $this->acceptPath($Vlzf1ob0wbpj) &&
               $this->acceptPrefix($Va3qqb0vgkhy) &&
               $this->acceptSuffix($Va3qqb0vgkhy);
    }

    
    protected function acceptPath($V2bpoh5hagzp)
    {
        foreach ($this->exclude as $Vd0fgqkfpr15) {
            if (strpos($V2bpoh5hagzp, $Vd0fgqkfpr15) === 0) {
                return FALSE;
            }
        }

        return TRUE;
    }

    
    protected function acceptPrefix($Va3qqb0vgkhy)
    {
        return $this->acceptSubString($Va3qqb0vgkhy, $this->prefixes, self::PREFIX);
    }

    
    protected function acceptSuffix($Va3qqb0vgkhy)
    {
        return $this->acceptSubString($Va3qqb0vgkhy, $this->suffixes, self::SUFFIX);
    }

    
    protected function acceptSubString($Va3qqb0vgkhy, array $Vvhtxo1npsbd, $V31qrja1w0r2)
    {
        if (empty($Vvhtxo1npsbd)) {
            return TRUE;
        }

        $Vpvytx3cjkno = FALSE;

        foreach ($Vvhtxo1npsbd as $Ve5tcsso230g) {
            if (($V31qrja1w0r2 == self::PREFIX && strpos($Va3qqb0vgkhy, $Ve5tcsso230g) === 0) ||
                ($V31qrja1w0r2 == self::SUFFIX &&
                 substr($Va3qqb0vgkhy, -1 * strlen($Ve5tcsso230g)) == $Ve5tcsso230g)) {
                $Vpvytx3cjkno = TRUE;
                break;
            }
        }

        return $Vpvytx3cjkno;
    }
}
