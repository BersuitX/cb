<?php



namespace Symfony\Component\Yaml\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Yaml;

class YamlTest extends TestCase
{
    public function testParseAndDump()
    {
        $Vqhzkfsafzrc = array('lorem' => 'ipsum', 'dolor' => 'sit');
        $Vz32evsbl1mn = Yaml::dump($Vqhzkfsafzrc);
        $V0luatne1svb = Yaml::parse($Vz32evsbl1mn);
        $this->assertEquals($Vqhzkfsafzrc, $V0luatne1svb);
    }

    
    public function testZeroIndentationThrowsException()
    {
        Yaml::dump(array('lorem' => 'ipsum', 'dolor' => 'sit'), 2, 0);
    }

    
    public function testNegativeIndentationThrowsException()
    {
        Yaml::dump(array('lorem' => 'ipsum', 'dolor' => 'sit'), 2, -4);
    }
}
