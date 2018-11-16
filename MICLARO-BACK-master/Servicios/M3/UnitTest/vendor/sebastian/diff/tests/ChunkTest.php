<?php


namespace SebastianBergmann\Diff;

use PHPUnit\Framework\TestCase;


class ChunkTest extends TestCase
{
    
    private $Voiwceuvysis;

    protected function setUp()
    {
        $this->chunk = new Chunk;
    }

    public function testCanBeCreatedWithoutArguments()
    {
        $this->assertInstanceOf('SebastianBergmann\Diff\Chunk', $this->chunk);
    }

    public function testStartCanBeRetrieved()
    {
        $this->assertEquals(0, $this->chunk->getStart());
    }

    public function testStartRangeCanBeRetrieved()
    {
        $this->assertEquals(1, $this->chunk->getStartRange());
    }

    public function testEndCanBeRetrieved()
    {
        $this->assertEquals(0, $this->chunk->getEnd());
    }

    public function testEndRangeCanBeRetrieved()
    {
        $this->assertEquals(1, $this->chunk->getEndRange());
    }

    public function testLinesCanBeRetrieved()
    {
        $this->assertEquals(array(), $this->chunk->getLines());
    }

    public function testLinesCanBeSet()
    {
        $this->assertEquals(array(), $this->chunk->getLines());

        $Vrz0lkuewcme = array('line0', 'line1');
        $this->chunk->setLines($Vrz0lkuewcme);
        $this->assertEquals($Vrz0lkuewcme, $this->chunk->getLines());
    }
}
