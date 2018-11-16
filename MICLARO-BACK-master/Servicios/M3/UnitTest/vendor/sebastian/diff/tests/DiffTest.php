<?php


namespace SebastianBergmann\Diff;

use PHPUnit\Framework\TestCase;


final class DiffTest extends TestCase
{
    public function testGettersAfterConstructionWithDefault()
    {
        $V2435fgfpotg = 'line1a';
        $Vusanxtmh52m   = 'line2a';
        $Vlycelrz2ye5 = new Diff($V2435fgfpotg, $Vusanxtmh52m);

        $this->assertSame($V2435fgfpotg, $Vlycelrz2ye5->getFrom());
        $this->assertSame($Vusanxtmh52m, $Vlycelrz2ye5->getTo());
        $this->assertSame(array(), $Vlycelrz2ye5->getChunks(), 'Expect chunks to be default value "array()".');
    }

    public function testGettersAfterConstructionWithChunks()
    {
        $V2435fgfpotg   = 'line1b';
        $Vusanxtmh52m     = 'line2b';
        $Vhafyjzhwhdi = array(new Chunk(), new Chunk(2, 3));

        $Vlycelrz2ye5 = new Diff($V2435fgfpotg, $Vusanxtmh52m, $Vhafyjzhwhdi);

        $this->assertSame($V2435fgfpotg, $Vlycelrz2ye5->getFrom());
        $this->assertSame($Vusanxtmh52m, $Vlycelrz2ye5->getTo());
        $this->assertSame($Vhafyjzhwhdi, $Vlycelrz2ye5->getChunks(), 'Expect chunks to be passed value.');
    }

    public function testSetChunksAfterConstruction()
    {
        $Vlycelrz2ye5 = new Diff('line1c', 'line2c');
        $this->assertSame(array(), $Vlycelrz2ye5->getChunks(), 'Expect chunks to be default value "array()".');

        $Vhafyjzhwhdi = array(new Chunk(), new Chunk(2, 3));
        $Vlycelrz2ye5->setChunks($Vhafyjzhwhdi);
        $this->assertSame($Vhafyjzhwhdi, $Vlycelrz2ye5->getChunks(), 'Expect chunks to be passed value.');
    }
}
