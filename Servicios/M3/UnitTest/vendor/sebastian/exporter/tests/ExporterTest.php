<?php


namespace SebastianBergmann\Exporter;


class ExporterTest extends \PHPUnit_Framework_TestCase
{
    
    private $Vnqoiikqsyp5;

    protected function setUp()
    {
        $this->exporter = new Exporter;
    }

    public function exportProvider()
    {
        $Vvhuu5wijnd1 = new \stdClass;
        $Vvhuu5wijnd1->foo = 'bar';

        $Vfyks4wg4wfx = (object)array(1,2,"Test\r\n",4,5,6,7,8);

        $Vuvvkm1baslr = new \stdClass;
        
        $Vuvvkm1baslr->null = null;
        
        $Vuvvkm1baslr->boolean = true;
        $Vuvvkm1baslr->integer = 1;
        $Vuvvkm1baslr->double = 1.2;
        $Vuvvkm1baslr->string = '1';
        $Vuvvkm1baslr->text = "this\nis\na\nvery\nvery\nvery\nvery\nvery\nvery\rlong\n\rtext";
        $Vuvvkm1baslr->object = $Vvhuu5wijnd1;
        $Vuvvkm1baslr->objectagain = $Vvhuu5wijnd1;
        $Vuvvkm1baslr->array = array('foo' => 'bar');
        $Vuvvkm1baslr->self = $Vuvvkm1baslr;

        $Vqictfcp0llj = new \SplObjectStorage;
        $Vqictfcp0llj->attach($Vvhuu5wijnd1);
        $Vqictfcp0llj->foo = $Vvhuu5wijnd1;

        return array(
            array(null, 'null'),
            array(true, 'true'),
            array(false, 'false'),
            array(1, '1'),
            array(1.0, '1.0'),
            array(1.2, '1.2'),
            array(fopen('php://memory', 'r'), 'resource(%d) of type (stream)'),
            array('1', "'1'"),
            array(array(array(1,2,3), array(3,4,5)),
        <<<EOF
Array &0 (
    0 => Array &1 (
        0 => 1
        1 => 2
        2 => 3
    )
    1 => Array &2 (
        0 => 3
        1 => 4
        2 => 5
    )
)
EOF
            ),
            
            array("this\nis\na\nvery\nvery\nvery\nvery\nvery\nvery\rlong\n\rtext",
            <<<EOF
'this
is
a
very
very
very
very
very
very
long
text'
EOF
            ),
            array(new \stdClass, 'stdClass Object &%x ()'),
            array($Vuvvkm1baslr,
            <<<EOF
stdClass Object &%x (
    'null' => null
    'boolean' => true
    'integer' => 1
    'double' => 1.2
    'string' => '1'
    'text' => 'this
is
a
very
very
very
very
very
very
long
text'
    'object' => stdClass Object &%x (
        'foo' => 'bar'
    )
    'objectagain' => stdClass Object &%x
    'array' => Array &%d (
        'foo' => 'bar'
    )
    'self' => stdClass Object &%x
)
EOF
            ),
            array(array(), 'Array &%d ()'),
            array($Vqictfcp0llj,
            <<<EOF
SplObjectStorage Object &%x (
    'foo' => stdClass Object &%x (
        'foo' => 'bar'
    )
    '%x' => Array &0 (
        'obj' => stdClass Object &%x
        'inf' => null
    )
)
EOF
            ),
            array($Vfyks4wg4wfx,
            <<<EOF
stdClass Object &%x (
    0 => 1
    1 => 2
    2 => 'Test\n'
    3 => 4
    4 => 5
    5 => 6
    6 => 7
    7 => 8
)
EOF
            ),
            array(
                chr(0) . chr(1) . chr(2) . chr(3) . chr(4) . chr(5),
                'Binary String: 0x000102030405'
            ),
            array(
                implode('', array_map('chr', range(0x0e, 0x1f))),
                'Binary String: 0x0e0f101112131415161718191a1b1c1d1e1f'
            ),
            array(
                chr(0x00) . chr(0x09),
                'Binary String: 0x0009'
            ),
            array(
                '',
                "''"
            ),
        );
    }

    
    public function testExport($Vcptarsq5qe4, $Vwcb1oykhumm)
    {
        $this->assertStringMatchesFormat(
            $Vwcb1oykhumm,
            $this->trimNewline($this->exporter->export($Vcptarsq5qe4))
        );
    }

