<?php


namespace SebastianBergmann\Diff;

use SebastianBergmann\Diff\LCS\MemoryEfficientImplementation;
use SebastianBergmann\Diff\LCS\TimeEfficientImplementation;
use PHPUnit\Framework\TestCase;


class DifferTest extends TestCase
{
    const REMOVED = 2;
    const ADDED   = 1;
    const OLD     = 0;

    
    private $Vyxeqxkac2bx;

    protected function setUp()
    {
        $this->differ = new Differ;
    }

    
    public function testArrayRepresentationOfDiffCanBeRenderedUsingTimeEfficientLcsImplementation(array $Vwcb1oykhumm, $V2435fgfpotg, $Vusanxtmh52m)
    {
        $this->assertEquals($Vwcb1oykhumm, $this->differ->diffToArray($V2435fgfpotg, $Vusanxtmh52m, new TimeEfficientImplementation));
    }

    
    public function testTextRepresentationOfDiffCanBeRenderedUsingTimeEfficientLcsImplementation($Vwcb1oykhumm, $V2435fgfpotg, $Vusanxtmh52m)
    {
        $this->assertEquals($Vwcb1oykhumm, $this->differ->diff($V2435fgfpotg, $Vusanxtmh52m, new TimeEfficientImplementation));
    }

    
    public function testArrayRepresentationOfDiffCanBeRenderedUsingMemoryEfficientLcsImplementation(array $Vwcb1oykhumm, $V2435fgfpotg, $Vusanxtmh52m)
    {
        $this->assertEquals($Vwcb1oykhumm, $this->differ->diffToArray($V2435fgfpotg, $Vusanxtmh52m, new MemoryEfficientImplementation));
    }

    
    public function testTextRepresentationOfDiffCanBeRenderedUsingMemoryEfficientLcsImplementation($Vwcb1oykhumm, $V2435fgfpotg, $Vusanxtmh52m)
    {
        $this->assertEquals($Vwcb1oykhumm, $this->differ->diff($V2435fgfpotg, $Vusanxtmh52m, new MemoryEfficientImplementation));
    }

    public function testCustomHeaderCanBeUsed()
    {
        $Vyxeqxkac2bx = new Differ('CUSTOM HEADER');

        $this->assertEquals(
            "CUSTOM HEADER@@ @@\n-a\n+b\n",
            $Vyxeqxkac2bx->diff('a', 'b')
        );
    }

    public function testTypesOtherThanArrayAndStringCanBePassed()
    {
        $this->assertEquals(
            "--- Original\n+++ New\n@@ @@\n-1\n+2\n",
            $this->differ->diff(1, 2)
        );
    }

    
    public function testParser($Vlycelrz2ye5, array $Vwcb1oykhumm)
    {
        $V5zzh1da1wpy = new Parser;
        $Vv0hyvhlkjqr = $V5zzh1da1wpy->parse($Vlycelrz2ye5);

        $this->assertEquals($Vwcb1oykhumm, $Vv0hyvhlkjqr);
    }

