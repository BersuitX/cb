<?php


namespace SebastianBergmann\Diff\LCS;

use PHPUnit\Framework\TestCase;

abstract class LongestCommonSubsequenceTest extends TestCase
{
    
    private $Vp02wple1ah3;

    
    private $Vyz3kkg4jqkp;

    
    private $Vnjzu3nttwoj = array(1, 2, 3, 100, 500, 1000, 2000);

    protected function setUp()
    {
        $this->memoryLimit = \ini_get('memory_limit');
        \ini_set('memory_limit', '256M');

        $this->implementation = $this->createImplementation();
    }

    
    abstract protected function createImplementation();

    protected function tearDown()
    {
        \ini_set('memory_limit', $this->memoryLimit);
    }

    public function testBothEmpty()
    {
        $V2435fgfpotg   = array();
        $Vusanxtmh52m     = array();
        $V2dgbdurpgrt = $this->implementation->calculate($V2435fgfpotg, $Vusanxtmh52m);

        $this->assertEquals(array(), $V2dgbdurpgrt);
    }

    public function testIsStrictComparison()
    {
        $V2435fgfpotg = array(
            false, 0, 0.0, '', null, array(),
            true, 1, 1.0, 'foo', array('foo', 'bar'), array('foo' => 'bar')
        );
        $Vusanxtmh52m     = $V2435fgfpotg;
        $V2dgbdurpgrt = $this->implementation->calculate($V2435fgfpotg, $Vusanxtmh52m);

        $this->assertEquals($V2435fgfpotg, $V2dgbdurpgrt);

        $Vusanxtmh52m = array(
            false, false, false, false, false, false,
            true, true, true, true, true, true
        );

        $Vwcb1oykhumm = array(
            false,
            true,
        );

        $V2dgbdurpgrt = $this->implementation->calculate($V2435fgfpotg, $Vusanxtmh52m);

        $this->assertEquals($Vwcb1oykhumm, $V2dgbdurpgrt);
    }

    public function testEqualSequences()
    {
        foreach ($this->stress_sizes as $V5mlu1ykrbu5) {
            $Vbilgsknrtnn  = \range(1, $V5mlu1ykrbu5);
            $V2435fgfpotg   = $Vbilgsknrtnn;
            $Vusanxtmh52m     = $Vbilgsknrtnn;
            $V2dgbdurpgrt = $this->implementation->calculate($V2435fgfpotg, $Vusanxtmh52m);

            $this->assertEquals($Vbilgsknrtnn, $V2dgbdurpgrt);
        }
    }

    public function testDistinctSequences()
    {
        $V2435fgfpotg   = array('A');
        $Vusanxtmh52m     = array('B');
        $V2dgbdurpgrt = $this->implementation->calculate($V2435fgfpotg, $Vusanxtmh52m);
        $this->assertEquals(array(), $V2dgbdurpgrt);

        $V2435fgfpotg   = array('A', 'B', 'C');
        $Vusanxtmh52m     = array('D', 'E', 'F');
        $V2dgbdurpgrt = $this->implementation->calculate($V2435fgfpotg, $Vusanxtmh52m);
        $this->assertEquals(array(), $V2dgbdurpgrt);

        foreach ($this->stress_sizes as $V5mlu1ykrbu5) {
            $V2435fgfpotg   = \range(1, $V5mlu1ykrbu5);
            $Vusanxtmh52m     = \range($V5mlu1ykrbu5 + 1, $V5mlu1ykrbu5 * 2);
            $V2dgbdurpgrt = $this->implementation->calculate($V2435fgfpotg, $Vusanxtmh52m);
            $this->assertEquals(array(), $V2dgbdurpgrt);
        }
    }

