<?php


use SebastianBergmann\Environment\Runtime;


class PHPUnit_Util_PHP_Default extends PHPUnit_Util_PHP
{
    
    public function runJob($Vxvhogozufkq, array $Vgzibbh1fx1x = array())
    {
        $Vrdnxfa4exum = new Runtime;
        $Vrdnxfa4exum = $Vrdnxfa4exum->getBinary() . $this->settingsToParameters($Vgzibbh1fx1x);

        if ('phpdbg' === PHP_SAPI) {
            $Vrdnxfa4exum .= ' -qrr ' . escapeshellarg(__DIR__ . '/eval-stdin.php');
        }

        $V1xi1thgya2x = proc_open(
            $Vrdnxfa4exum,
            array(
            0 => array('pipe', 'r'),
            1 => array('pipe', 'w'),
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

        $Vhobtkzyzlrq = stream_get_contents($Vecjmlstvfng[1]);
        fclose($Vecjmlstvfng[1]);

        $Vx3rllm2h3ap = stream_get_contents($Vecjmlstvfng[2]);
        fclose($Vecjmlstvfng[2]);

        proc_close($V1xi1thgya2x);
        $this->cleanup();

        return array('stdout' => $Vhobtkzyzlrq, 'stderr' => $Vx3rllm2h3ap);
    }

    
    protected function process($Vervyh22gpsd, $Vxvhogozufkq)
    {
        fwrite($Vervyh22gpsd, $Vxvhogozufkq);
    }

    
    protected function cleanup()
    {
    }
}