    public function arrayProvider()
    {
        return array(
            array(
                array(
                    array('a', self::REMOVED),
                    array('b', self::ADDED)
                ),
                'a',
                'b'
            ),
            array(
                array(
                    array('ba', self::REMOVED),
                    array('bc', self::ADDED)
                ),
                'ba',
                'bc'
            ),
            array(
                array(
                    array('ab', self::REMOVED),
                    array('cb', self::ADDED)
                ),
                'ab',
                'cb'
            ),
            array(
                array(
                    array('abc', self::REMOVED),
                    array('adc', self::ADDED)
                ),
                'abc',
                'adc'
            ),
            array(
                array(
                    array('ab', self::REMOVED),
                    array('abc', self::ADDED)
                ),
                'ab',
                'abc'
            ),
            array(
                array(
                    array('bc', self::REMOVED),
                    array('abc', self::ADDED)
                ),
                'bc',
                'abc'
            ),
            array(
                array(
                    array('abc', self::REMOVED),
                    array('abbc', self::ADDED)
                ),
                'abc',
                'abbc'
            ),
            array(
                array(
                    array('abcdde', self::REMOVED),
                    array('abcde', self::ADDED)
                ),
                'abcdde',
                'abcde'
            ),
            'same start' => array(
                array(
                    array(17, self::OLD),
                    array('b', self::REMOVED),
                    array('d', self::ADDED),
                ),
                array(30 => 17, 'a' => 'b'),
                array(30 => 17, 'c' => 'd'),
            ),
            'same end' => array(
                array(
                    array(1, self::REMOVED),
                    array(2, self::ADDED),
                    array('b', self::OLD),
                ),
                array(1 => 1, 'a' => 'b'),
                array(1 => 2, 'a' => 'b'),
            ),
            'same start (2), same end (1)' => array(
                array(
                    array(17, self::OLD),
                    array(2, self::OLD),
                    array(4, self::REMOVED),
                    array('a', self::ADDED),
                    array(5, self::ADDED),
                    array('x', self::OLD),
                ),
                array(30 => 17, 1 => 2, 2 => 4, 'z' => 'x'),
                array(30 => 17, 1 => 2, 3 => 'a', 2 => 5, 'z' => 'x'),
            ),
            'same' => array(
                array(
                    array('x', self::OLD),
                ),
                array('z' => 'x'),
                array('z' => 'x'),
            ),
            'diff' => array(
                array(
                    array('y', self::REMOVED),
                    array('x', self::ADDED),
                ),
                array('x' => 'y'),
                array('z' => 'x'),
            ),
            'diff 2' => array(
                array(
                    array('y', self::REMOVED),
                    array('b', self::REMOVED),
                    array('x', self::ADDED),
                    array('d', self::ADDED),
                ),
                array('x' => 'y', 'a' => 'b'),
                array('z' => 'x', 'c' => 'd'),
            ),
            'test line diff detection' => array(
                array(
                    array(
                        '#Warning: Strings contain different line endings!',
                        self::OLD,
                    ),
                    array(
                        '<?php',
                        self::OLD,
                    ),
                    array(
                        '',
                        self::OLD,
                    ),
                ),
                "<?php\r\n",
                "<?php\n"
            )
        );
    }

    public function textProvider()
    {
        return array(
            array(
                "--- Original\n+++ New\n@@ @@\n-a\n+b\n",
                'a',
                'b'
            ),
            array(
                "--- Original\n+++ New\n@@ @@\n-ba\n+bc\n",
                'ba',
                'bc'
            ),
            array(
                "--- Original\n+++ New\n@@ @@\n-ab\n+cb\n",
                'ab',
                'cb'
            ),
            array(
                "--- Original\n+++ New\n@@ @@\n-abc\n+adc\n",
                'abc',
                'adc'
            ),
            array(
                "--- Original\n+++ New\n@@ @@\n-ab\n+abc\n",
                'ab',
                'abc'
            ),
            array(
                "--- Original\n+++ New\n@@ @@\n-bc\n+abc\n",
                'bc',
                'abc'
            ),
            array(
                "--- Original\n+++ New\n@@ @@\n-abc\n+abbc\n",
                'abc',
                'abbc'
            ),
            array(
                "--- Original\n+++ New\n@@ @@\n-abcdde\n+abcde\n",
                'abcdde',
                'abcde'
            ),
            array(
                "--- Original\n+++ New\n@@ @@\n-A\n+A1\n B\n",
                "A\nB",
                "A1\nB",
            ),
            array(
                <<<EOF
--- Original
+++ New
@@ @@
 a
-b
+p
@@ @@
 i
-j
+w
 k

EOF
            ,
                "a\nb\nc\nd\ne\nf\ng\nh\ni\nj\nk",
                "a\np\nc\nd\ne\nf\ng\nh\ni\nw\nk",
            ),
            array(
                <<<EOF
--- Original
+++ New
@@ @@
 a
-b
+p
@@ @@
 i
-j
+w
 k

EOF
                ,
                "a\nb\nc\nd\ne\nf\ng\nh\ni\nj\nk",
                "a\np\nc\nd\ne\nf\ng\nh\ni\nw\nk",
            ),
        );
    }