    public function testExport2()
    {
        if (PHP_VERSION === '5.3.3') {
            $this->markTestSkipped('Skipped due to "Nesting level too deep - recursive dependency?" fatal error');
        }

        $Vuvvkm1baslr = new \stdClass;
        $Vuvvkm1baslr->foo = 'bar';

        $Vvs0hc5bhqj3 = array(
            0 => 0,
            'null' => null,
            'boolean' => true,
            'integer' => 1,
            'double' => 1.2,
            'string' => '1',
            'text' => "this\nis\na\nvery\nvery\nvery\nvery\nvery\nvery\rlong\n\rtext",
            'object' => $Vuvvkm1baslr,
            'objectagain' => $Vuvvkm1baslr,
            'array' => array('foo' => 'bar'),
        );

        $Vvs0hc5bhqj3['self'] = &$Vvs0hc5bhqj3;

        $Vwcb1oykhumm = <<<EOF
Array &%d (
    0 => 0
    'null' => null
    'boolean' => true
    'integer' => 1
    'double' => 1.2
    'string' => '1'
    'text' => 'this
is
a
very
very
very
very
very
very
long
text'
    'object' => stdClass Object &%x (
        'foo' => 'bar'
    )
    'objectagain' => stdClass Object &%x
    'array' => Array &%d (
        'foo' => 'bar'
    )
    'self' => Array &%d (
        0 => 0
        'null' => null
        'boolean' => true
        'integer' => 1
        'double' => 1.2
        'string' => '1'
        'text' => 'this
is
a
very
very
very
very
very
very
long
text'
        'object' => stdClass Object &%x
        'objectagain' => stdClass Object &%x
        'array' => Array &%d (
            'foo' => 'bar'
        )
        'self' => Array &%d
    )
)
EOF;

        $this->assertStringMatchesFormat(
            $Vwcb1oykhumm,
            $this->trimNewline($this->exporter->export($Vvs0hc5bhqj3))
        );
    }

    public function shortenedExportProvider()
    {
        $Vuvvkm1baslr = new \stdClass;
        $Vuvvkm1baslr->foo = 'bar';

        $Vvs0hc5bhqj3 = array(
            'foo' => 'bar',
        );

        return array(
            array(null, 'null'),
            array(true, 'true'),
            array(1, '1'),
            array(1.0, '1.0'),
            array(1.2, '1.2'),
            array('1', "'1'"),
            
            array("this\nis\na\nvery\nvery\nvery\nvery\nvery\nvery\rlong\n\rtext", "'this\\nis\\na\\nvery\\nvery\\nvery\\nvery...g\\ntext'"),
            array(new \stdClass, 'stdClass Object ()'),
            array($Vuvvkm1baslr, 'stdClass Object (...)'),
            array(array(), 'Array ()'),
            array($Vvs0hc5bhqj3, 'Array (...)'),
        );
    }

    
    public function testShortenedExport($Vcptarsq5qe4, $Vwcb1oykhumm)
    {
        $this->assertSame(
            $Vwcb1oykhumm,
            $this->trimNewline($this->exporter->shortenedExport($Vcptarsq5qe4))
        );
    }

    
    public function testShortenedExportForMultibyteCharacters()
    {
        $V4uvewqesuku = mb_language();
        mb_language('Japanese');
        $Vhqeswhqokg4 = mb_internal_encoding();
        mb_internal_encoding('UTF-8');

        try {
            $this->assertSame(
              "'いろはにほへとちりぬるをわかよたれそつねならむうゐのおくや...しゑひもせす'",
              $this->trimNewline($this->exporter->shortenedExport('いろはにほへとちりぬるをわかよたれそつねならむうゐのおくやまけふこえてあさきゆめみしゑひもせす'))
            );
        } catch (\Exception $Vpt32vvhspnv) {
            mb_internal_encoding($Vhqeswhqokg4);
            mb_language($V4uvewqesuku);
            throw $Vpt32vvhspnv;
        }

        mb_internal_encoding($Vhqeswhqokg4);
        mb_language($V4uvewqesuku);
    }

    public function provideNonBinaryMultibyteStrings()
    {
        return array(
            array(implode('', array_map('chr', range(0x09, 0x0d))), 5),
            array(implode('', array_map('chr', range(0x20, 0x7f))), 96),
            array(implode('', array_map('chr', range(0x80, 0xff))), 128),
        );
    }


    
    public function testNonBinaryStringExport($Vcptarsq5qe4, $Vwcb1oykhummLength)
    {
        $this->assertRegExp(
            "~'.{{$Vwcb1oykhummLength}}'\$~s",
            $this->exporter->export($Vcptarsq5qe4)
        );
    }

    public function testNonObjectCanBeReturnedAsArray()
    {
        $this->assertEquals(array(true), $this->exporter->toArray(true));
    }

    private function trimNewline($Ve5tcsso230g)
    {
        return preg_replace('/[ ]*\n/', "\n", $Ve5tcsso230g);
    }
}
