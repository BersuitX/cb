<?php

namespace FastRoute;

use PHPUnit\Framework\TestCase;

class HackTypecheckerTest extends TestCase
{
    const SERVER_ALREADY_RUNNING_CODE = 77;

    public function testTypechecks($Vv53umhjhv4y = true)
    {
        if (!defined('HHVM_VERSION')) {
            $this->markTestSkipped('HHVM only');
        }
        if (!version_compare(HHVM_VERSION, '3.9.0', '>=')) {
          $this->markTestSkipped('classname<T> requires HHVM 3.9+');
        }

        
        

        $Vvaiuwffullu = [];
        $Vzxi2cnn0tre = null;
        exec(
            'hh_server --check ' . escapeshellarg(__DIR__ . '/../../') . ' 2>&1',
            $Vvaiuwffullu,
            $Vzxi2cnn0tre
        );
        if ($Vzxi2cnn0tre === self::SERVER_ALREADY_RUNNING_CODE) {
            $this->assertTrue(
              $Vv53umhjhv4y,
              'Typechecker still running after running hh_client stop'
            );
            
            
            exec('hh_client stop 2>/dev/null');
            $this->testTypechecks( false);
            return;

        }
        $this->assertSame(0, $Vzxi2cnn0tre, implode("\n", $Vvaiuwffullu));
    }
}