    public function diffProvider()
    {
        $Vhib24cjnzce = <<<EOL
a:1:{i:0;O:27:"SebastianBergmann\Diff\Diff":3:{s:33:" SebastianBergmann\Diff\Diff from";s:7:"old.txt";s:31:" SebastianBergmann\Diff\Diff to";s:7:"new.txt";s:35:" SebastianBergmann\Diff\Diff chunks";a:3:{i:0;O:28:"SebastianBergmann\Diff\Chunk":5:{s:35:" SebastianBergmann\Diff\Chunk start";i:1;s:40:" SebastianBergmann\Diff\Chunk startRange";i:3;s:33:" SebastianBergmann\Diff\Chunk end";i:1;s:38:" SebastianBergmann\Diff\Chunk endRange";i:4;s:35:" SebastianBergmann\Diff\Chunk lines";a:4:{i:0;O:27:"SebastianBergmann\Diff\Line":2:{s:33:" SebastianBergmann\Diff\Line type";i:1;s:36:" SebastianBergmann\Diff\Line content";s:7:"2222111";}i:1;O:27:"SebastianBergmann\Diff\Line":2:{s:33:" SebastianBergmann\Diff\Line type";i:3;s:36:" SebastianBergmann\Diff\Line content";s:7:"1111111";}i:2;O:27:"SebastianBergmann\Diff\Line":2:{s:33:" SebastianBergmann\Diff\Line type";i:3;s:36:" SebastianBergmann\Diff\Line content";s:7:"1111111";}i:3;O:27:"SebastianBergmann\Diff\Line":2:{s:33:" SebastianBergmann\Diff\Line type";i:3;s:36:" SebastianBergmann\Diff\Line content";s:7:"1111111";}}}i:1;O:28:"SebastianBergmann\Diff\Chunk":5:{s:35:" SebastianBergmann\Diff\Chunk start";i:5;s:40:" SebastianBergmann\Diff\Chunk startRange";i:10;s:33:" SebastianBergmann\Diff\Chunk end";i:6;s:38:" SebastianBergmann\Diff\Chunk endRange";i:8;s:35:" SebastianBergmann\Diff\Chunk lines";a:11:{i:0;O:27:"SebastianBergmann\Diff\Line":2:{s:33:" SebastianBergmann\Diff\Line type";i:3;s:36:" SebastianBergmann\Diff\Line content";s:7:"1111111";}i:1;O:27:"SebastianBergmann\Diff\Line":2:{s:33:" SebastianBergmann\Diff\Line type";i:3;s:36:" SebastianBergmann\Diff\Line content";s:7:"1111111";}i:2;O:27:"SebastianBergmann\Diff\Line":2:{s:33:" SebastianBergmann\Diff\Line type";i:3;s:36:" SebastianBergmann\Diff\Line content";s:7:"1111111";}i:3;O:27:"SebastianBergmann\Diff\Line":2:{s:33:" SebastianBergmann\Diff\Line type";i:3;s:36:" SebastianBergmann\Diff\Line content";s:8:"+1121211";}i:4;O:27:"SebastianBergmann\Diff\Line":2:{s:33:" SebastianBergmann\Diff\Line type";i:3;s:36:" SebastianBergmann\Diff\Line content";s:7:"1111111";}i:5;O:27:"SebastianBergmann\Diff\Line":2:{s:33:" SebastianBergmann\Diff\Line type";i:3;s:36:" SebastianBergmann\Diff\Line content";s:8:"-1111111";}i:6;O:27:"SebastianBergmann\Diff\Line":2:{s:33:" SebastianBergmann\Diff\Line type";i:3;s:36:" SebastianBergmann\Diff\Line content";s:8:"-1111111";}i:7;O:27:"SebastianBergmann\Diff\Line":2:{s:33:" SebastianBergmann\Diff\Line type";i:3;s:36:" SebastianBergmann\Diff\Line content";s:8:"-2222222";}i:8;O:27:"SebastianBergmann\Diff\Line":2:{s:33:" SebastianBergmann\Diff\Line type";i:3;s:36:" SebastianBergmann\Diff\Line content";s:7:"2222222";}i:9;O:27:"SebastianBergmann\Diff\Line":2:{s:33:" SebastianBergmann\Diff\Line type";i:3;s:36:" SebastianBergmann\Diff\Line content";s:7:"2222222";}i:10;O:27:"SebastianBergmann\Diff\Line":2:{s:33:" SebastianBergmann\Diff\Line type";i:3;s:36:" SebastianBergmann\Diff\Line content";s:7:"2222222";}}}i:2;O:28:"SebastianBergmann\Diff\Chunk":5:{s:35:" SebastianBergmann\Diff\Chunk start";i:17;s:40:" SebastianBergmann\Diff\Chunk startRange";i:5;s:33:" SebastianBergmann\Diff\Chunk end";i:16;s:38:" SebastianBergmann\Diff\Chunk endRange";i:6;s:35:" SebastianBergmann\Diff\Chunk lines";a:6:{i:0;O:27:"SebastianBergmann\Diff\Line":2:{s:33:" SebastianBergmann\Diff\Line type";i:3;s:36:" SebastianBergmann\Diff\Line content";s:7:"2222222";}i:1;O:27:"SebastianBergmann\Diff\Line":2:{s:33:" SebastianBergmann\Diff\Line type";i:3;s:36:" SebastianBergmann\Diff\Line content";s:7:"2222222";}i:2;O:27:"SebastianBergmann\Diff\Line":2:{s:33:" SebastianBergmann\Diff\Line type";i:3;s:36:" SebastianBergmann\Diff\Line content";s:7:"2222222";}i:3;O:27:"SebastianBergmann\Diff\Line":2:{s:33:" SebastianBergmann\Diff\Line type";i:3;s:36:" SebastianBergmann\Diff\Line content";s:8:"+2122212";}i:4;O:27:"SebastianBergmann\Diff\Line":2:{s:33:" SebastianBergmann\Diff\Line type";i:3;s:36:" SebastianBergmann\Diff\Line content";s:7:"2222222";}i:5;O:27:"SebastianBergmann\Diff\Line":2:{s:33:" SebastianBergmann\Diff\Line type";i:3;s:36:" SebastianBergmann\Diff\Line content";s:7:"2222222";}}}}}}
EOL;

        return array(
            array(
                "--- old.txt	2014-11-04 08:51:02.661868729 +0300\n+++ new.txt	2014-11-04 08:51:02.665868730 +0300\n@@ -1,3 +1,4 @@\n+2222111\n 1111111\n 1111111\n 1111111\n@@ -5,10 +6,8 @@\n 1111111\n 1111111\n 1111111\n +1121211\n 1111111\n -1111111\n -1111111\n -2222222\n 2222222\n 2222222\n 2222222\n@@ -17,5 +16,6 @@\n 2222222\n 2222222\n 2222222\n +2122212\n 2222222\n 2222222\n",
                \unserialize($Vhib24cjnzce)
            )
        );
    }

    
    public function testDiffDoNotShowNonDiffLines($Vwcb1oykhumm, $V2435fgfpotg, $Vusanxtmh52m)
    {
        $Vyxeqxkac2bx = new Differ('', false);
        $this->assertSame($Vwcb1oykhumm, $Vyxeqxkac2bx->diff($V2435fgfpotg, $Vusanxtmh52m));
    }

    public function textForNoNonDiffLinesProvider()
    {
        return array(
            array(
                '', 'a', 'a'
            ),
            array(
                "-A\n+C\n",
                "A\n\n\nB",
                "C\n\n\nB",
            ),
        );
    }

    
    public function testDiffToArrayInvalidFromType()
    {
        $Vyxeqxkac2bx = new Differ;

        $this->expectException('\InvalidArgumentException');
        $this->expectExceptionMessageRegExp('#^"from" must be an array or string\.$#');

        $Vyxeqxkac2bx->diffToArray(null, '');
    }

    
    public function testDiffInvalidToType()
    {
        $Vyxeqxkac2bx = new Differ;

        $this->expectException('\InvalidArgumentException');
        $this->expectExceptionMessageRegExp('#^"to" must be an array or string\.$#');

        $Vyxeqxkac2bx->diffToArray('', new \stdClass);
    }
}
