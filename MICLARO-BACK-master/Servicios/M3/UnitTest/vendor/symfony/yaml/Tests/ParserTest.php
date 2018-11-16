<?php



namespace Symfony\Component\Yaml\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Tag\TaggedValue;

class ParserTest extends TestCase
{
    
    protected $V5zzh1da1wpy;

    protected function setUp()
    {
        $this->parser = new Parser();
    }

    protected function tearDown()
    {
        $this->parser = null;

        chmod(__DIR__.'/Fixtures/not_readable.yml', 0644);
    }

    
    public function testSpecifications($Vwcb1oykhumm, $Vklvvq0m52jf, $Va1khwntce20, $V45wfzpn5lpb)
    {
        $V433zsohulvp = array();

        if ($V45wfzpn5lpb) {
            set_error_handler(function ($V31qrja1w0r2, $Vpwkxhlz43ob) use (&$V433zsohulvp) {
                if (E_USER_DEPRECATED !== $V31qrja1w0r2) {
                    restore_error_handler();

                    if (class_exists('PHPUnit_Util_ErrorHandler')) {
                        return call_user_func_array('PHPUnit_Util_ErrorHandler::handleError', func_get_args());
                    }

                    return call_user_func_array('PHPUnit\Util\ErrorHandler::handleError', func_get_args());
                }

                $V433zsohulvp[] = $Vpwkxhlz43ob;
            });
        }

        $this->assertEquals($Vwcb1oykhumm, var_export($this->parser->parse($Vklvvq0m52jf), true), $Va1khwntce20);

        if ($V45wfzpn5lpb) {
            restore_error_handler();

            $this->assertCount(1, $V433zsohulvp);
            $this->assertContains(true !== $V45wfzpn5lpb ? $V45wfzpn5lpb : 'Using the comma as a group separator for floats is deprecated since Symfony 3.2 and will be removed in 4.0 on line 1.', $V433zsohulvp[0]);
        }
    }

    public function getDataFormSpecifications()
    {
        return $this->loadTestsFromFixtureFiles('index.yml');
    }

    
    public function testNonStringMappingKeys($Vwcb1oykhumm, $Vklvvq0m52jf, $Va1khwntce20)
    {
        $this->assertSame($Vwcb1oykhumm, var_export($this->parser->parse($Vklvvq0m52jf, Yaml::PARSE_KEYS_AS_STRINGS), true), $Va1khwntce20);
    }

    public function getNonStringMappingKeysData()
    {
        return $this->loadTestsFromFixtureFiles('nonStringKeys.yml');
    }

    
    public function testLegacyNonStringMappingKeys($Vwcb1oykhumm, $Vklvvq0m52jf, $Va1khwntce20)
    {
        $this->assertSame($Vwcb1oykhumm, var_export($this->parser->parse($Vklvvq0m52jf), true), $Va1khwntce20);
    }

    public function getLegacyNonStringMappingKeysData()
    {
        return $this->loadTestsFromFixtureFiles('legacyNonStringKeys.yml');
    }

    public function testTabsInYaml()
    {
        
        $Vklvvq0m52jfs = array(
            "foo:\n	bar",
            "foo:\n 	bar",
            "foo:\n	 bar",
            "foo:\n 	 bar",
        );

        foreach ($Vklvvq0m52jfs as $Vklvvq0m52jf) {
            try {
                $Vjdkyvjsoqdn = $this->parser->parse($Vklvvq0m52jf);

                $this->fail('YAML files must not contain tabs');
            } catch (\Exception $Vpt32vvhspnv) {
                $this->assertInstanceOf('\Exception', $Vpt32vvhspnv, 'YAML files must not contain tabs');
                $this->assertEquals('A YAML file cannot contain tabs as indentation at line 2 (near "'.strpbrk($Vklvvq0m52jf, "\t").'").', $Vpt32vvhspnv->getMessage(), 'YAML files must not contain tabs');
            }
        }
    }

    public function testEndOfTheDocumentMarker()
    {
        $Vklvvq0m52jf = <<<'EOF'
--- %YAML:1.0
foo
...
EOF;

        $this->assertEquals('foo', $this->parser->parse($Vklvvq0m52jf));
    }

