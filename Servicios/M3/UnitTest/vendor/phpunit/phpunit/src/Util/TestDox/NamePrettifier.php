<?php



class PHPUnit_Util_TestDox_NamePrettifier
{
    
    protected $V2hf2uebv5m0 = 'Test';

    
    protected $V52q32upexbe = 'Test';

    
    protected $Vopbw4hgq3hv = array();

    
    public function prettifyTestClass($Vgpjmw221p0b)
    {
        $V3eablqu0h51 = $Vgpjmw221p0b;

        if ($this->suffix !== null &&
            $this->suffix == substr($Vgpjmw221p0b, -1 * strlen($this->suffix))) {
            $V3eablqu0h51 = substr($V3eablqu0h51, 0, strripos($V3eablqu0h51, $this->suffix));
        }

        if ($this->prefix !== null &&
            $this->prefix == substr($Vgpjmw221p0b, 0, strlen($this->prefix))) {
            $V3eablqu0h51 = substr($V3eablqu0h51, strlen($this->prefix));
        }

        if (substr($V3eablqu0h51, 0, 1) == '\\') {
            $V3eablqu0h51 = substr($V3eablqu0h51, 1);
        }

        return $V3eablqu0h51;
    }

    
    public function prettifyTestMethod($Vgpjmw221p0b)
    {
        $Vd3322ljwbqh = '';

        if (!is_string($Vgpjmw221p0b) || strlen($Vgpjmw221p0b) == 0) {
            return $Vd3322ljwbqh;
        }

        $Ve5tcsso230g = preg_replace('#\d+$#', '', $Vgpjmw221p0b, -1, $Vdbkece3gnp5);

        if (in_array($Ve5tcsso230g, $this->strings)) {
            $Vgpjmw221p0b = $Ve5tcsso230g;
        } elseif ($Vdbkece3gnp5 == 0) {
            $this->strings[] = $Ve5tcsso230g;
        }

        if (substr($Vgpjmw221p0b, 0, 4) == 'test') {
            $Vgpjmw221p0b = substr($Vgpjmw221p0b, 4);
        }

        $Vgpjmw221p0b[0] = strtoupper($Vgpjmw221p0b[0]);

        if (strpos($Vgpjmw221p0b, '_') !== false) {
            return trim(str_replace('_', ' ', $Vgpjmw221p0b));
        }

        $Vbulqadoj2ef        = strlen($Vgpjmw221p0b);
        $Vxgaamenw51g = false;

        for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vbulqadoj2ef; $Vxja1abp34yq++) {
            if ($Vxja1abp34yq > 0 &&
                ord($Vgpjmw221p0b[$Vxja1abp34yq]) >= 65 &&
                ord($Vgpjmw221p0b[$Vxja1abp34yq]) <= 90) {
                $Vd3322ljwbqh .= ' ' . strtolower($Vgpjmw221p0b[$Vxja1abp34yq]);
            } else {
                $Vxja1abp34yqsNumeric = is_numeric($Vgpjmw221p0b[$Vxja1abp34yq]);

                if (!$Vxgaamenw51g && $Vxja1abp34yqsNumeric) {
                    $Vd3322ljwbqh    .= ' ';
                    $Vxgaamenw51g = true;
                }

                if ($Vxgaamenw51g && !$Vxja1abp34yqsNumeric) {
                    $Vxgaamenw51g = false;
                }

                $Vd3322ljwbqh .= $Vgpjmw221p0b[$Vxja1abp34yq];
            }
        }

        return $Vd3322ljwbqh;
    }

    
    public function setPrefix($V2hf2uebv5m0)
    {
        $this->prefix = $V2hf2uebv5m0;
    }

    
    public function setSuffix($V52q32upexbe)
    {
        $this->suffix = $V52q32upexbe;
    }
}
