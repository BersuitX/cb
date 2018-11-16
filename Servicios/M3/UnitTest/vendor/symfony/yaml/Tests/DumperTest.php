<?php



namespace Symfony\Component\Yaml\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Dumper;
use Symfony\Component\Yaml\Yaml;

class DumperTest extends TestCase
{
    protected $V5zzh1da1wpy;
    protected $Vq1fff0huwrm;
    protected $V2bpoh5hagzp;

    protected $Vvs0hc5bhqj3 = array(
        '' => 'bar',
        'foo' => '#bar',
        'foo\'bar' => array(),
        'bar' => array(1, 'foo'),
        'foobar' => array(
            'foo' => 'bar',
            'bar' => array(1, 'foo'),
            'foobar' => array(
                'foo' => 'bar',
                'bar' => array(1, 'foo'),
            ),
        ),
    );

    protected function setUp()
    {
        $this->parser = new Parser();
        $this->dumper = new Dumper();
        $this->path = __DIR__.'/Fixtures';
    }

    protected function tearDown()
    {
        $this->parser = null;
        $this->dumper = null;
        $this->path = null;
        $this->array = null;
    }

    public function testIndentationInConstructor()
    {
        $Vq1fff0huwrm = new Dumper(7);
        $Vwcb1oykhumm = <<<'EOF'
'': bar
foo: '#bar'
'foo''bar': {  }
bar:
       - 1
       - foo
foobar:
       foo: bar
       bar:
              - 1
              - foo
       foobar:
              foo: bar
              bar:
                     - 1
                     - foo

EOF;
        $this->assertEquals($Vwcb1oykhumm, $Vq1fff0huwrm->dump($this->array, 4, 0));
    }

    
    public function testSetIndentation()
    {
        $this->dumper->setIndentation(7);

        $Vwcb1oykhumm = <<<'EOF'
'': bar
foo: '#bar'
'foo''bar': {  }
bar:
       - 1
       - foo
foobar:
       foo: bar
       bar:
              - 1
              - foo
       foobar:
              foo: bar
              bar:
                     - 1
                     - foo

EOF;
        $this->assertEquals($Vwcb1oykhumm, $this->dumper->dump($this->array, 4, 0));
    }

    public function testSpecifications()
    {
        $V5s0rodgwwbv = $this->parser->parse(file_get_contents($this->path.'/index.yml'));
        foreach ($V5s0rodgwwbv as $Vpu3xl4uhgg5) {
            $Vdmzqrkrhb5i = file_get_contents($this->path.'/'.$Vpu3xl4uhgg5.'.yml');

            
            foreach (preg_split('/^---( %YAML\:1\.0)?/m', $Vdmzqrkrhb5i) as $Vklvvq0m52jf) {
                if (!$Vklvvq0m52jf) {
                    continue;
                }

                $Vpswbntjg3pr = $this->parser->parse($Vklvvq0m52jf);
                if (isset($Vpswbntjg3pr['dump_skip']) && $Vpswbntjg3pr['dump_skip']) {
                    continue;
                } elseif (isset($Vpswbntjg3pr['todo']) && $Vpswbntjg3pr['todo']) {
                    
                } else {
                    eval('$Vwcb1oykhumm = '.trim($Vpswbntjg3pr['php']).';');
                    $this->assertSame($Vwcb1oykhumm, $this->parser->parse($this->dumper->dump($Vwcb1oykhumm, 10)), $Vpswbntjg3pr['test']);
                }
            }
        }
    }

    public function testInlineLevel()
    {
        $Vwcb1oykhumm = <<<'EOF'
{ '': bar, foo: '#bar', 'foo''bar': {  }, bar: [1, foo], foobar: { foo: bar, bar: [1, foo], foobar: { foo: bar, bar: [1, foo] } } }
EOF;
        $this->assertEquals($Vwcb1oykhumm, $this->dumper->dump($this->array, -10), '->dump() takes an inline level argument');
        $this->assertEquals($Vwcb1oykhumm, $this->dumper->dump($this->array, 0), '->dump() takes an inline level argument');

        $Vwcb1oykhumm = <<<'EOF'
'': bar
foo: '#bar'
'foo''bar': {  }
bar: [1, foo]
foobar: { foo: bar, bar: [1, foo], foobar: { foo: bar, bar: [1, foo] } }

EOF;
        $this->assertEquals($Vwcb1oykhumm, $this->dumper->dump($this->array, 1), '->dump() takes an inline level argument');

        $Vwcb1oykhumm = <<<'EOF'
'': bar
foo: '#bar'
'foo''bar': {  }
bar:
    - 1
    - foo
foobar:
    foo: bar
    bar: [1, foo]
    foobar: { foo: bar, bar: [1, foo] }

EOF;
        $this->assertEquals($Vwcb1oykhumm, $this->dumper->dump($this->array, 2), '->dump() takes an inline level argument');

        $Vwcb1oykhumm = <<<'EOF'
'': bar
foo: '#bar'
'foo''bar': {  }
bar:
    - 1
    - foo
foobar:
    foo: bar
    bar:
        - 1
        - foo
    foobar:
        foo: bar
        bar: [1, foo]

EOF;
        $this->assertEquals($Vwcb1oykhumm, $this->dumper->dump($this->array, 3), '->dump() takes an inline level argument');

        $Vwcb1oykhumm = <<<'EOF'
'': bar
foo: '#bar'
'foo''bar': {  }
bar:
    - 1
    - foo
foobar:
    foo: bar
    bar:
        - 1
        - foo
    foobar:
        foo: bar
        bar:
            - 1
            - foo

EOF;
        $this->assertEquals($Vwcb1oykhumm, $this->dumper->dump($this->array, 4), '->dump() takes an inline level argument');
        $this->assertEquals($Vwcb1oykhumm, $this->dumper->dump($this->array, 10), '->dump() takes an inline level argument');
    }