    public function getBlockChompingTests()
    {
        $Vo50qpjpkko3 = array();

        $Vklvvq0m52jf = <<<'EOF'
foo: |-
    one
    two
bar: |-
    one
    two

EOF;
        $Vwcb1oykhumm = array(
            'foo' => "one\ntwo",
            'bar' => "one\ntwo",
        );
        $Vo50qpjpkko3['Literal block chomping strip with single trailing newline'] = array($Vwcb1oykhumm, $Vklvvq0m52jf);

        $Vklvvq0m52jf = <<<'EOF'
foo: |-
    one
    two

bar: |-
    one
    two


EOF;
        $Vwcb1oykhumm = array(
            'foo' => "one\ntwo",
            'bar' => "one\ntwo",
        );
        $Vo50qpjpkko3['Literal block chomping strip with multiple trailing newlines'] = array($Vwcb1oykhumm, $Vklvvq0m52jf);

        $Vklvvq0m52jf = <<<'EOF'
{}


EOF;
        $Vwcb1oykhumm = array();
        $Vo50qpjpkko3['Literal block chomping strip with multiple trailing newlines after a 1-liner'] = array($Vwcb1oykhumm, $Vklvvq0m52jf);

        $Vklvvq0m52jf = <<<'EOF'
foo: |-
    one
    two
bar: |-
    one
    two
EOF;
        $Vwcb1oykhumm = array(
            'foo' => "one\ntwo",
            'bar' => "one\ntwo",
        );
        $Vo50qpjpkko3['Literal block chomping strip without trailing newline'] = array($Vwcb1oykhumm, $Vklvvq0m52jf);

        $Vklvvq0m52jf = <<<'EOF'
foo: |
    one
    two
bar: |
    one
    two

EOF;
        $Vwcb1oykhumm = array(
            'foo' => "one\ntwo\n",
            'bar' => "one\ntwo\n",
        );
        $Vo50qpjpkko3['Literal block chomping clip with single trailing newline'] = array($Vwcb1oykhumm, $Vklvvq0m52jf);

        $Vklvvq0m52jf = <<<'EOF'
foo: |
    one
    two

bar: |
    one
    two


EOF;
        $Vwcb1oykhumm = array(
            'foo' => "one\ntwo\n",
            'bar' => "one\ntwo\n",
        );
        $Vo50qpjpkko3['Literal block chomping clip with multiple trailing newlines'] = array($Vwcb1oykhumm, $Vklvvq0m52jf);

        $Vklvvq0m52jf = <<<'EOF'
foo:
- bar: |
    one

    two
EOF;
        $Vwcb1oykhumm = array(
            'foo' => array(
                array(
                    'bar' => "one\n\ntwo",
                ),
            ),
        );
        $Vo50qpjpkko3['Literal block chomping clip with embedded blank line inside unindented collection'] = array($Vwcb1oykhumm, $Vklvvq0m52jf);

        $Vklvvq0m52jf = <<<'EOF'
foo: |
    one
    two
bar: |
    one
    two
EOF;
        $Vwcb1oykhumm = array(
            'foo' => "one\ntwo\n",
            'bar' => "one\ntwo",
        );
        $Vo50qpjpkko3['Literal block chomping clip without trailing newline'] = array($Vwcb1oykhumm, $Vklvvq0m52jf);

        $Vklvvq0m52jf = <<<'EOF'
foo: |+
    one
    two
bar: |+
    one
    two

EOF;
        $Vwcb1oykhumm = array(
            'foo' => "one\ntwo\n",
            'bar' => "one\ntwo\n",
        );
        $Vo50qpjpkko3['Literal block chomping keep with single trailing newline'] = array($Vwcb1oykhumm, $Vklvvq0m52jf);

        $Vklvvq0m52jf = <<<'EOF'
foo: |+
    one
    two

bar: |+
    one
    two


EOF;
        $Vwcb1oykhumm = array(
            'foo' => "one\ntwo\n\n",
            'bar' => "one\ntwo\n\n",
        );
        $Vo50qpjpkko3['Literal block chomping keep with multiple trailing newlines'] = array($Vwcb1oykhumm, $Vklvvq0m52jf);

        $Vklvvq0m52jf = <<<'EOF'
foo: |+
    one
    two
bar: |+
    one
    two
EOF;
        $Vwcb1oykhumm = array(
            'foo' => "one\ntwo\n",
            'bar' => "one\ntwo",
        );
        $Vo50qpjpkko3['Literal block chomping keep without trailing newline'] = array($Vwcb1oykhumm, $Vklvvq0m52jf);

        $Vklvvq0m52jf = <<<'EOF'
foo: >-
    one
    two
bar: >-
    one
    two

EOF;
        $Vwcb1oykhumm = array(
            'foo' => 'one two',
            'bar' => 'one two',
        );
        $Vo50qpjpkko3['Folded block chomping strip with single trailing newline'] = array($Vwcb1oykhumm, $Vklvvq0m52jf);

        $Vklvvq0m52jf = <<<'EOF'
foo: >-
    one
    two

bar: >-
    one
    two


EOF;
        $Vwcb1oykhumm = array(
            'foo' => 'one two',
            'bar' => 'one two',
        );
        $Vo50qpjpkko3['Folded block chomping strip with multiple trailing newlines'] = array($Vwcb1oykhumm, $Vklvvq0m52jf);

        $Vklvvq0m52jf = <<<'EOF'
foo: >-
    one
    two
bar: >-
    one
    two
EOF;
        $Vwcb1oykhumm = array(
            'foo' => 'one two',
            'bar' => 'one two',
        );
        $Vo50qpjpkko3['Folded block chomping strip without trailing newline'] = array($Vwcb1oykhumm, $Vklvvq0m52jf);

        $Vklvvq0m52jf = <<<'EOF'
foo: >
    one
    two
bar: >
    one
    two

EOF;
        $Vwcb1oykhumm = array(
            'foo' => "one two\n",
            'bar' => "one two\n",
        );
        $Vo50qpjpkko3['Folded block chomping clip with single trailing newline'] = array($Vwcb1oykhumm, $Vklvvq0m52jf);

        $Vklvvq0m52jf = <<<'EOF'
foo: >
    one
    two

bar: >
    one
    two


EOF;
        $Vwcb1oykhumm = array(
            'foo' => "one two\n",
            'bar' => "one two\n",
        );
        $Vo50qpjpkko3['Folded block chomping clip with multiple trailing newlines'] = array($Vwcb1oykhumm, $Vklvvq0m52jf);

        $Vklvvq0m52jf = <<<'EOF'
foo: >
    one
    two
bar: >
    one
    two
EOF;
        $Vwcb1oykhumm = array(
            'foo' => "one two\n",
            'bar' => 'one two',
        );
        $Vo50qpjpkko3['Folded block chomping clip without trailing newline'] = array($Vwcb1oykhumm, $Vklvvq0m52jf);

        $Vklvvq0m52jf = <<<'EOF'
foo: >+
    one
    two
bar: >+
    one
    two

EOF;
        $Vwcb1oykhumm = array(
            'foo' => "one two\n",
            'bar' => "one two\n",
        );
        $Vo50qpjpkko3['Folded block chomping keep with single trailing newline'] = array($Vwcb1oykhumm, $Vklvvq0m52jf);

        $Vklvvq0m52jf = <<<'EOF'
foo: >+
    one
    two

bar: >+
    one
    two


EOF;
        $Vwcb1oykhumm = array(
            'foo' => "one two\n\n",
            'bar' => "one two\n\n",
        );
        $Vo50qpjpkko3['Folded block chomping keep with multiple trailing newlines'] = array($Vwcb1oykhumm, $Vklvvq0m52jf);

        $Vklvvq0m52jf = <<<'EOF'
foo: >+
    one
    two
bar: >+
    one
    two
EOF;
        $Vwcb1oykhumm = array(
            'foo' => "one two\n",
            'bar' => 'one two',
        );
        $Vo50qpjpkko3['Folded block chomping keep without trailing newline'] = array($Vwcb1oykhumm, $Vklvvq0m52jf);

        return $Vo50qpjpkko3;
    }

    
    public function testBlockChomping($Vwcb1oykhumm, $Vklvvq0m52jf)
    {
        $this->assertSame($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf));
    }

    
    public function testBlockLiteralWithLeadingNewlines()
    {
        $Vklvvq0m52jf = <<<'EOF'
foo: |-


    bar

EOF;
        $Vwcb1oykhumm = array(
            'foo' => "\n\nbar",
        );

        $this->assertSame($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf));
    }

    public function testObjectSupportEnabled()
    {
        $Vioma0xlpppc = <<<'EOF'
foo: !php/object O:30:"Symfony\Component\Yaml\Tests\B":1:{s:1:"b";s:3:"foo";}
bar: 1
EOF;
        $this->assertEquals(array('foo' => new B(), 'bar' => 1), $this->parser->parse($Vioma0xlpppc, Yaml::PARSE_OBJECT), '->parse() is able to parse objects');
    }

    
    public function testObjectSupportEnabledPassingTrue()
    {
        $Vioma0xlpppc = <<<'EOF'
foo: !php/object:O:30:"Symfony\Component\Yaml\Tests\B":1:{s:1:"b";s:3:"foo";}
bar: 1
EOF;
        $this->assertEquals(array('foo' => new B(), 'bar' => 1), $this->parser->parse($Vioma0xlpppc, false, true), '->parse() is able to parse objects');
    }

    
    public function testObjectSupportEnabledWithDeprecatedTag($Vklvvq0m52jf)
    {
        $this->assertEquals(array('foo' => new B(), 'bar' => 1), $this->parser->parse($Vklvvq0m52jf, Yaml::PARSE_OBJECT), '->parse() is able to parse objects');
    }

    public function deprecatedObjectValueProvider()
    {
        return array(
            array(
                <<<YAML
foo: !!php/object:O:30:"Symfony\Component\Yaml\Tests\B":1:{s:1:"b";s:3:"foo";}
bar: 1
YAML
            ),
            array(
                <<<YAML
foo: !php/object:O:30:"Symfony\Component\Yaml\Tests\B":1:{s:1:"b";s:3:"foo";}
bar: 1
YAML
            ),
        );
    }

    
    public function testObjectSupportDisabledButNoExceptions($Vioma0xlpppc)
    {
        $this->assertEquals(array('foo' => null, 'bar' => 1), $this->parser->parse($Vioma0xlpppc), '->parse() does not parse objects');
    }

    
    public function testObjectForMap($Vklvvq0m52jf, $Vwcb1oykhumm)
    {
        $Vrycsn2lkvcj = Yaml::PARSE_OBJECT_FOR_MAP;

        $this->assertEquals($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf, $Vrycsn2lkvcj));
    }

    
    public function testObjectForMapEnabledWithMappingUsingBooleanToggles($Vklvvq0m52jf, $Vwcb1oykhumm)
    {
        $this->assertEquals($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf, false, false, true));
    }

    public function getObjectForMapTests()
    {
        $Vo50qpjpkko3 = array();

        $Vklvvq0m52jf = <<<'EOF'
foo:
    fiz: [cat]
EOF;
        $Vwcb1oykhumm = new \stdClass();
        $Vwcb1oykhumm->foo = new \stdClass();
        $Vwcb1oykhumm->foo->fiz = array('cat');
        $Vo50qpjpkko3['mapping'] = array($Vklvvq0m52jf, $Vwcb1oykhumm);

        $Vklvvq0m52jf = '{ "foo": "bar", "fiz": "cat" }';
        $Vwcb1oykhumm = new \stdClass();
        $Vwcb1oykhumm->foo = 'bar';
        $Vwcb1oykhumm->fiz = 'cat';
        $Vo50qpjpkko3['inline-mapping'] = array($Vklvvq0m52jf, $Vwcb1oykhumm);

        $Vklvvq0m52jf = "foo: bar\nbaz: foobar";
        $Vwcb1oykhumm = new \stdClass();
        $Vwcb1oykhumm->foo = 'bar';
        $Vwcb1oykhumm->baz = 'foobar';
        $Vo50qpjpkko3['object-for-map-is-applied-after-parsing'] = array($Vklvvq0m52jf, $Vwcb1oykhumm);

        $Vklvvq0m52jf = <<<'EOT'
array:
  - key: one
  - key: two
EOT;
        $Vwcb1oykhumm = new \stdClass();
        $Vwcb1oykhumm->array = array();
        $Vwcb1oykhumm->array[0] = new \stdClass();
        $Vwcb1oykhumm->array[0]->key = 'one';
        $Vwcb1oykhumm->array[1] = new \stdClass();
        $Vwcb1oykhumm->array[1]->key = 'two';
        $Vo50qpjpkko3['nest-map-and-sequence'] = array($Vklvvq0m52jf, $Vwcb1oykhumm);

        $Vklvvq0m52jf = <<<'YAML'
map:
  1: one
  2: two
YAML;
        $Vwcb1oykhumm = new \stdClass();
        $Vwcb1oykhumm->map = new \stdClass();
        $Vwcb1oykhumm->map->{1} = 'one';
        $Vwcb1oykhumm->map->{2} = 'two';
        $Vo50qpjpkko3['numeric-keys'] = array($Vklvvq0m52jf, $Vwcb1oykhumm);

        $Vklvvq0m52jf = <<<'YAML'
map:
  '0': one
  '1': two
YAML;
        $Vwcb1oykhumm = new \stdClass();
        $Vwcb1oykhumm->map = new \stdClass();
        $Vwcb1oykhumm->map->{0} = 'one';
        $Vwcb1oykhumm->map->{1} = 'two';
        $Vo50qpjpkko3['zero-indexed-numeric-keys'] = array($Vklvvq0m52jf, $Vwcb1oykhumm);

        return $Vo50qpjpkko3;
    }

    
    public function testObjectsSupportDisabledWithExceptions($Vklvvq0m52jf)
    {
        $this->parser->parse($Vklvvq0m52jf, Yaml::PARSE_EXCEPTION_ON_INVALID_TYPE);
    }

    public function testCanParseContentWithTrailingSpaces()
    {
        $Vklvvq0m52jf = "items:  \n  foo: bar";

        $Vwcb1oykhumm = array(
            'items' => array('foo' => 'bar'),
        );

        $this->assertSame($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf));
    }

    
    public function testObjectsSupportDisabledWithExceptionsUsingBooleanToggles($Vklvvq0m52jf)
    {
        $this->parser->parse($Vklvvq0m52jf, true);
    }

    public function invalidDumpedObjectProvider()
    {
        $Vklvvq0m52jfTag = <<<'EOF'
foo: !!php/object:O:30:"Symfony\Tests\Component\Yaml\B":1:{s:1:"b";s:3:"foo";}
bar: 1
EOF;
        $Vhj3r3agkppl = <<<'EOF'
foo: !php/object:O:30:"Symfony\Tests\Component\Yaml\B":1:{s:1:"b";s:3:"foo";}
bar: 1
EOF;

        return array(
            'yaml-tag' => array($Vklvvq0m52jfTag),
            'local-tag' => array($Vhj3r3agkppl),
        );
    }

    
    public function testNonUtf8Exception()
    {
        $Vklvvq0m52jfs = array(
            iconv('UTF-8', 'ISO-8859-1', "foo: 'äöüß'"),
            iconv('UTF-8', 'ISO-8859-15', "euro: '€'"),
            iconv('UTF-8', 'CP1252', "cp1252: '©ÉÇáñ'"),
        );

        foreach ($Vklvvq0m52jfs as $Vklvvq0m52jf) {
            try {
                $this->parser->parse($Vklvvq0m52jf);

                $this->fail('charsets other than UTF-8 are rejected.');
            } catch (\Exception $Vpt32vvhspnv) {
                $this->assertInstanceOf('Symfony\Component\Yaml\Exception\ParseException', $Vpt32vvhspnv, 'charsets other than UTF-8 are rejected.');
            }
        }
    }

    
    public function testUnindentedCollectionException()
    {
        $Vklvvq0m52jf = <<<'EOF'

collection:
-item1
-item2
-item3

EOF;

        $this->parser->parse($Vklvvq0m52jf);
    }

    
    public function testShortcutKeyUnindentedCollectionException()
    {
        $Vklvvq0m52jf = <<<'EOF'

collection:
-  key: foo
  foo: bar

EOF;

        $this->parser->parse($Vklvvq0m52jf);
    }

    
    public function testMultipleDocumentsNotSupportedException()
    {
        Yaml::parse(<<<'EOL'
# Ranking of 1998 home runs
---
- Mark McGwire
- Sammy Sosa
- Ken Griffey

# Team ranking
---
- Chicago Cubs
- St Louis Cardinals
EOL
        );
    }

    
    public function testSequenceInAMapping()
    {
        Yaml::parse(<<<'EOF'
yaml:
  hash: me
  - array stuff
EOF
        );
    }

    public function testSequenceInMappingStartedBySingleDashLine()
    {
        $Vklvvq0m52jf = <<<'EOT'
a:
-
  b:
  -
    bar: baz
- foo
d: e
EOT;
        $Vwcb1oykhumm = array(
            'a' => array(
                array(
                    'b' => array(
                        array(
                            'bar' => 'baz',
                        ),
                    ),
                ),
                'foo',
            ),
            'd' => 'e',
        );

        $this->assertSame($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf));
    }

    public function testSequenceFollowedByCommentEmbeddedInMapping()
    {
        $Vklvvq0m52jf = <<<'EOT'
a:
    b:
        - c
# comment
    d: e
EOT;
        $Vwcb1oykhumm = array(
            'a' => array(
                'b' => array('c'),
                'd' => 'e',
            ),
        );

        $this->assertSame($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf));
    }

    public function testNonStringFollowedByCommentEmbeddedInMapping()
    {
        $Vklvvq0m52jf = <<<'EOT'
a:
    b:
        {}
# comment
    d:
        1.1
# another comment
EOT;
        $Vwcb1oykhumm = array(
            'a' => array(
                'b' => array(),
                'd' => 1.1,
            ),
        );

        $this->assertSame($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf));
    }

    public function getParseExceptionNotAffectedMultiLineStringLastResortParsing()
    {
        $Vo50qpjpkko3 = array();

        $Vklvvq0m52jf = <<<'EOT'
a
    b:
EOT;
        $Vo50qpjpkko3['parse error on first line'] = array($Vklvvq0m52jf);

        $Vklvvq0m52jf = <<<'EOT'
a

b
    c:
EOT;
        $Vo50qpjpkko3['parse error due to inconsistent indentation'] = array($Vklvvq0m52jf);

        $Vklvvq0m52jf = <<<'EOT'
 &  *  !  |  >  '  "  %  @  ` #, { asd a;sdasd }-@^qw3
EOT;
        $Vo50qpjpkko3['symfony/symfony/issues/22967#issuecomment-322067742'] = array($Vklvvq0m52jf);

        return $Vo50qpjpkko3;
    }

    /**
     * @dataProvider getParseExceptionNotAffectedMultiLineStringLastResortParsing
     * @expectedException \Symfony\Component\Yaml\Exception\ParseException
     */
    public function testParseExceptionNotAffectedByMultiLineStringLastResortParsing($Vklvvq0m52jf)
    {
        $this->parser->parse($Vklvvq0m52jf);
    }

    public function testMultiLineStringLastResortParsing()
    {
        $Vklvvq0m52jf = <<<'EOT'
test:
  You can have things that don't look like strings here
  true
  yes you can
EOT;
        $Vwcb1oykhumm = array(
            'test' => 'You can have things that don\'t look like strings here true yes you can',
        );

        $this->assertSame($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf));

        $Vklvvq0m52jf = <<<'EOT'
