<?php


use SebastianBergmann\Environment\Runtime;


class PHPUnit_Util_PHP_Windows extends PHPUnit_Util_PHP_Default
{
    
    private $Vvigqefjm4kq;

    
    public function runJob($Vxvhogozufkq, array $Vgzibbh1fx1x = array())
    {
        $Vrdnxfa4exum = new Runtime;

        if (false === $Vi3lc4iqvg5y = tmpfile()) {
            throw new PHPUnit_Framework_Exception(
                'A temporary file could not be created; verify that your TEMP environment variable is writable'
            );
        }

        $V1xi1thgya2x = proc_open(
            $Vrdnxfa4exum->getBinary() . $this->settingsToParameters($Vgzibbh1fx1x),
            array(
            0 => array('pipe', 'r'),
            1 => $Vi3lc4iqvg5y,
            2 => array('pipe', 'w')
            ),
            $Vecjmlstvfng
        );

        if (!is_resource($V1xi1thgya2x)) {
            throw new PHPUnit_Framework_Exception(
                'Unable to spawn worker process'
            );
        }

        $this->process($Vecjmlstvfng[0], $Vxvhogozufkq);
        fclose($Vecjmlstvfng[0]);

        $Vx3rllm2h3ap = stream_get_contents($Vecjmlstvfng[2]);
        fclose($Vecjmlstvfng[2]);

        proc_close($V1xi1thgya2x);

        rewind($Vi3lc4iqvg5y);
        $Vhobtkzyzlrq = stream_get_contents($Vi3lc4iqvg5y);
        fclose($Vi3lc4iqvg5y);

        $this->cleanup();

        return array('stdout' => $Vhobtkzyzlrq, 'stderr' => $Vx3rllm2h3ap);
    }

    
    protected function process($Vervyh22gpsd, $Vxvhogozufkq)
    {
        if (!($this->tempFile = tempnam(sys_get_temp_dir(), 'PHPUnit')) ||
            file_put_contents($this->tempFile, $Vxvhogozufkq) === false) {
            throw new PHPUnit_Framework_Exception(
                'Unable to write temporary file'
            );
        }

        fwrite(
            $Vervyh22gpsd,
            '<?php require_once ' . var_export($this->tempFile, true) .  '; ?>'
        );
    }

    
    protected function cleanup()
    {
        unlink($this->tempFile);
    }
}
