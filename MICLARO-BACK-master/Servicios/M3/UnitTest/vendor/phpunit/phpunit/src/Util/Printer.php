<?php



class PHPUnit_Util_Printer
{
    
    protected $Vnzixzquikoc = false;

    
    protected $Ve0j5uj4lgwz;

    
    protected $Ve0j5uj4lgwzTarget;

    
    protected $Vgmnanxojbfn = false;

    
    public function __construct($Ve0j5uj4lgwz = null)
    {
        if ($Ve0j5uj4lgwz !== null) {
            if (is_string($Ve0j5uj4lgwz)) {
                if (strpos($Ve0j5uj4lgwz, 'socket://') === 0) {
                    $Ve0j5uj4lgwz = explode(':', str_replace('socket://', '', $Ve0j5uj4lgwz));

                    if (sizeof($Ve0j5uj4lgwz) != 2) {
                        throw new PHPUnit_Framework_Exception;
                    }

                    $this->out = fsockopen($Ve0j5uj4lgwz[0], $Ve0j5uj4lgwz[1]);
                } else {
                    if (strpos($Ve0j5uj4lgwz, 'php://') === false &&
                        !is_dir(dirname($Ve0j5uj4lgwz))) {
                        mkdir(dirname($Ve0j5uj4lgwz), 0777, true);
                    }

                    $this->out = fopen($Ve0j5uj4lgwz, 'wt');
                }

                $this->outTarget = $Ve0j5uj4lgwz;
            } else {
                $this->out = $Ve0j5uj4lgwz;
            }
        }
    }

    
    public function flush()
    {
        if ($this->out && strncmp($this->outTarget, 'php://', 6) !== 0) {
            fclose($this->out);
        }

        if ($this->printsHTML === true &&
            $this->outTarget !== null &&
            strpos($this->outTarget, 'php://') !== 0 &&
            strpos($this->outTarget, 'socket://') !== 0 &&
            extension_loaded('tidy')) {
            file_put_contents(
                $this->outTarget,
                tidy_repair_file(
                    $this->outTarget,
                    array('indent' => true, 'wrap' => 0),
                    'utf8'
                )
            );
        }
    }

    
    public function incrementalFlush()
    {
        if ($this->out) {
            fflush($this->out);
        } else {
            flush();
        }
    }

    
    public function write($Vd3322ljwbqh)
    {
        if ($this->out) {
            fwrite($this->out, $Vd3322ljwbqh);

            if ($this->autoFlush) {
                $this->incrementalFlush();
            }
        } else {
            if (PHP_SAPI != 'cli' && PHP_SAPI != 'phpdbg') {
                $Vd3322ljwbqh = htmlspecialchars($Vd3322ljwbqh, ENT_SUBSTITUTE);
            }

            print $Vd3322ljwbqh;

            if ($this->autoFlush) {
                $this->incrementalFlush();
            }
        }
    }

    
    public function getAutoFlush()
    {
        return $this->autoFlush;
    }

    
    public function setAutoFlush($Vnzixzquikoc)
    {
        if (is_bool($Vnzixzquikoc)) {
            $this->autoFlush = $Vnzixzquikoc;
        } else {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }
    }
}