    public function testObjectSupportEnabled()
    {
        $V2g5tfv0g2dg = $this->dumper->dump(array('foo' => new A(), 'bar' => 1), 0, 0, Yaml::DUMP_OBJECT);

        $this->assertEquals('{ foo: !php/object \'O:30:"Symfony\Component\Yaml\Tests\A":1:{s:1:"a";s:3:"foo";}\', bar: 1 }', $V2g5tfv0g2dg, '->dump() is able to dump objects');
    }

    
    public function testObjectSupportEnabledPassingTrue()
    {
        $V2g5tfv0g2dg = $this->dumper->dump(array('foo' => new A(), 'bar' => 1), 0, 0, false, true);

        $this->assertEquals('{ foo: !php/object \'O:30:"Symfony\Component\Yaml\Tests\A":1:{s:1:"a";s:3:"foo";}\', bar: 1 }', $V2g5tfv0g2dg, '->dump() is able to dump objects');
    }

    public function testObjectSupportDisabledButNoExceptions()
    {
        $V2g5tfv0g2dg = $this->dumper->dump(array('foo' => new A(), 'bar' => 1));

        $this->assertEquals('{ foo: null, bar: 1 }', $V2g5tfv0g2dg, '->dump() does not dump objects when disabled');
    }

    
    public function testObjectSupportDisabledWithExceptions()
    {
        $this->dumper->dump(array('foo' => new A(), 'bar' => 1), 0, 0, Yaml::DUMP_EXCEPTION_ON_INVALID_TYPE);
    }

    
    public function testObjectSupportDisabledWithExceptionsPassingTrue()
    {
        $this->dumper->dump(array('foo' => new A(), 'bar' => 1), 0, 0, true);
    }

    public function testEmptyArray()
    {
        $V2g5tfv0g2dg = $this->dumper->dump(array());
        $this->assertEquals('{  }', $V2g5tfv0g2dg);

        $V2g5tfv0g2dg = $this->dumper->dump(array(), 0, 0, Yaml::DUMP_EMPTY_ARRAY_AS_SEQUENCE);
        $this->assertEquals('[]', $V2g5tfv0g2dg);

        $V2g5tfv0g2dg = $this->dumper->dump(array(), 9, 0, Yaml::DUMP_EMPTY_ARRAY_AS_SEQUENCE);
        $this->assertEquals('[]', $V2g5tfv0g2dg);

        $V2g5tfv0g2dg = $this->dumper->dump(new \ArrayObject(), 0, 0, Yaml::DUMP_EMPTY_ARRAY_AS_SEQUENCE | Yaml::DUMP_OBJECT_AS_MAP);
        $this->assertEquals('{  }', $V2g5tfv0g2dg);

        $V2g5tfv0g2dg = $this->dumper->dump(new \stdClass(), 0, 0, Yaml::DUMP_EMPTY_ARRAY_AS_SEQUENCE | Yaml::DUMP_OBJECT_AS_MAP);
        $this->assertEquals('{  }', $V2g5tfv0g2dg);
    }

    
    public function testEscapedEscapeSequencesInQuotedScalar($Vioma0xlpppc, $Vwcb1oykhumm)
    {
        $this->assertEquals($Vwcb1oykhumm, $this->dumper->dump($Vioma0xlpppc));
    }

