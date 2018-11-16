<?php


namespace SebastianBergmann\GlobalState;

use ArrayObject;
use PHPUnit_Framework_TestCase;
use SebastianBergmann\GlobalState\TestFixture\SnapshotClass;


class SnapshotTest extends PHPUnit_Framework_TestCase
{
    public function testStaticAttributes()
    {
        $Vn54eydon0cr = $this->getBlacklist();
        $Vn54eydon0cr->method('isStaticAttributeBlacklisted')->willReturnCallback(function ($Vqmu1sajhgfn) {
            return $Vqmu1sajhgfn !== 'SebastianBergmann\GlobalState\TestFixture\SnapshotClass';
        });

        SnapshotClass::init();

        $V5idjdtohxgf = new Snapshot($Vn54eydon0cr, false, true, false, false, false, false, false, false, false);
        $Vwcb1oykhumm = array('SebastianBergmann\GlobalState\TestFixture\SnapshotClass' => array(
            'string' => 'snapshot',
            'arrayObject' => new ArrayObject(array(1, 2, 3)),
            'stdClass' => new \stdClass(),
        ));

        $this->assertEquals($Vwcb1oykhumm, $V5idjdtohxgf->staticAttributes());
    }

    public function testConstants()
    {
        $V5idjdtohxgf = new Snapshot($this->getBlacklist(), false, false, true, false, false, false, false, false, false);
        $this->assertArrayHasKey('GLOBALSTATE_TESTSUITE', $V5idjdtohxgf->constants());
    }

    public function testFunctions()
    {
        require_once __DIR__.'/_fixture/SnapshotFunctions.php';

        $V5idjdtohxgf = new Snapshot($this->getBlacklist(), false, false, false, true, false, false, false, false, false);
        $V1smq0dxjwv1 = $V5idjdtohxgf->functions();

        $this->assertThat(
            $V1smq0dxjwv1,
            $this->logicalOr(
                
                $this->contains('sebastianbergmann\globalstate\testfixture\snapshotfunction'),
                
                $this->contains('SebastianBergmann\GlobalState\TestFixture\snapshotFunction')
            )
        );

        $this->assertNotContains('assert', $V1smq0dxjwv1);
    }

    public function testClasses()
    {
        $V5idjdtohxgf = new Snapshot($this->getBlacklist(), false, false, false, false, true, false, false, false, false);
        $Vqmu1sajhgfnes = $V5idjdtohxgf->classes();

        $this->assertContains('PHPUnit_Framework_TestCase', $Vqmu1sajhgfnes);
        $this->assertNotContains('Exception', $Vqmu1sajhgfnes);
    }

    public function testInterfaces()
    {
        $V5idjdtohxgf = new Snapshot($this->getBlacklist(), false, false, false, false, false, true, false, false, false);
        $Voahpkaubtr3 = $V5idjdtohxgf->interfaces();

        $this->assertContains('PHPUnit_Framework_Test', $Voahpkaubtr3);
        $this->assertNotContains('Countable', $Voahpkaubtr3);
    }

    
    public function testTraits()
    {
        spl_autoload_call('SebastianBergmann\GlobalState\TestFixture\SnapshotTrait');

        $V5idjdtohxgf = new Snapshot($this->getBlacklist(), false, false, false, false, false, false, true, false, false);
        $this->assertContains('SebastianBergmann\GlobalState\TestFixture\SnapshotTrait', $V5idjdtohxgf->traits());
    }

    public function testIniSettings()
    {
        $V5idjdtohxgf = new Snapshot($this->getBlacklist(), false, false, false, false, false, false, false, true, false);
        $Vkvhbademoiu = $V5idjdtohxgf->iniSettings();

        $this->assertArrayHasKey('date.timezone', $Vkvhbademoiu);
        $this->assertEquals('Etc/UTC', $Vkvhbademoiu['date.timezone']);
    }

    public function testIncludedFiles()
    {
        $V5idjdtohxgf = new Snapshot($this->getBlacklist(), false, false, false, false, false, false, false, false, true);
        $this->assertContains(__FILE__, $V5idjdtohxgf->includedFiles());
    }

    
    private function getBlacklist()
    {
        return $this->getMockBuilder('SebastianBergmann\GlobalState\Blacklist')
                    ->disableOriginalConstructor()
                    ->getMock();
    }
}
