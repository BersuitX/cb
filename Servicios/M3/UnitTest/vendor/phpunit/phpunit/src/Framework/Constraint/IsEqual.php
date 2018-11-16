<?php



class PHPUnit_Framework_Constraint_IsEqual extends PHPUnit_Framework_Constraint
{
    
    protected $Vcptarsq5qe4;

    
    protected $Vxo5kvys4l4m = 0.0;

    
    protected $Vcv5mgbh5qwg = 10;

    
    protected $Vgxxhufhstfx = false;

    
    protected $V2tcbx0tpkh3 = false;

    
    protected $Vwkaozf1mcmh;

    
    public function __construct($Vcptarsq5qe4, $Vxo5kvys4l4m = 0.0, $Vcv5mgbh5qwg = 10, $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false)
    {
        parent::__construct();

        if (!is_numeric($Vxo5kvys4l4m)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'numeric');
        }

        if (!is_int($Vcv5mgbh5qwg)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(3, 'integer');
        }

        if (!is_bool($Vgxxhufhstfx)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(4, 'boolean');
        }

        if (!is_bool($V2tcbx0tpkh3)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(5, 'boolean');
        }

        $this->value        = $Vcptarsq5qe4;
        $this->delta        = $Vxo5kvys4l4m;
        $this->maxDepth     = $Vcv5mgbh5qwg;
        $this->canonicalize = $Vgxxhufhstfx;
        $this->ignoreCase   = $V2tcbx0tpkh3;
    }

    
    public function evaluate($Vddxcctrvo5d, $Vg24o3v4hbzv = '', $V1mtrtkwdl1m = false)
    {
        
        
        
        if ($this->value === $Vddxcctrvo5d) {
            return true;
        }

        $Vqobgwt1hltw = SebastianBergmann\Comparator\Factory::getInstance();

        try {
            $V23fl2cvtaex = $Vqobgwt1hltw->getComparatorFor(
                $this->value,
                $Vddxcctrvo5d
            );

            $V23fl2cvtaex->assertEquals(
                $this->value,
                $Vddxcctrvo5d,
                $this->delta,
                $this->canonicalize,
                $this->ignoreCase
            );
        } catch (SebastianBergmann\Comparator\ComparisonFailure $Vei44fs011eo) {
            if ($V1mtrtkwdl1m) {
                return false;
            }

            throw new PHPUnit_Framework_ExpectationFailedException(
                trim($Vg24o3v4hbzv . "\n" . $Vei44fs011eo->getMessage()),
                $Vei44fs011eo
            );
        }

        return true;
    }

    
    public function toString()
    {
        $Vxo5kvys4l4m = '';

        if (is_string($this->value)) {
            if (strpos($this->value, "\n") !== false) {
                return 'is equal to <text>';
            } else {
                return sprintf(
                    'is equal to <string:%s>',
                    $this->value
                );
            }
        } else {
            if ($this->delta != 0) {
                $Vxo5kvys4l4m = sprintf(
                    ' with delta <%F>',
                    $this->delta
                );
            }

            return sprintf(
                'is equal to %s%s',
                $this->exporter->export($this->value),
                $Vxo5kvys4l4m
            );
        }
    }
}