    public function getEscapeSequences()
    {
        return array(
            'empty string' => array('', "''"),
            'null' => array("\x0", '"\\0"'),
            'bell' => array("\x7", '"\\a"'),
            'backspace' => array("\x8", '"\\b"'),
            'horizontal-tab' => array("\t", '"\\t"'),
            'line-feed' => array("\n", '"\\n"'),
            'vertical-tab' => array("\v", '"\\v"'),
            'form-feed' => array("\xC", '"\\f"'),
            'carriage-return' => array("\r", '"\\r"'),
            'escape' => array("\x1B", '"\\e"'),
            'space' => array(' ', "' '"),
            'double-quote' => array('"', "'\"'"),
            'slash' => array('/', '/'),
            'backslash' => array('\\', '\\'),
            'next-line' => array("\xC2\x85", '"\\N"'),
            'non-breaking-space' => array("\xc2\xa0", '"\\_"'),
            'line-separator' => array("\xE2\x80\xA8", '"\\L"'),
            'paragraph-separator' => array("\xE2\x80\xA9", '"\\P"'),
            'colon' => array(':', "':'"),
        );
    }

    public function testBinaryDataIsDumpedBase64Encoded()
    {
        $Vh2ndpr5enbe = file_get_contents(__DIR__.'/Fixtures/arrow.gif');
        $Vwcb1oykhumm = '{ data: !!binary '.base64_encode($Vh2ndpr5enbe).' }';

        $this->assertSame($Vwcb1oykhumm, $this->dumper->dump(array('data' => $Vh2ndpr5enbe)));
    }

    public function testNonUtf8DataIsDumpedBase64Encoded()
    {
        
        $this->assertSame('!!binary ZsM/cg==', $this->dumper->dump("f\xc3\x3fr"));
    }

    
    public function testDumpObjectAsMap($Vbj3pw2f5egf, $Vwcb1oykhumm)
    {
        $Vklvvq0m52jf = $this->dumper->dump($Vbj3pw2f5egf, 0, 0, Yaml::DUMP_OBJECT_AS_MAP);

        $this->assertEquals($Vwcb1oykhumm, Yaml::parse($Vklvvq0m52jf, Yaml::PARSE_OBJECT_FOR_MAP));
    }

    public function objectAsMapProvider()
    {
        $Vpswbntjg3prs = array();

        $Vwatlmbamu3p = new \stdClass();
        $Vwatlmbamu3p->class = 'classBar';
        $Vwatlmbamu3p->args = array('bar');
        $Vuisyivgntbu = new \stdClass();
        $Vrqaitdc0ft3 = new \stdClass();
        $Vrqaitdc0ft3->bar = $Vwatlmbamu3p;
        $Vrqaitdc0ft3->zar = $Vuisyivgntbu;
        $Vbj3pw2f5egf = new \stdClass();
        $Vbj3pw2f5egf->foo = $Vrqaitdc0ft3;
        $Vpswbntjg3prs['stdClass'] = array($Vbj3pw2f5egf, $Vbj3pw2f5egf);

        $Vvs0hc5bhqj3Object = new \ArrayObject();
        $Vvs0hc5bhqj3Object['foo'] = 'bar';
        $Vvs0hc5bhqj3Object['baz'] = 'foobar';
        $Vheuryubhqgn = new \stdClass();
        $Vheuryubhqgn->foo = 'bar';
        $Vheuryubhqgn->baz = 'foobar';
        $Vpswbntjg3prs['ArrayObject'] = array($Vvs0hc5bhqj3Object, $Vheuryubhqgn);

        $Vmbzc5xgwrgo = new A();
        $Vpswbntjg3prs['arbitrary-object'] = array($Vmbzc5xgwrgo, null);

        return $Vpswbntjg3prs;
    }

    public function testDumpingArrayObjectInstancesRespectsInlineLevel()
    {
        $Vgrzx13jyuqo = new \ArrayObject(array('deep1' => 'd', 'deep2' => 'e'));
        $Vihpgeyn2w4p = new \ArrayObject(array('inner1' => 'b', 'inner2' => 'c', 'inner3' => $Vgrzx13jyuqo));
        $Vghq2nrfl4kp = new \ArrayObject(array('outer1' => 'a', 'outer2' => $Vihpgeyn2w4p));

        $Vklvvq0m52jf = $this->dumper->dump($Vghq2nrfl4kp, 2, 0, Yaml::DUMP_OBJECT_AS_MAP);

        $Vwcb1oykhumm = <<<YAML
outer1: a
outer2:
    inner1: b
    inner2: c
    inner3: { deep1: d, deep2: e }

YAML;
        $this->assertSame($Vwcb1oykhumm, $Vklvvq0m52jf);
    }

    public function testDumpingArrayObjectInstancesWithNumericKeysInlined()
    {
        $Vgrzx13jyuqo = new \ArrayObject(array('d', 'e'));
        $Vihpgeyn2w4p = new \ArrayObject(array('b', 'c', $Vgrzx13jyuqo));
        $Vghq2nrfl4kp = new \ArrayObject(array('a', $Vihpgeyn2w4p));

        $Vklvvq0m52jf = $this->dumper->dump($Vghq2nrfl4kp, 0, 0, Yaml::DUMP_OBJECT_AS_MAP);
        $Vwcb1oykhumm = <<<YAML
{ 0: a, 1: { 0: b, 1: c, 2: { 0: d, 1: e } } }
YAML;
        $this->assertSame($Vwcb1oykhumm, $Vklvvq0m52jf);
    }