a:
    b
       c
EOT;
        $Vwcb1oykhumm = array(
            'a' => 'b c',
        );

        $this->assertSame($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf));
    }

    
    public function testMappingInASequence()
    {
        Yaml::parse(<<<'EOF'
yaml:
  - array stuff
  hash: me
EOF
        );
    }

    
    public function testScalarInSequence()
    {
        Yaml::parse(<<<'EOF'
foo:
    - bar
"missing colon"
    foo: bar
EOF
        );
    }

    
    public function testMappingDuplicateKeyBlock()
    {
        $Vioma0xlpppc = <<<'EOD'
parent:
    child: first
    child: duplicate
parent:
    child: duplicate
    child: duplicate
EOD;
        $Vwcb1oykhumm = array(
            'parent' => array(
                'child' => 'first',
            ),
        );
        $this->assertSame($Vwcb1oykhumm, Yaml::parse($Vioma0xlpppc));
    }

    
    public function testMappingDuplicateKeyFlow()
    {
        $Vioma0xlpppc = <<<'EOD'
parent: { child: first, child: duplicate }
parent: { child: duplicate, child: duplicate }
EOD;
        $Vwcb1oykhumm = array(
            'parent' => array(
                'child' => 'first',
            ),
        );
        $this->assertSame($Vwcb1oykhumm, Yaml::parse($Vioma0xlpppc));
    }

    
    public function testParseExceptionOnDuplicate($Vioma0xlpppc, $Vsp15uimbir3, $Vft5ytzqy3fl)
    {
        Yaml::parse($Vioma0xlpppc);
    }

    public function getParseExceptionOnDuplicateData()
    {
        $Vo50qpjpkko3 = array();

        $Vklvvq0m52jf = <<<EOD
parent: { child: first, child: duplicate }
EOD;
        $Vo50qpjpkko3[] = array($Vklvvq0m52jf, 'child', 1);

        $Vklvvq0m52jf = <<<EOD
parent:
  child: first,
  child: duplicate
EOD;
        $Vo50qpjpkko3[] = array($Vklvvq0m52jf, 'child', 3);

        $Vklvvq0m52jf = <<<EOD
parent: { child: foo }
parent: { child: bar }
EOD;
        $Vo50qpjpkko3[] = array($Vklvvq0m52jf, 'parent', 2);

        $Vklvvq0m52jf = <<<EOD
parent: { child_mapping: { value: bar},  child_mapping: { value: bar} }
EOD;
        $Vo50qpjpkko3[] = array($Vklvvq0m52jf, 'child_mapping', 1);

        $Vklvvq0m52jf = <<<EOD
parent:
  child_mapping:
    value: bar
  child_mapping:
    value: bar
EOD;
        $Vo50qpjpkko3[] = array($Vklvvq0m52jf, 'child_mapping', 4);

        $Vklvvq0m52jf = <<<EOD
parent: { child_sequence: ['key1', 'key2', 'key3'],  child_sequence: ['key1', 'key2', 'key3'] }
EOD;
        $Vo50qpjpkko3[] = array($Vklvvq0m52jf, 'child_sequence', 1);

        $Vklvvq0m52jf = <<<EOD
parent:
  child_sequence:
    - key1
    - key2
    - key3
  child_sequence:
    - key1
    - key2
    - key3
EOD;
        $Vo50qpjpkko3[] = array($Vklvvq0m52jf, 'child_sequence', 6);

        return $Vo50qpjpkko3;
    }

    public function testEmptyValue()
    {
        $Vioma0xlpppc = <<<'EOF'
hash:
EOF;

        $this->assertEquals(array('hash' => null), Yaml::parse($Vioma0xlpppc));
    }

    public function testCommentAtTheRootIndent()
    {
        $this->assertEquals(array(
            'services' => array(
                'app.foo_service' => array(
                    'class' => 'Foo',
                ),
                'app/bar_service' => array(
                    'class' => 'Bar',
                ),
            ),
        ), Yaml::parse(<<<'EOF'
# comment 1
services:
# comment 2
    # comment 3
    app.foo_service:
        class: Foo
# comment 4
    # comment 5
    app/bar_service:
        class: Bar
EOF
        ));
    }

    public function testStringBlockWithComments()
    {
        $this->assertEquals(array('content' => <<<'EOT'
# comment 1
header

    # comment 2
    <body>
        <h1>title</h1>
    </body>

footer # comment3
EOT
        ), Yaml::parse(<<<'EOF'
content: |
    # comment 1
    header

        # comment 2
        <body>
            <h1>title</h1>
        </body>

    footer # comment3
EOF
        ));
    }

    public function testFoldedStringBlockWithComments()
    {
        $this->assertEquals(array(array('content' => <<<'EOT'
# comment 1
header

    # comment 2
    <body>
        <h1>title</h1>
    </body>

footer # comment3
EOT
        )), Yaml::parse(<<<'EOF'
-
    content: |
        # comment 1
        header

            # comment 2
            <body>
                <h1>title</h1>
            </body>

        footer # comment3
EOF
        ));
    }

    public function testNestedFoldedStringBlockWithComments()
    {
        $this->assertEquals(array(array(
            'title' => 'some title',
            'content' => <<<'EOT'
# comment 1
header

    # comment 2
    <body>
        <h1>title</h1>
    </body>

footer # comment3
EOT
        )), Yaml::parse(<<<'EOF'
-
    title: some title
    content: |
        # comment 1
        header

            # comment 2
            <body>
                <h1>title</h1>
            </body>

        footer # comment3
EOF
        ));
    }

    public function testReferenceResolvingInInlineStrings()
    {
        $this->assertEquals(array(
            'var' => 'var-value',
            'scalar' => 'var-value',
            'list' => array('var-value'),
            'list_in_list' => array(array('var-value')),
            'map_in_list' => array(array('key' => 'var-value')),
            'embedded_mapping' => array(array('key' => 'var-value')),
            'map' => array('key' => 'var-value'),
            'list_in_map' => array('key' => array('var-value')),
            'map_in_map' => array('foo' => array('bar' => 'var-value')),
        ), Yaml::parse(<<<'EOF'
var:  &var var-value
scalar: *var
list: [ *var ]
list_in_list: [[ *var ]]
map_in_list: [ { key: *var } ]
embedded_mapping: [ key: *var ]
map: { key: *var }
list_in_map: { key: [*var] }
map_in_map: { foo: { bar: *var } }
EOF
        ));
    }

    public function testYamlDirective()
    {
        $Vklvvq0m52jf = <<<'EOF'
%YAML 1.2
---
foo: 1
bar: 2
EOF;
        $this->assertEquals(array('foo' => 1, 'bar' => 2), $this->parser->parse($Vklvvq0m52jf));
    }

    
    public function testFloatKeys()
    {
        $Vklvvq0m52jf = <<<'EOF'
foo:
    1.2: "bar"
    1.3: "baz"
EOF;

        $Vwcb1oykhumm = array(
            'foo' => array(
                '1.2' => 'bar',
                '1.3' => 'baz',
            ),
        );

        $this->assertEquals($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf));
    }

    
    public function testBooleanKeys()
    {
        $Vklvvq0m52jf = <<<'EOF'
true: foo
false: bar
EOF;

        $Vwcb1oykhumm = array(
            1 => 'foo',
            0 => 'bar',
        );

        $this->assertEquals($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf));
    }

    public function testExplicitStringCasting()
    {
        $Vklvvq0m52jf = <<<'EOF'
'1.2': "bar"
!!str 1.3: "baz"

'true': foo
!!str false: bar

!!str null: 'null'
'~': 'null'
EOF;

        $Vwcb1oykhumm = array(
            '1.2' => 'bar',
            '1.3' => 'baz',
            'true' => 'foo',
            'false' => 'bar',
            'null' => 'null',
            '~' => 'null',
        );

        $this->assertEquals($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf));
    }

    
    public function testColonInMappingValueException()
    {
        $Vklvvq0m52jf = <<<'EOF'
foo: bar: baz
EOF;

        $this->parser->parse($Vklvvq0m52jf);
    }

    public function testColonInMappingValueExceptionNotTriggeredByColonInComment()
    {
        $Vklvvq0m52jf = <<<'EOT'
foo:
    bar: foobar # Note: a comment after a colon
EOT;

        $this->assertSame(array('foo' => array('bar' => 'foobar')), $this->parser->parse($Vklvvq0m52jf));
    }

    
    public function testCommentLikeStringsAreNotStrippedInBlockScalars($Vklvvq0m52jf, $Vwcb1oykhummParserResult)
    {
        $this->assertSame($Vwcb1oykhummParserResult, $this->parser->parse($Vklvvq0m52jf));
    }

    public function getCommentLikeStringInScalarBlockData()
    {
        $Vo50qpjpkko3 = array();

        $Vklvvq0m52jf = <<<'EOT'
pages:
    -
        title: some title
        content: |
            # comment 1
            header

                # comment 2
                <body>
                    <h1>title</h1>
                </body>

            footer # comment3
EOT;
        $Vwcb1oykhumm = array(
            'pages' => array(
                array(
                    'title' => 'some title',
                    'content' => <<<'EOT'
# comment 1
header

    # comment 2
    <body>
        <h1>title</h1>
    </body>

footer # comment3
EOT
                    ,
                ),
            ),
        );
        $Vo50qpjpkko3[] = array($Vklvvq0m52jf, $Vwcb1oykhumm);

        $Vklvvq0m52jf = <<<'EOT'
test: |
    foo
    # bar
    baz
collection:
    - one: |
        foo
        # bar
        baz
    - two: |
        foo
        # bar
        baz
EOT;
        $Vwcb1oykhumm = array(
            'test' => <<<'EOT'
foo
# bar
baz

EOT
            ,
            'collection' => array(
                array(
                    'one' => <<<'EOT'
foo
# bar
baz

EOT
                    ,
                ),
                array(
                    'two' => <<<'EOT'
foo
# bar
baz
EOT
                    ,
                ),
            ),
        );
        $Vo50qpjpkko3[] = array($Vklvvq0m52jf, $Vwcb1oykhumm);

        $Vklvvq0m52jf = <<<'EOT'
foo:
  bar:
    scalar-block: >
      line1
      line2>
  baz:
# comment
    foobar: ~
EOT;
        $Vwcb1oykhumm = array(
            'foo' => array(
                'bar' => array(
                    'scalar-block' => "line1 line2>\n",
                ),
                'baz' => array(
                    'foobar' => null,
                ),
            ),
        );
        $Vo50qpjpkko3[] = array($Vklvvq0m52jf, $Vwcb1oykhumm);

        $Vklvvq0m52jf = <<<'EOT'
a:
    b: hello
#    c: |
#        first row
#        second row
    d: hello
EOT;
        $Vwcb1oykhumm = array(
            'a' => array(
                'b' => 'hello',
                'd' => 'hello',
            ),
        );
        $Vo50qpjpkko3[] = array($Vklvvq0m52jf, $Vwcb1oykhumm);

        return $Vo50qpjpkko3;
    }

    public function testBlankLinesAreParsedAsNewLinesInFoldedBlocks()
    {
        $Vklvvq0m52jf = <<<'EOT'
test: >
    <h2>A heading</h2>

    <ul>
    <li>a list</li>
    <li>may be a good example</li>
    </ul>
EOT;

        $this->assertSame(
            array(
                'test' => <<<'EOT'
<h2>A heading</h2>
<ul> <li>a list</li> <li>may be a good example</li> </ul>
EOT
                ,
            ),
            $this->parser->parse($Vklvvq0m52jf)
        );
    }

    public function testAdditionallyIndentedLinesAreParsedAsNewLinesInFoldedBlocks()
    {
        $Vklvvq0m52jf = <<<'EOT'
test: >
    <h2>A heading</h2>

    <ul>
      <li>a list</li>
      <li>may be a good example</li>
    </ul>
EOT;

        $this->assertSame(
            array(
                'test' => <<<'EOT'
<h2>A heading</h2>
<ul>
  <li>a list</li>
  <li>may be a good example</li>
</ul>
EOT
                ,
            ),
            $this->parser->parse($Vklvvq0m52jf)
        );
    }

    
    public function testParseBinaryData($Vqhzkfsafzrc)
    {
        $this->assertSame(array('data' => 'Hello world'), $this->parser->parse($Vqhzkfsafzrc));
    }

    public function getBinaryData()
    {
        return array(
            'enclosed with double quotes' => array('data: !!binary "SGVsbG8gd29ybGQ="'),
            'enclosed with single quotes' => array("data: !!binary 'SGVsbG8gd29ybGQ='"),
            'containing spaces' => array('data: !!binary  "SGVs bG8gd 29ybGQ="'),
            'in block scalar' => array(
                <<<'EOT'
data: !!binary |
    SGVsbG8gd29ybGQ=
EOT
    ),
            'containing spaces in block scalar' => array(
                <<<'EOT'
data: !!binary |
    SGVs bG8gd 29ybGQ=
EOT
    ),
        );
    }

    
    public function testParseInvalidBinaryData($Vqhzkfsafzrc, $Vwcb1oykhummMessage)
    {
        if (method_exists($this, 'expectException')) {
            $this->expectExceptionMessageRegExp($Vwcb1oykhummMessage);
        } else {
            $this->setExpectedExceptionRegExp(ParseException::class, $Vwcb1oykhummMessage);
        }

        $this->parser->parse($Vqhzkfsafzrc);
    }

    public function getInvalidBinaryData()
    {
        return array(
            'length not a multiple of four' => array('data: !!binary "SGVsbG8d29ybGQ="', '/The normalized base64 encoded data \(data without whitespace characters\) length must be a multiple of four \(\d+ bytes given\)/'),
            'invalid characters' => array('!!binary "SGVsbG8#d29ybGQ="', '/The base64 encoded data \(.*\) contains invalid characters/'),
            'too many equals characters' => array('data: !!binary "SGVsbG8gd29yb==="', '/The base64 encoded data \(.*\) contains invalid characters/'),
            'misplaced equals character' => array('data: !!binary "SGVsbG8gd29ybG=Q"', '/The base64 encoded data \(.*\) contains invalid characters/'),
            'length not a multiple of four in block scalar' => array(
                <<<'EOT'
data: !!binary |
    SGVsbG8d29ybGQ=
EOT
                ,
                '/The normalized base64 encoded data \(data without whitespace characters\) length must be a multiple of four \(\d+ bytes given\)/',
            ),
            'invalid characters in block scalar' => array(
                <<<'EOT'
data: !!binary |
    SGVsbG8#d29ybGQ=
EOT
                ,
                '/The base64 encoded data \(.*\) contains invalid characters/',
            ),
            'too many equals characters in block scalar' => array(
                <<<'EOT'
data: !!binary |
    SGVsbG8gd29yb===
EOT
                ,
                '/The base64 encoded data \(.*\) contains invalid characters/',
            ),
            'misplaced equals character in block scalar' => array(
                <<<'EOT'
data: !!binary |
    SGVsbG8gd29ybG=Q
EOT
                ,
                '/The base64 encoded data \(.*\) contains invalid characters/',
            ),
        );
    }

    public function testParseDateAsMappingValue()
    {
        $Vklvvq0m52jf = <<<'EOT'
date: 2002-12-14
EOT;
        $Vwcb1oykhummDate = new \DateTime();
        $Vwcb1oykhummDate->setTimeZone(new \DateTimeZone('UTC'));
        $Vwcb1oykhummDate->setDate(2002, 12, 14);
        $Vwcb1oykhummDate->setTime(0, 0, 0);

        $this->assertEquals(array('date' => $Vwcb1oykhummDate), $this->parser->parse($Vklvvq0m52jf, Yaml::PARSE_DATETIME));
    }

    
    public function testParserThrowsExceptionWithCorrectLineNumber($Vft5ytzqy3fl, $Vklvvq0m52jf)
    {
        if (method_exists($this, 'expectException')) {
            $this->expectException('\Symfony\Component\Yaml\Exception\ParseException');
            $this->expectExceptionMessage(sprintf('Unexpected characters near "," at line %d (near "bar: "123",").', $Vft5ytzqy3fl));
        } else {
            $this->setExpectedException('\Symfony\Component\Yaml\Exception\ParseException', sprintf('Unexpected characters near "," at line %d (near "bar: "123",").', $Vft5ytzqy3fl));
        }

        $this->parser->parse($Vklvvq0m52jf);
    }

    public function parserThrowsExceptionWithCorrectLineNumberProvider()
    {
        return array(
            array(
                4,
                <<<'YAML'
foo:
    -
        # bar
        bar: "123",
YAML
            ),
            array(
                5,
                <<<'YAML'
foo:
    -
        # bar
        # bar
        bar: "123",
YAML
            ),
            array(
                8,
                <<<'YAML'
foo:
    -
        # foobar
        baz: 123
bar:
    -
        # bar
        bar: "123",
YAML
            ),
            array(
                10,
                <<<'YAML'
foo:
    -
        # foobar
        # foobar
        baz: 123
bar:
    -
        # bar
        # bar
        bar: "123",
YAML
            ),
        );
    }

    public function testParseMultiLineQuotedString()
    {
        $Vklvvq0m52jf = <<<EOT
foo: "bar
  baz
   foobar
foo"
bar: baz
EOT;

        $this->assertSame(array('foo' => 'bar baz foobar foo', 'bar' => 'baz'), $this->parser->parse($Vklvvq0m52jf));
    }

    public function testMultiLineQuotedStringWithTrailingBackslash()
    {
        $Vklvvq0m52jf = <<<YAML
foobar:
    "foo\
    bar"
YAML;

        $this->assertSame(array('foobar' => 'foobar'), $this->parser->parse($Vklvvq0m52jf));
    }

    public function testCommentCharactersInMultiLineQuotedStrings()
    {
        $Vklvvq0m52jf = <<<YAML
foo:
    foobar: 'foo
      #bar'
    bar: baz
YAML;
        $Vwcb1oykhumm = array(
            'foo' => array(
                'foobar' => 'foo #bar',
                'bar' => 'baz',
            ),
        );

        $this->assertSame($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf));
    }

    public function testBlankLinesInQuotedMultiLineString()
    {
        $Vklvvq0m52jf = <<<YAML
foobar: 'foo

    bar'
YAML;
        $Vwcb1oykhumm = array(
            'foobar' => "foo\nbar",
        );

        $this->assertSame($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf));
    }

    public function testParseMultiLineUnquotedString()
    {
        $Vklvvq0m52jf = <<<EOT
foo: bar
  baz
   foobar
  foo
bar: baz
EOT;

        $this->assertSame(array('foo' => 'bar baz foobar foo', 'bar' => 'baz'), $this->parser->parse($Vklvvq0m52jf));
    }

    public function testParseMultiLineString()
    {
        $this->assertEquals("foo bar\nbaz", $this->parser->parse("foo\nbar\n\nbaz"));
    }

    /**
     * @dataProvider multiLineDataProvider
     */
    public function testParseMultiLineMappingValue($Vklvvq0m52jf, $Vwcb1oykhumm, $V5v4v21j0oll)
    {
        $this->assertEquals($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf));
    }

    public function multiLineDataProvider()
    {
        $Vo50qpjpkko3 = array();

        $Vklvvq0m52jf = <<<'EOF'
foo:
- bar:
    one

    two
    three
EOF;
        $Vwcb1oykhumm = array(
            'foo' => array(
                array(
                    'bar' => "one\ntwo three",
                ),
            ),
        );

        $Vo50qpjpkko3[] = array($Vklvvq0m52jf, $Vwcb1oykhumm, false);

        $Vklvvq0m52jf = <<<'EOF'
bar
"foo"
EOF;
        $Vwcb1oykhumm = 'bar "foo"';

        $Vo50qpjpkko3[] = array($Vklvvq0m52jf, $Vwcb1oykhumm, false);

        $Vklvvq0m52jf = <<<'EOF'
bar
"foo
EOF;
        $Vwcb1oykhumm = 'bar "foo';

        $Vo50qpjpkko3[] = array($Vklvvq0m52jf, $Vwcb1oykhumm, false);

        $Vklvvq0m52jf = <<<'EOF'
bar

'foo'
EOF;
        $Vwcb1oykhumm = "bar\n'foo'";

        $Vo50qpjpkko3[] = array($Vklvvq0m52jf, $Vwcb1oykhumm, false);

        $Vklvvq0m52jf = <<<'EOF'
bar

foo'
EOF;
        $Vwcb1oykhumm = "bar\nfoo'";

        $Vo50qpjpkko3[] = array($Vklvvq0m52jf, $Vwcb1oykhumm, false);

        return $Vo50qpjpkko3;
    }

    public function testTaggedInlineMapping()
    {
        $this->assertEquals(new TaggedValue('foo', array('foo' => 'bar')), $this->parser->parse('!foo {foo: bar}', Yaml::PARSE_CUSTOM_TAGS));
    }

    /**
     * @dataProvider taggedValuesProvider
     */
    public function testCustomTagSupport($Vwcb1oykhumm, $Vklvvq0m52jf)
    {
        $this->assertEquals($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf, Yaml::PARSE_CUSTOM_TAGS));
    }

    public function taggedValuesProvider()
    {
        return array(
            'sequences' => array(
                array(new TaggedValue('foo', array('yaml')), new TaggedValue('quz', array('bar'))),
                <<<YAML
- !foo
    - yaml
- !quz [bar]
YAML
            ),
            'mappings' => array(
                new TaggedValue('foo', array('foo' => new TaggedValue('quz', array('bar')), 'quz' => new TaggedValue('foo', array('quz' => 'bar')))),
                <<<YAML
!foo
foo: !quz [bar]
quz: !foo
   quz: bar
YAML
            ),
            'inline' => array(
                array(new TaggedValue('foo', array('foo', 'bar')), new TaggedValue('quz', array('foo' => 'bar', 'quz' => new TaggedValue('bar', array('one' => 'bar'))))),
                <<<YAML
- !foo [foo, bar]
- !quz {foo: bar, quz: !bar {one: bar}}
YAML
            ),
        );
    }

    /**
     * @expectedException \Symfony\Component\Yaml\Exception\ParseException
     * @expectedExceptionMessage Tags support is not enabled. Enable the `Yaml::PARSE_CUSTOM_TAGS` flag to use "!iterator" at line 1 (near "!iterator [foo]").
     */
    public function testCustomTagsDisabled()
    {
        $this->parser->parse('!iterator [foo]');
    }

    /**
     * @group legacy
     * @expectedDeprecation Using the unquoted scalar value "!iterator foo" is deprecated since Symfony 3.3 and will be considered as a tagged value in 4.0. You must quote it on line 1.
     */
    public function testUnsupportedTagWithScalar()
    {
        $this->assertEquals('!iterator foo', $this->parser->parse('!iterator foo'));
    }

    /**
     * @expectedException \Symfony\Component\Yaml\Exception\ParseException
     * @expectedExceptionMessage The built-in tag "!!foo" is not implemented at line 1 (near "!!foo").
     */
    public function testExceptionWhenUsingUnsuportedBuiltInTags()
    {
        $this->parser->parse('!!foo');
    }

    /**
     * @group legacy
     * @expectedDeprecation Starting an unquoted string with a question mark followed by a space is deprecated since Symfony 3.3 and will throw \Symfony\Component\Yaml\Exception\ParseException in 4.0 on line 1.
     */
    public function testComplexMappingThrowsParseException()
    {
        $Vklvvq0m52jf = <<<YAML
? "1"
:
  name: végétalien
YAML;

        $this->parser->parse($Vklvvq0m52jf);
    }

    /**
     * @group legacy
     * @expectedDeprecation Starting an unquoted string with a question mark followed by a space is deprecated since Symfony 3.3 and will throw \Symfony\Component\Yaml\Exception\ParseException in 4.0 on line 2.
     */
    public function testComplexMappingNestedInMappingThrowsParseException()
    {
        $Vklvvq0m52jf = <<<YAML
diet:
  ? "1"
  :
    name: végétalien
YAML;

        $this->parser->parse($Vklvvq0m52jf);
    }

    /**
     * @group legacy
     * @expectedDeprecation Starting an unquoted string with a question mark followed by a space is deprecated since Symfony 3.3 and will throw \Symfony\Component\Yaml\Exception\ParseException in 4.0 on line 1.
     */
    public function testComplexMappingNestedInSequenceThrowsParseException()
    {
        $Vklvvq0m52jf = <<<YAML
- ? "1"
  :
    name: végétalien
YAML;

        $this->parser->parse($Vklvvq0m52jf);
    }

    /**
     * @expectedException        \Symfony\Component\Yaml\Exception\ParseException
     * @expectedExceptionMessage Unable to parse at line 1 (near "[parameters]").
     */
    public function testParsingIniThrowsException()
    {
        $Vny2uq2slirh = <<<INI
[parameters]
  foo = bar
  bar = %foo%
INI;

        $this->parser->parse($Vny2uq2slirh);
    }

    private function loadTestsFromFixtureFiles($Vo50qpjpkko3File)
    {
        $V5zzh1da1wpy = new Parser();

        $Vo50qpjpkko3 = array();
        $V5s0rodgwwbv = $V5zzh1da1wpy->parseFile(__DIR__.'/Fixtures/'.$Vo50qpjpkko3File);
        foreach ($V5s0rodgwwbv as $Vpu3xl4uhgg5) {
            $Vklvvq0m52jfs = file_get_contents(__DIR__.'/Fixtures/'.$Vpu3xl4uhgg5.'.yml');

            // split YAMLs documents
            foreach (preg_split('/^---( %YAML\:1\.0)?/m', $Vklvvq0m52jfs) as $Vklvvq0m52jf) {
                if (!$Vklvvq0m52jf) {
                    continue;
                }

                $Vpswbntjg3pr = $V5zzh1da1wpy->parse($Vklvvq0m52jf);
                if (isset($Vpswbntjg3pr['todo']) && $Vpswbntjg3pr['todo']) {
                    // TODO
                } else {
                    eval('$Vwcb1oykhumm = '.trim($Vpswbntjg3pr['php']).';');

                    $Vo50qpjpkko3[] = array(var_export($Vwcb1oykhumm, true), $Vpswbntjg3pr['yaml'], $Vpswbntjg3pr['test'], isset($Vpswbntjg3pr['deprecated']) ? $Vpswbntjg3pr['deprecated'] : false);
                }
            }
        }

        return $Vo50qpjpkko3;
    }

    public function testCanParseVeryLongValue()
    {
        $V3cxwip04grb = str_repeat('xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ', 20000);
        $Vlislp4d0ndt = array('x' => $V3cxwip04grb);

        $Vklvvq0m52jfString = Yaml::dump($Vlislp4d0ndt);
        $Vyhcz3dvfgax = $this->parser->parse($Vklvvq0m52jfString);

        $this->assertEquals($Vlislp4d0ndt, $Vyhcz3dvfgax);
    }

    /**
     * @expectedException \Symfony\Component\Yaml\Exception\ParseException
     * @expectedExceptionMessage Reference "foo" does not exist at line 2
     */
    public function testParserCleansUpReferencesBetweenRuns()
    {
        $Vklvvq0m52jf = <<<YAML
foo: &foo
    baz: foobar
bar:
    <<: *foo
YAML;
        $this->parser->parse($Vklvvq0m52jf);

        $Vklvvq0m52jf = <<<YAML
bar:
    <<: *foo
YAML;
        $this->parser->parse($Vklvvq0m52jf);
    }

    public function testPhpConstantTagMappingKey()
    {
        $Vklvvq0m52jf = <<<YAML
transitions:
    !php/const 'Symfony\Component\Yaml\Tests\B::FOO':
        from:
            - !php/const 'Symfony\Component\Yaml\Tests\B::BAR'
        to: !php/const 'Symfony\Component\Yaml\Tests\B::BAZ'
YAML;
        $Vwcb1oykhumm = array(
            'transitions' => array(
                'foo' => array(
                    'from' => array(
                        'bar',
                    ),
                    'to' => 'baz',
                ),
            ),
        );

        $this->assertSame($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf, Yaml::PARSE_CONSTANT));
    }

    /**
     * @group legacy
     * @expectedDeprecation The !php/const: tag to indicate dumped PHP constants is deprecated since Symfony 3.4 and will be removed in 4.0. Use the !php/const (without the colon) tag instead on line 2.
     * @expectedDeprecation The !php/const: tag to indicate dumped PHP constants is deprecated since Symfony 3.4 and will be removed in 4.0. Use the !php/const (without the colon) tag instead on line 4.
     * @expectedDeprecation The !php/const: tag to indicate dumped PHP constants is deprecated since Symfony 3.4 and will be removed in 4.0. Use the !php/const (without the colon) tag instead on line 5.
     */
    public function testDeprecatedPhpConstantTagMappingKey()
    {
        $Vklvvq0m52jf = <<<YAML
transitions:
    !php/const:Symfony\Component\Yaml\Tests\B::FOO:
        from:
            - !php/const:Symfony\Component\Yaml\Tests\B::BAR
        to: !php/const:Symfony\Component\Yaml\Tests\B::BAZ
YAML;
        $Vwcb1oykhumm = array(
            'transitions' => array(
                'foo' => array(
                    'from' => array(
                        'bar',
                    ),
                    'to' => 'baz',
                ),
            ),
        );

        $this->assertSame($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf, Yaml::PARSE_CONSTANT));
    }

    /**
     * @group legacy
     * @expectedDeprecation Using the Yaml::PARSE_KEYS_AS_STRINGS flag is deprecated since Symfony 3.4 as it will be removed in 4.0. Quote your keys when they are evaluable instead.
     */
    public function testPhpConstantTagMappingKeyWithKeysCastToStrings()
    {
        $Vklvvq0m52jf = <<<YAML
transitions:
    !php/const 'Symfony\Component\Yaml\Tests\B::FOO':
        from:
            - !php/const 'Symfony\Component\Yaml\Tests\B::BAR'
        to: !php/const 'Symfony\Component\Yaml\Tests\B::BAZ'
YAML;
        $Vwcb1oykhumm = array(
            'transitions' => array(
                'foo' => array(
                    'from' => array(
                        'bar',
                    ),
                    'to' => 'baz',
                ),
            ),
        );

        $this->assertSame($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf, Yaml::PARSE_CONSTANT | Yaml::PARSE_KEYS_AS_STRINGS));
    }

    public function testMergeKeysWhenMappingsAreParsedAsObjects()
    {
        $Vklvvq0m52jf = <<<YAML
foo: &FOO
    bar: 1
bar: &BAR
    baz: 2
    <<: *FOO
baz:
    baz_foo: 3
    <<:
        baz_bar: 4
foobar:
    bar: ~
    <<: [*FOO, *BAR]
YAML;
        $Vwcb1oykhumm = (object) array(
            'foo' => (object) array(
                'bar' => 1,
            ),
            'bar' => (object) array(
                'baz' => 2,
                'bar' => 1,
            ),
            'baz' => (object) array(
                'baz_foo' => 3,
                'baz_bar' => 4,
            ),
            'foobar' => (object) array(
                'bar' => null,
                'baz' => 2,
            ),
        );

        $this->assertEquals($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf, Yaml::PARSE_OBJECT_FOR_MAP));
    }

    public function testFilenamesAreParsedAsStringsWithoutFlag()
    {
        $Vpu3xl4uhgg5 = __DIR__.'/Fixtures/index.yml';

        $this->assertSame($Vpu3xl4uhgg5, $this->parser->parse($Vpu3xl4uhgg5));
    }

    public function testParseFile()
    {
        $this->assertInternalType('array', $this->parser->parseFile(__DIR__.'/Fixtures/index.yml'));
    }

    /**
     * @expectedException \Symfony\Component\Yaml\Exception\ParseException
     * @expectedExceptionMessageRegExp #^File ".+/Fixtures/nonexistent.yml" does not exist\.$#
     */
    public function testParsingNonExistentFilesThrowsException()
    {
        $this->parser->parseFile(__DIR__.'/Fixtures/nonexistent.yml');
    }

    /**
     * @expectedException \Symfony\Component\Yaml\Exception\ParseException
     * @expectedExceptionMessageRegExp #^File ".+/Fixtures/not_readable.yml" cannot be read\.$#
     */
    public function testParsingNotReadableFilesThrowsException()
    {
        if ('\\' === DIRECTORY_SEPARATOR) {
            $this->markTestSkipped('chmod is not supported on Windows');
        }

        $Vpu3xl4uhgg5 = __DIR__.'/Fixtures/not_readable.yml';
        chmod($Vpu3xl4uhgg5, 0200);

        $this->parser->parseFile($Vpu3xl4uhgg5);
    }

    public function testParseReferencesOnMergeKeys()
    {
        $Vklvvq0m52jf = <<<YAML
mergekeyrefdef:
    a: foo
    <<: &quux
        b: bar
        c: baz
mergekeyderef:
    d: quux
    <<: *quux
YAML;
        $Vwcb1oykhumm = array(
            'mergekeyrefdef' => array(
                'a' => 'foo',
                'b' => 'bar',
                'c' => 'baz',
            ),
            'mergekeyderef' => array(
                'd' => 'quux',
                'b' => 'bar',
                'c' => 'baz',
            ),
        );

        $this->assertSame($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf));
    }

    public function testParseReferencesOnMergeKeysWithMappingsParsedAsObjects()
    {
        $Vklvvq0m52jf = <<<YAML
mergekeyrefdef:
    a: foo
    <<: &quux
        b: bar
        c: baz
mergekeyderef:
    d: quux
    <<: *quux
YAML;
        $Vwcb1oykhumm = (object) array(
            'mergekeyrefdef' => (object) array(
                'a' => 'foo',
                'b' => 'bar',
                'c' => 'baz',
            ),
            'mergekeyderef' => (object) array(
                'd' => 'quux',
                'b' => 'bar',
                'c' => 'baz',
            ),
        );

        $this->assertEquals($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf, Yaml::PARSE_OBJECT_FOR_MAP));
    }

    /**
     * @expectedException \Symfony\Component\Yaml\Exception\ParseException
     * @expectedExceptionMessage Reference "foo" does not exist
     */
    public function testEvalRefException()
    {
        $Vklvvq0m52jf = <<<EOE
foo: { &foo { a: Steve, <<: *foo} }
EOE;
        $this->parser->parse($Vklvvq0m52jf);
    }

    /**
     * @dataProvider indentedMappingData
     */
    public function testParseIndentedMappings($Vklvvq0m52jf, $Vwcb1oykhumm)
    {
        $this->assertSame($Vwcb1oykhumm, $this->parser->parse($Vklvvq0m52jf));
    }

    public function indentedMappingData()
    {
        $Vo50qpjpkko3 = array();

        $Vklvvq0m52jf = <<<YAML
foo:
  - bar: "foobar"
    # A comment
    baz: "foobaz"
YAML;
        $Vwcb1oykhumm = array(
            'foo' => array(
                array(
                    'bar' => 'foobar',
                    'baz' => 'foobaz',
                ),
            ),
        );
        $Vo50qpjpkko3['comment line is first line in indented block'] = array($Vklvvq0m52jf, $Vwcb1oykhumm);

        $Vklvvq0m52jf = <<<YAML
foo:
    - bar:
        # comment
        baz: [1, 2, 3]
YAML;
        $Vwcb1oykhumm = array(
            'foo' => array(
                array(
                    'bar' => array(
                        'baz' => array(1, 2, 3),
                    ),
                ),
            ),
        );
        $Vo50qpjpkko3['mapping value on new line starting with a comment line'] = array($Vklvvq0m52jf, $Vwcb1oykhumm);

        $Vklvvq0m52jf = <<<YAML
foo:
  -
    bar: foobar
YAML;
        $Vwcb1oykhumm = array(
            'foo' => array(
                array(
                    'bar' => 'foobar',
                ),
            ),
        );
        $Vo50qpjpkko3['mapping in sequence starting on a new line'] = array($Vklvvq0m52jf, $Vwcb1oykhumm);

        $Vklvvq0m52jf = <<<YAML
foo:

    bar: baz
YAML;
        $Vwcb1oykhumm = array(
            'foo' => array(
                'bar' => 'baz',
            ),
        );
        $Vo50qpjpkko3['blank line at the beginning of an indented mapping value'] = array($Vklvvq0m52jf, $Vwcb1oykhumm);

        return $Vo50qpjpkko3;
    }
}

class B
{
    public $Vglk1nbl1t2o = 'foo';

    const FOO = 'foo';
    const BAR = 'bar';
    const BAZ = 'baz';
}
