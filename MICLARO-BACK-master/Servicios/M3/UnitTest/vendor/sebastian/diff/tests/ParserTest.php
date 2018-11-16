<?php


namespace SebastianBergmann\Diff;

use PHPUnit\Framework\TestCase;


class ParserTest extends TestCase
{
    
    private $V5zzh1da1wpy;

    protected function setUp()
    {
        $this->parser = new Parser;
    }

    public function testParse()
    {
        $Vjdkyvjsoqdn = \file_get_contents(__DIR__ . '/fixtures/patch.txt');

        $Vg3d5wpv40ke = $this->parser->parse($Vjdkyvjsoqdn);

        $this->assertInternalType('array', $Vg3d5wpv40ke);
        $this->assertContainsOnlyInstancesOf('SebastianBergmann\Diff\Diff', $Vg3d5wpv40ke);
        $this->assertCount(1, $Vg3d5wpv40ke);

        $Vhafyjzhwhdi = $Vg3d5wpv40ke[0]->getChunks();
        $this->assertInternalType('array', $Vhafyjzhwhdi);
        $this->assertContainsOnlyInstancesOf('SebastianBergmann\Diff\Chunk', $Vhafyjzhwhdi);

        $this->assertCount(1, $Vhafyjzhwhdi);

        $this->assertEquals(20, $Vhafyjzhwhdi[0]->getStart());

        $this->assertCount(4, $Vhafyjzhwhdi[0]->getLines());
    }

    public function testParseWithMultipleChunks()
    {
        $Vjdkyvjsoqdn = \file_get_contents(__DIR__ . '/fixtures/patch2.txt');

        $Vg3d5wpv40ke = $this->parser->parse($Vjdkyvjsoqdn);

        $this->assertCount(1, $Vg3d5wpv40ke);

        $Vhafyjzhwhdi = $Vg3d5wpv40ke[0]->getChunks();
        $this->assertCount(3, $Vhafyjzhwhdi);

        $this->assertEquals(20, $Vhafyjzhwhdi[0]->getStart());
        $this->assertEquals(320, $Vhafyjzhwhdi[1]->getStart());
        $this->assertEquals(600, $Vhafyjzhwhdi[2]->getStart());

        $this->assertCount(5, $Vhafyjzhwhdi[0]->getLines());
        $this->assertCount(5, $Vhafyjzhwhdi[1]->getLines());
        $this->assertCount(4, $Vhafyjzhwhdi[2]->getLines());
    }

    public function testParseWithRemovedLines()
    {
        $Vjdkyvjsoqdn = <<<A
diff --git a/Test.txt b/Test.txt
index abcdefg..abcdefh 100644
--- a/Test.txt
+++ b/Test.txt
@@ -49,9 +49,8 @@
 A
-B
A;
        $Vg3d5wpv40ke = $this->parser->parse($Vjdkyvjsoqdn);
        $this->assertInternalType('array', $Vg3d5wpv40ke);
        $this->assertContainsOnlyInstancesOf('SebastianBergmann\Diff\Diff', $Vg3d5wpv40ke);
        $this->assertCount(1, $Vg3d5wpv40ke);

        $Vhafyjzhwhdi = $Vg3d5wpv40ke[0]->getChunks();

        $this->assertInternalType('array', $Vhafyjzhwhdi);
        $this->assertContainsOnlyInstancesOf('SebastianBergmann\Diff\Chunk', $Vhafyjzhwhdi);
        $this->assertCount(1, $Vhafyjzhwhdi);

        $Voiwceuvysis = $Vhafyjzhwhdi[0];
        $this->assertSame(49, $Voiwceuvysis->getStart());
        $this->assertSame(49, $Voiwceuvysis->getEnd());
        $this->assertSame(9, $Voiwceuvysis->getStartRange());
        $this->assertSame(8, $Voiwceuvysis->getEndRange());

        $Vbkt5laoakgf = $Voiwceuvysis->getLines();
        $this->assertInternalType('array', $Vbkt5laoakgf);
        $this->assertContainsOnlyInstancesOf('SebastianBergmann\Diff\Line', $Vbkt5laoakgf);
        $this->assertCount(2, $Vbkt5laoakgf);

        
        $Vrwsmtja4f2j = $Vbkt5laoakgf[0];
        $this->assertSame('A', $Vrwsmtja4f2j->getContent());
        $this->assertSame(Line::UNCHANGED, $Vrwsmtja4f2j->getType());

        $Vrwsmtja4f2j = $Vbkt5laoakgf[1];
        $this->assertSame('B', $Vrwsmtja4f2j->getContent());
        $this->assertSame(Line::REMOVED, $Vrwsmtja4f2j->getType());
    }

    public function testParseDiffForMulitpleFiles()
    {
        $Vjdkyvjsoqdn = <<<A
diff --git a/Test.txt b/Test.txt
index abcdefg..abcdefh 100644
--- a/Test.txt
+++ b/Test.txt
@@ -1,3 +1,2 @@
 A
-B

diff --git a/Test123.txt b/Test123.txt
index abcdefg..abcdefh 100644
--- a/Test2.txt
+++ b/Test2.txt
@@ -1,2 +1,3 @@
 A
+B
A;
        $Vg3d5wpv40ke = $this->parser->parse($Vjdkyvjsoqdn);
        $this->assertCount(2, $Vg3d5wpv40ke);

        
        $Vlycelrz2ye5 = $Vg3d5wpv40ke[0];
        $this->assertSame('a/Test.txt', $Vlycelrz2ye5->getFrom());
        $this->assertSame('b/Test.txt', $Vlycelrz2ye5->getTo());
        $this->assertCount(1, $Vlycelrz2ye5->getChunks());

        $Vlycelrz2ye5 = $Vg3d5wpv40ke[1];
        $this->assertSame('a/Test2.txt', $Vlycelrz2ye5->getFrom());
        $this->assertSame('b/Test2.txt', $Vlycelrz2ye5->getTo());
        $this->assertCount(1, $Vlycelrz2ye5->getChunks());
    }
}
