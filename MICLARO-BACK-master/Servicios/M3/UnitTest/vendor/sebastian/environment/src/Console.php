<?php


namespace SebastianBergmann\Environment;


class Console
{
    const STDIN  = 0;
    const STDOUT = 1;
    const STDERR = 2;

    
    public function hasColorSupport()
    {
        if (DIRECTORY_SEPARATOR == '\\') {
            return false !== getenv('ANSICON') || 'ON' === getenv('ConEmuANSI') || 'xterm' === getenv('TERM');
        }

        if (!defined('STDOUT')) {
            return false;
        }

        return $this->isInteractive(STDOUT);
    }

    
    public function getNumberOfColumns()
    {
        if (DIRECTORY_SEPARATOR == '\\') {
            $Vtq2rgtvyetr = 80;

            if (preg_match('/^(\d+)x\d+ \(\d+x(\d+)\)$/', trim(getenv('ANSICON')), $Virbphhh55ue)) {
                $Vtq2rgtvyetr = $Virbphhh55ue[1];
            } elseif (function_exists('proc_open')) {
                $V1xi1thgya2x = proc_open(
                    'mode CON',
                    array(
                        1 => array('pipe', 'w'),
                        2 => array('pipe', 'w')
                    ),
                    $Vecjmlstvfng,
                    null,
                    null,
                    array('suppress_errors' => true)
                );

                if (is_resource($V1xi1thgya2x)) {
                    $Vb5bkktmopn1 = stream_get_contents($Vecjmlstvfng[1]);

                    fclose($Vecjmlstvfng[1]);
                    fclose($Vecjmlstvfng[2]);
                    proc_close($V1xi1thgya2x);

                    if (preg_match('/--------+\r?\n.+?(\d+)\r?\n.+?(\d+)\r?\n/', $Vb5bkktmopn1, $Virbphhh55ue)) {
                        $Vtq2rgtvyetr = $Virbphhh55ue[2];
                    }
                }
            }

            return $Vtq2rgtvyetr - 1;
        }

        if (!$this->isInteractive(self::STDIN)) {
            return 80;
        }

        if (function_exists('shell_exec') && preg_match('#\d+ (\d+)#', shell_exec('stty size'), $Vwetg4hewdr4) === 1) {
            if ((int) $Vwetg4hewdr4[1] > 0) {
                return (int) $Vwetg4hewdr4[1];
            }
        }

        if (function_exists('shell_exec') && preg_match('#columns = (\d+);#', shell_exec('stty'), $Vwetg4hewdr4) === 1) {
            if ((int) $Vwetg4hewdr4[1] > 0) {
                return (int) $Vwetg4hewdr4[1];
            }
        }

        return 80;
    }

    
    public function isInteractive($Vwe1mljrkons = self::STDOUT)
    {
        return function_exists('posix_isatty') && @posix_isatty($Vwe1mljrkons);
    }
}
