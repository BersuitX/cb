<?php


namespace SebastianBergmann\Diff;

use PHPUnit\Framework\TestCase;


class LineTest extends TestCase
{
    
    private $Vrwsmtja4f2j;

    protected function setUp()
    {
        $this->line = new Line;
    }

    public function testCanBeCreatedWithoutArguments()
    {
        $this->assertInstanceOf('SebastianBergmann\Diff\Line', $this->line);
    }

    public function testTypeCanBeRetrieved()
    {
        $this->assertEquals(Line::UNCHANGED, $this->line->getType());
    }

    public function testContentCanBeRetrieved()
    {
        $this->assertEquals('', $this->line->getContent());
    }
}