    public function testCommonSubsequence()
    {
        $V2435fgfpotg     = array('A',      'C',      'E', 'F', 'G');
        $Vusanxtmh52m       = array('A', 'B',      'D', 'E',           'H');
        $Vwcb1oykhumm = array('A',                'E');
        $V2dgbdurpgrt   = $this->implementation->calculate($V2435fgfpotg, $Vusanxtmh52m);
        $this->assertEquals($Vwcb1oykhumm, $V2dgbdurpgrt);

        $V2435fgfpotg     = array('A',      'C',      'E', 'F', 'G');
        $Vusanxtmh52m       = array('B', 'C', 'D', 'E', 'F',      'H');
        $Vwcb1oykhumm = array('C',                'E', 'F');
        $V2dgbdurpgrt   = $this->implementation->calculate($V2435fgfpotg, $Vusanxtmh52m);
        $this->assertEquals($Vwcb1oykhumm, $V2dgbdurpgrt);

        foreach ($this->stress_sizes as $V5mlu1ykrbu5) {
            $V2435fgfpotg     = $V5mlu1ykrbu5 < 2 ? array(1) : \range(1, $V5mlu1ykrbu5 + 1, 2);
            $Vusanxtmh52m       = $V5mlu1ykrbu5 < 3 ? array(1) : \range(1, $V5mlu1ykrbu5 + 1, 3);
            $Vwcb1oykhumm = $V5mlu1ykrbu5 < 6 ? array(1) : \range(1, $V5mlu1ykrbu5 + 1, 6);
            $V2dgbdurpgrt   = $this->implementation->calculate($V2435fgfpotg, $Vusanxtmh52m);

            $this->assertEquals($Vwcb1oykhumm, $V2dgbdurpgrt);
        }
    }

    public function testSingleElementSubsequenceAtStart()
    {
        foreach ($this->stress_sizes as $V5mlu1ykrbu5) {
            $V2435fgfpotg   = \range(1, $V5mlu1ykrbu5);
            $Vusanxtmh52m     = \array_slice($V2435fgfpotg, 0, 1);
            $V2dgbdurpgrt = $this->implementation->calculate($V2435fgfpotg, $Vusanxtmh52m);

            $this->assertEquals($Vusanxtmh52m, $V2dgbdurpgrt);
        }
    }

    public function testSingleElementSubsequenceAtMiddle()
    {
        foreach ($this->stress_sizes as $V5mlu1ykrbu5) {
            $V2435fgfpotg   = \range(1, $V5mlu1ykrbu5);
            $Vusanxtmh52m     = \array_slice($V2435fgfpotg, (int) $V5mlu1ykrbu5 / 2, 1);
            $V2dgbdurpgrt = $this->implementation->calculate($V2435fgfpotg, $Vusanxtmh52m);

            $this->assertEquals($Vusanxtmh52m, $V2dgbdurpgrt);
        }
    }

    public function testSingleElementSubsequenceAtEnd()
    {
        foreach ($this->stress_sizes as $V5mlu1ykrbu5) {
            $V2435fgfpotg   = \range(1, $V5mlu1ykrbu5);
            $Vusanxtmh52m     = \array_slice($V2435fgfpotg, $V5mlu1ykrbu5 - 1, 1);
            $V2dgbdurpgrt = $this->implementation->calculate($V2435fgfpotg, $Vusanxtmh52m);

            $this->assertEquals($Vusanxtmh52m, $V2dgbdurpgrt);
        }
    }

    public function testReversedSequences()
    {
        $V2435fgfpotg     = array('A', 'B');
        $Vusanxtmh52m       = array('B', 'A');
        $Vwcb1oykhumm = array('A');
        $V2dgbdurpgrt   = $this->implementation->calculate($V2435fgfpotg, $Vusanxtmh52m);
        $this->assertEquals($Vwcb1oykhumm, $V2dgbdurpgrt);

        foreach ($this->stress_sizes as $V5mlu1ykrbu5) {
            $V2435fgfpotg   = \range(1, $V5mlu1ykrbu5);
            $Vusanxtmh52m     = \array_reverse($V2435fgfpotg);
            $V2dgbdurpgrt = $this->implementation->calculate($V2435fgfpotg, $Vusanxtmh52m);

            $this->assertEquals(array(1), $V2dgbdurpgrt);
        }
    }

    public function testStrictTypeCalculate()
    {
        $Vlycelrz2ye5 = $this->implementation->calculate(array('5'), array('05'));

        $this->assertInternalType('array', $Vlycelrz2ye5);
        $this->assertCount(0, $Vlycelrz2ye5);
    }
}