    public function testDumpingArrayObjectInstancesWithNumericKeysRespectsInlineLevel()
    {
        $Vgrzx13jyuqo = new \ArrayObject(array('d', 'e'));
        $Vihpgeyn2w4p = new \ArrayObject(array('b', 'c', $Vgrzx13jyuqo));
        $Vghq2nrfl4kp = new \ArrayObject(array('a', $Vihpgeyn2w4p));
        $Vklvvq0m52jf = $this->dumper->dump($Vghq2nrfl4kp, 2, 0, Yaml::DUMP_OBJECT_AS_MAP);
        $Vwcb1oykhumm = <<<YAML
0: a
1:
    0: b
    1: c
    2: { 0: d, 1: e }

YAML;
        $this->assertEquals($Vwcb1oykhumm, $Vklvvq0m52jf);
    }

    public function testDumpEmptyArrayObjectInstanceAsMap()
    {
        $this->assertSame('{  }', $this->dumper->dump(new \ArrayObject(), 2, 0, Yaml::DUMP_OBJECT_AS_MAP));
    }

    public function testDumpEmptyStdClassInstanceAsMap()
    {
        $this->assertSame('{  }', $this->dumper->dump(new \stdClass(), 2, 0, Yaml::DUMP_OBJECT_AS_MAP));
    }

    public function testDumpingStdClassInstancesRespectsInlineLevel()
    {
        $Vgrzx13jyuqo = new \stdClass();
        $Vgrzx13jyuqo->deep1 = 'd';
        $Vgrzx13jyuqo->deep2 = 'e';

        $Vihpgeyn2w4p = new \stdClass();
        $Vihpgeyn2w4p->inner1 = 'b';
        $Vihpgeyn2w4p->inner2 = 'c';
        $Vihpgeyn2w4p->inner3 = $Vgrzx13jyuqo;

        $Vghq2nrfl4kp = new \stdClass();
        $Vghq2nrfl4kp->outer1 = 'a';
        $Vghq2nrfl4kp->outer2 = $Vihpgeyn2w4p;

        $Vklvvq0m52jf = $this->dumper->dump($Vghq2nrfl4kp, 2, 0, Yaml::DUMP_OBJECT_AS_MAP);

        $Vwcb1oykhumm = <<<YAML
outer1: a
outer2:
    inner1: b
    inner2: c
    inner3: { deep1: d, deep2: e }

YAML;
        $this->assertSame($Vwcb1oykhumm, $Vklvvq0m52jf);
    }

    public function testDumpMultiLineStringAsScalarBlock()
    {
        $Vqhzkfsafzrc = array(
            'data' => array(
                'single_line' => 'foo bar baz',
                'multi_line' => "foo\nline with trailing spaces:\n  \nbar\ninteger like line:\n123456789\nempty line:\n\nbaz",
                'multi_line_with_carriage_return' => "foo\nbar\r\nbaz",
                'nested_inlined_multi_line_string' => array(
                    'inlined_multi_line' => "foo\nbar\r\nempty line:\n\nbaz",
                ),
            ),
        );

        $this->assertSame(file_get_contents(__DIR__.'/Fixtures/multiple_lines_as_literal_block.yml'), $this->dumper->dump($Vqhzkfsafzrc, 2, 0, Yaml::DUMP_MULTI_LINE_LITERAL_BLOCK));
    }

    public function testDumpMultiLineStringAsScalarBlockWhenFirstLineHasLeadingSpace()
    {
        $Vqhzkfsafzrc = array(
            'data' => array(
                'multi_line' => "    the first line has leading spaces\nThe second line does not.",
            ),
        );

        $this->assertSame(file_get_contents(__DIR__.'/Fixtures/multiple_lines_as_literal_block_leading_space_in_first_line.yml'), $this->dumper->dump($Vqhzkfsafzrc, 2, 0, Yaml::DUMP_MULTI_LINE_LITERAL_BLOCK));
    }

    public function testCarriageReturnIsMaintainedWhenDumpingAsMultiLineLiteralBlock()
    {
        $this->assertSame("- \"a\\r\\nb\\nc\"\n", $this->dumper->dump(array("a\r\nb\nc"), 2, 0, Yaml::DUMP_MULTI_LINE_LITERAL_BLOCK));
    }

    
    public function testZeroIndentationThrowsException()
    {
        new Dumper(0);
    }

    
    public function testNegativeIndentationThrowsException()
    {
        new Dumper(-4);
    }
}

class A
{
    public $Vmbzc5xgwrgo = 'foo';
}
