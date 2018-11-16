<?php



namespace Symfony\Component\Yaml\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Inline;
use Symfony\Component\Yaml\Yaml;

class InlineTest extends TestCase
{
    protected function setUp()
    {
        Inline::initialize(0, 0);
    }

    
    public function testParse($Vklvvq0m52jf, $Vcptarsq5qe4, $Vrycsn2lkvcj = 0)
    {
        $this->assertSame($Vcptarsq5qe4, Inline::parse($Vklvvq0m52jf, $Vrycsn2lkvcj), sprintf('::parse() converts an inline YAML to a PHP structure (%s)', $Vklvvq0m52jf));
    }

    
    public function testParseWithMapObjects($Vklvvq0m52jf, $Vcptarsq5qe4, $Vrycsn2lkvcj = Yaml::PARSE_OBJECT_FOR_MAP)
    {
        $Vs4nw03sqcam = Inline::parse($Vklvvq0m52jf, $Vrycsn2lkvcj);

        $this->assertSame(serialize($Vcptarsq5qe4), serialize($Vs4nw03sqcam));
    }

    
    public function testParsePhpConstants($Vklvvq0m52jf, $Vcptarsq5qe4)
    {
        $Vs4nw03sqcam = Inline::parse($Vklvvq0m52jf, Yaml::PARSE_CONSTANT);

        $this->assertSame($Vcptarsq5qe4, $Vs4nw03sqcam);
    }

    public function getTestsForParsePhpConstants()
    {
        return array(
            array('!php/const Symfony\Component\Yaml\Yaml::PARSE_CONSTANT', Yaml::PARSE_CONSTANT),
            array('!php/const PHP_INT_MAX', PHP_INT_MAX),
            array('[!php/const PHP_INT_MAX]', array(PHP_INT_MAX)),
            array('{ foo: !php/const PHP_INT_MAX }', array('foo' => PHP_INT_MAX)),
            array('!php/const NULL', null),
        );
    }

    
    public function testParsePhpConstantThrowsExceptionWhenUndefined()
    {
        Inline::parse('!php/const WRONG_CONSTANT', Yaml::PARSE_CONSTANT);
    }

    
    public function testParsePhpConstantThrowsExceptionOnInvalidType()
    {
        Inline::parse('!php/const PHP_INT_MAX', Yaml::PARSE_EXCEPTION_ON_INVALID_TYPE);
    }

    
    public function testDeprecatedConstantTag($Vklvvq0m52jf, $V3nkoqhdkqzz)
    {
        $this->assertSame($V3nkoqhdkqzz, Inline::parse($Vklvvq0m52jf, Yaml::PARSE_CONSTANT));
    }

    public function getTestsForParseLegacyPhpConstants()
    {
        return array(
            array('!php/const:Symfony\Component\Yaml\Yaml::PARSE_CONSTANT', Yaml::PARSE_CONSTANT),
            array('!php/const:PHP_INT_MAX', PHP_INT_MAX),
            array('[!php/const:PHP_INT_MAX]', array(PHP_INT_MAX)),
            array('{ foo: !php/const:PHP_INT_MAX }', array('foo' => PHP_INT_MAX)),
            array('!php/const:NULL', null),
        );
    }

    
    public function testParseWithMapObjectsPassingTrue($Vklvvq0m52jf, $Vcptarsq5qe4)
    {
        $Vs4nw03sqcam = Inline::parse($Vklvvq0m52jf, false, false, true);

        $this->assertSame(serialize($Vcptarsq5qe4), serialize($Vs4nw03sqcam));
    }

    
    public function testDump($Vklvvq0m52jf, $Vcptarsq5qe4, $Vca4odamn43r = 0)
    {
        $this->assertEquals($Vklvvq0m52jf, Inline::dump($Vcptarsq5qe4), sprintf('::dump() converts a PHP structure to an inline YAML (%s)', $Vklvvq0m52jf));

        $this->assertSame($Vcptarsq5qe4, Inline::parse(Inline::dump($Vcptarsq5qe4), $Vca4odamn43r), 'check consistency');
    }

    public function testDumpNumericValueWithLocale()
    {
        $Vbzxpjv3aqae = setlocale(LC_NUMERIC, 0);
        if (false === $Vbzxpjv3aqae) {
            $this->markTestSkipped('Your platform does not support locales.');
        }

        try {
            $Vz2q3zz1rcog = array('fr_FR.UTF-8', 'fr_FR.UTF8', 'fr_FR.utf-8', 'fr_FR.utf8', 'French_France.1252');
            if (false === setlocale(LC_NUMERIC, $Vz2q3zz1rcog)) {
                $this->markTestSkipped('Could not set any of required locales: '.implode(', ', $Vz2q3zz1rcog));
            }

            $this->assertEquals('1.2', Inline::dump(1.2));
            $this->assertContains('fr', strtolower(setlocale(LC_NUMERIC, 0)));
        } finally {
            setlocale(LC_NUMERIC, $Vbzxpjv3aqae);
        }
    }

    public function testHashStringsResemblingExponentialNumericsShouldNotBeChangedToINF()
    {
        $Vcptarsq5qe4 = '686e444';

        $this->assertSame($Vcptarsq5qe4, Inline::parse(Inline::dump($Vcptarsq5qe4)));
    }

    
    public function testParseScalarWithNonEscapedBlackslashShouldThrowException()
    {
        Inline::parse('"Foo\Var"');
    }

    
    public function testParseScalarWithNonEscapedBlackslashAtTheEndShouldThrowException()
    {
        Inline::parse('"Foo\\"');
    }

    
    public function testParseScalarWithIncorrectlyQuotedStringShouldThrowException()
    {
        $Vcptarsq5qe4 = "'don't do somthin' like that'";
        Inline::parse($Vcptarsq5qe4);
    }

    
    public function testParseScalarWithIncorrectlyDoubleQuotedStringShouldThrowException()
    {
        $Vcptarsq5qe4 = '"don"t do somthin" like that"';
        Inline::parse($Vcptarsq5qe4);
    }

    
    public function testParseInvalidMappingKeyShouldThrowException()
    {
        $Vcptarsq5qe4 = '{ "foo " bar": "bar" }';
        Inline::parse($Vcptarsq5qe4);
    }

    
    public function testParseMappingKeyWithColonNotFollowedBySpace()
    {
        Inline::parse('{1:""}');
    }

    
    public function testParseInvalidMappingShouldThrowException()
    {
        Inline::parse('[foo] bar');
    }

    
    public function testParseInvalidSequenceShouldThrowException()
    {
        Inline::parse('{ foo: bar } bar');
    }

    public function testParseScalarWithCorrectlyQuotedStringShouldReturnString()
    {
        $Vcptarsq5qe4 = "'don''t do somthin'' like that'";
        $V5fdt5hfass0 = "don't do somthin' like that";

        $this->assertSame($V5fdt5hfass0, Inline::parseScalar($Vcptarsq5qe4));
    }

    
    public function testParseReferences($Vklvvq0m52jf, $V5fdt5hfass0ed)
    {
        $this->assertSame($V5fdt5hfass0ed, Inline::parse($Vklvvq0m52jf, 0, array('var' => 'var-value')));
    }

    
    public function testParseReferencesAsFifthArgument($Vklvvq0m52jf, $V5fdt5hfass0ed)
    {
        $this->assertSame($V5fdt5hfass0ed, Inline::parse($Vklvvq0m52jf, false, false, false, array('var' => 'var-value')));
    }

    public function getDataForParseReferences()
    {
        return array(
            'scalar' => array('*var', 'var-value'),
            'list' => array('[ *var ]', array('var-value')),
            'list-in-list' => array('[[ *var ]]', array(array('var-value'))),
            'map-in-list' => array('[ { key: *var } ]', array(array('key' => 'var-value'))),
            'embedded-mapping-in-list' => array('[ key: *var ]', array(array('key' => 'var-value'))),
            'map' => array('{ key: *var }', array('key' => 'var-value')),
            'list-in-map' => array('{ key: [*var] }', array('key' => array('var-value'))),
            'map-in-map' => array('{ foo: { bar: *var } }', array('foo' => array('bar' => 'var-value'))),
        );
    }

    public function testParseMapReferenceInSequence()
    {
        $Vrqaitdc0ft3 = array(
            'a' => 'Steve',
            'b' => 'Clark',
            'c' => 'Brian',
        );
        $this->assertSame(array($Vrqaitdc0ft3), Inline::parse('[*foo]', 0, array('foo' => $Vrqaitdc0ft3)));
    }

    
    public function testParseMapReferenceInSequenceAsFifthArgument()
    {
        $Vrqaitdc0ft3 = array(
            'a' => 'Steve',
            'b' => 'Clark',
            'c' => 'Brian',
        );
        $this->assertSame(array($Vrqaitdc0ft3), Inline::parse('[*foo]', false, false, false, array('foo' => $Vrqaitdc0ft3)));
    }

    
    public function testParseUnquotedAsterisk()
    {
        Inline::parse('{ foo: * }');
    }

    
    public function testParseUnquotedAsteriskFollowedByAComment()
    {
        Inline::parse('{ foo: * #foo }');
    }

    
    public function testParseUnquotedScalarStartingWithReservedIndicator($Vfhekyvhlhxe)
    {
        if (method_exists($this, 'expectExceptionMessage')) {
            $this->expectException(ParseException::class);
            $this->expectExceptionMessage(sprintf('cannot start a plain scalar; you need to quote the scalar at line 1 (near "%sfoo ").', $Vfhekyvhlhxe));
        } else {
            $this->setExpectedException(ParseException::class, sprintf('cannot start a plain scalar; you need to quote the scalar at line 1 (near "%sfoo ").', $Vfhekyvhlhxe));
        }

        Inline::parse(sprintf('{ foo: %sfoo }', $Vfhekyvhlhxe));
    }

    public function getReservedIndicators()
    {
        return array(array('@'), array('`'));
    }

    
    public function testParseUnquotedScalarStartingWithScalarIndicator($Vfhekyvhlhxe)
    {
        if (method_exists($this, 'expectExceptionMessage')) {
            $this->expectException(ParseException::class);
            $this->expectExceptionMessage(sprintf('cannot start a plain scalar; you need to quote the scalar at line 1 (near "%sfoo ").', $Vfhekyvhlhxe));
        } else {
            $this->setExpectedException(ParseException::class, sprintf('cannot start a plain scalar; you need to quote the scalar at line 1 (near "%sfoo ").', $Vfhekyvhlhxe));
        }

        Inline::parse(sprintf('{ foo: %sfoo }', $Vfhekyvhlhxe));
    }

    public function getScalarIndicators()
    {
        return array(array('|'), array('>'));
    }

    
    public function testParseUnquotedScalarStartingWithPercentCharacter()
    {
        Inline::parse('{ foo: %bar }');
    }

    
    public function testIsHash($Vvs0hc5bhqj3, $V5fdt5hfass0ed)
    {
        $this->assertSame($V5fdt5hfass0ed, Inline::isHash($Vvs0hc5bhqj3));
    }

    public function getDataForIsHash()
    {
        return array(
            array(array(), false),
            array(array(1, 2, 3), false),
            array(array(2 => 1, 1 => 2, 0 => 3), true),
            array(array('foo' => 1, 'bar' => 2), true),
        );
    }

    public function getTestsForParse()
    {
        return array(
            array('', ''),
            array('null', null),
            array('false', false),
            array('true', true),
            array('12', 12),
            array('-12', -12),
            array('1_2', 12),
            array('_12', '_12'),
            array('12_', 12),
            array('"quoted string"', 'quoted string'),
            array("'quoted string'", 'quoted string'),
            array('12.30e+02', 12.30e+02),
            array('123.45_67', 123.4567),
            array('0x4D2', 0x4D2),
            array('0x_4_D_2_', 0x4D2),
            array('02333', 02333),
            array('0_2_3_3_3', 02333),
            array('.Inf', -log(0)),
            array('-.Inf', log(0)),
            array("'686e444'", '686e444'),
            array('686e444', 646e444),
            array('123456789123456789123456789123456789', '123456789123456789123456789123456789'),
            array('"foo\r\nbar"', "foo\r\nbar"),
            array("'foo#bar'", 'foo#bar'),
            array("'foo # bar'", 'foo # bar'),
            array("'#cfcfcf'", '#cfcfcf'),
            array('::form_base.html.twig', '::form_base.html.twig'),

            
            array("'y'", 'y'),
            array("'n'", 'n'),
            array("'yes'", 'yes'),
            array("'no'", 'no'),
            array("'on'", 'on'),
            array("'off'", 'off'),

            array('2007-10-30', gmmktime(0, 0, 0, 10, 30, 2007)),
            array('2007-10-30T02:59:43Z', gmmktime(2, 59, 43, 10, 30, 2007)),
            array('2007-10-30 02:59:43 Z', gmmktime(2, 59, 43, 10, 30, 2007)),
            array('1960-10-30 02:59:43 Z', gmmktime(2, 59, 43, 10, 30, 1960)),
            array('1730-10-30T02:59:43Z', gmmktime(2, 59, 43, 10, 30, 1730)),

            array('"a \\"string\\" with \'quoted strings inside\'"', 'a "string" with \'quoted strings inside\''),
            array("'a \"string\" with ''quoted strings inside'''", 'a "string" with \'quoted strings inside\''),

            
            
            array('[foo, http://urls.are/no/mappings, false, null, 12]', array('foo', 'http://urls.are/no/mappings', false, null, 12)),
            array('[  foo  ,   bar , false  ,  null     ,  12  ]', array('foo', 'bar', false, null, 12)),
            array('[\'foo,bar\', \'foo bar\']', array('foo,bar', 'foo bar')),

            
            array('{foo: bar,bar: foo,"false": false, "null": null,integer: 12}', array('foo' => 'bar', 'bar' => 'foo', 'false' => false, 'null' => null, 'integer' => 12)),
            array('{ foo  : bar, bar : foo, "false"  :   false,  "null"  :   null,  integer :  12  }', array('foo' => 'bar', 'bar' => 'foo', 'false' => false, 'null' => null, 'integer' => 12)),
            array('{foo: \'bar\', bar: \'foo: bar\'}', array('foo' => 'bar', 'bar' => 'foo: bar')),
            array('{\'foo\': \'bar\', "bar": \'foo: bar\'}', array('foo' => 'bar', 'bar' => 'foo: bar')),
            array('{\'foo\'\'\': \'bar\', "bar\"": \'foo: bar\'}', array('foo\'' => 'bar', 'bar"' => 'foo: bar')),
            array('{\'foo: \': \'bar\', "bar: ": \'foo: bar\'}', array('foo: ' => 'bar', 'bar: ' => 'foo: bar')),
            array('{"foo:bar": "baz"}', array('foo:bar' => 'baz')),
            array('{"foo":"bar"}', array('foo' => 'bar')),

            
            array('[foo, [bar, foo]]', array('foo', array('bar', 'foo'))),
            array('[foo, {bar: foo}]', array('foo', array('bar' => 'foo'))),
            array('{ foo: {bar: foo} }', array('foo' => array('bar' => 'foo'))),
            array('{ foo: [bar, foo] }', array('foo' => array('bar', 'foo'))),
            array('{ foo:{bar: foo} }', array('foo' => array('bar' => 'foo'))),
            array('{ foo:[bar, foo] }', array('foo' => array('bar', 'foo'))),

            array('[  foo, [  bar, foo  ]  ]', array('foo', array('bar', 'foo'))),

            array('[{ foo: {bar: foo} }]', array(array('foo' => array('bar' => 'foo')))),

            array('[foo, [bar, [foo, [bar, foo]], foo]]', array('foo', array('bar', array('foo', array('bar', 'foo')), 'foo'))),

            array('[foo, {bar: foo, foo: [foo, {bar: foo}]}, [foo, {bar: foo}]]', array('foo', array('bar' => 'foo', 'foo' => array('foo', array('bar' => 'foo'))), array('foo', array('bar' => 'foo')))),

            array('[foo, bar: { foo: bar }]', array('foo', '1' => array('bar' => array('foo' => 'bar')))),
            array('[foo, \'@foo.baz\', { \'%foo%\': \'foo is %foo%\', bar: \'%foo%\' }, true, \'@service_container\']', array('foo', '@foo.baz', array('%foo%' => 'foo is %foo%', 'bar' => '%foo%'), true, '@service_container')),
        );
    }

    public function getTestsForParseWithMapObjects()
    {
        return array(
            array('', ''),
            array('null', null),
            array('false', false),
            array('true', true),
            array('12', 12),
            array('-12', -12),
            array('"quoted string"', 'quoted string'),
            array("'quoted string'", 'quoted string'),
            array('12.30e+02', 12.30e+02),
            array('0x4D2', 0x4D2),
            array('02333', 02333),
            array('.Inf', -log(0)),
            array('-.Inf', log(0)),
            array("'686e444'", '686e444'),
            array('686e444', 646e444),
            array('123456789123456789123456789123456789', '123456789123456789123456789123456789'),
            array('"foo\r\nbar"', "foo\r\nbar"),
            array("'foo#bar'", 'foo#bar'),
            array("'foo # bar'", 'foo # bar'),
            array("'#cfcfcf'", '#cfcfcf'),
            array('::form_base.html.twig', '::form_base.html.twig'),

            array('2007-10-30', gmmktime(0, 0, 0, 10, 30, 2007)),
            array('2007-10-30T02:59:43Z', gmmktime(2, 59, 43, 10, 30, 2007)),
            array('2007-10-30 02:59:43 Z', gmmktime(2, 59, 43, 10, 30, 2007)),
            array('1960-10-30 02:59:43 Z', gmmktime(2, 59, 43, 10, 30, 1960)),
            array('1730-10-30T02:59:43Z', gmmktime(2, 59, 43, 10, 30, 1730)),

            array('"a \\"string\\" with \'quoted strings inside\'"', 'a "string" with \'quoted strings inside\''),
            array("'a \"string\" with ''quoted strings inside'''", 'a "string" with \'quoted strings inside\''),

            
            
            array('[foo, http://urls.are/no/mappings, false, null, 12]', array('foo', 'http://urls.are/no/mappings', false, null, 12)),
            array('[  foo  ,   bar , false  ,  null     ,  12  ]', array('foo', 'bar', false, null, 12)),
            array('[\'foo,bar\', \'foo bar\']', array('foo,bar', 'foo bar')),

            
            array('{foo: bar,bar: foo,"false": false,"null": null,integer: 12}', (object) array('foo' => 'bar', 'bar' => 'foo', 'false' => false, 'null' => null, 'integer' => 12), Yaml::PARSE_OBJECT_FOR_MAP),
            array('{ foo  : bar, bar : foo,  "false"  :   false,  "null"  :   null,  integer :  12  }', (object) array('foo' => 'bar', 'bar' => 'foo', 'false' => false, 'null' => null, 'integer' => 12), Yaml::PARSE_OBJECT_FOR_MAP),
            array('{foo: \'bar\', bar: \'foo: bar\'}', (object) array('foo' => 'bar', 'bar' => 'foo: bar')),
            array('{\'foo\': \'bar\', "bar": \'foo: bar\'}', (object) array('foo' => 'bar', 'bar' => 'foo: bar')),
            array('{\'foo\'\'\': \'bar\', "bar\"": \'foo: bar\'}', (object) array('foo\'' => 'bar', 'bar"' => 'foo: bar')),
            array('{\'foo: \': \'bar\', "bar: ": \'foo: bar\'}', (object) array('foo: ' => 'bar', 'bar: ' => 'foo: bar')),
            array('{"foo:bar": "baz"}', (object) array('foo:bar' => 'baz')),
            array('{"foo":"bar"}', (object) array('foo' => 'bar')),

            
            array('[foo, [bar, foo]]', array('foo', array('bar', 'foo'))),
            array('[foo, {bar: foo}]', array('foo', (object) array('bar' => 'foo'))),
            array('{ foo: {bar: foo} }', (object) array('foo' => (object) array('bar' => 'foo'))),
            array('{ foo: [bar, foo] }', (object) array('foo' => array('bar', 'foo'))),

            array('[  foo, [  bar, foo  ]  ]', array('foo', array('bar', 'foo'))),

            array('[{ foo: {bar: foo} }]', array((object) array('foo' => (object) array('bar' => 'foo')))),

            array('[foo, [bar, [foo, [bar, foo]], foo]]', array('foo', array('bar', array('foo', array('bar', 'foo')), 'foo'))),

            array('[foo, {bar: foo, foo: [foo, {bar: foo}]}, [foo, {bar: foo}]]', array('foo', (object) array('bar' => 'foo', 'foo' => array('foo', (object) array('bar' => 'foo'))), array('foo', (object) array('bar' => 'foo')))),

            array('[foo, bar: { foo: bar }]', array('foo', '1' => (object) array('bar' => (object) array('foo' => 'bar')))),
            array('[foo, \'@foo.baz\', { \'%foo%\': \'foo is %foo%\', bar: \'%foo%\' }, true, \'@service_container\']', array('foo', '@foo.baz', (object) array('%foo%' => 'foo is %foo%', 'bar' => '%foo%'), true, '@service_container')),

            array('{}', new \stdClass()),
            array('{ foo  : bar, bar : {}  }', (object) array('foo' => 'bar', 'bar' => new \stdClass())),
            array('{ foo  : [], bar : {}  }', (object) array('foo' => array(), 'bar' => new \stdClass())),
            array('{foo: \'bar\', bar: {} }', (object) array('foo' => 'bar', 'bar' => new \stdClass())),
            array('{\'foo\': \'bar\', "bar": {}}', (object) array('foo' => 'bar', 'bar' => new \stdClass())),
            array('{\'foo\': \'bar\', "bar": \'{}\'}', (object) array('foo' => 'bar', 'bar' => '{}')),

            array('[foo, [{}, {}]]', array('foo', array(new \stdClass(), new \stdClass()))),
            array('[foo, [[], {}]]', array('foo', array(array(), new \stdClass()))),
            array('[foo, [[{}, {}], {}]]', array('foo', array(array(new \stdClass(), new \stdClass()), new \stdClass()))),
            array('[foo, {bar: {}}]', array('foo', '1' => (object) array('bar' => new \stdClass()))),
        );
    }

    public function getTestsForDump()
    {
        return array(
            array('null', null),
            array('false', false),
            array('true', true),
            array('12', 12),
            array("'1_2'", '1_2'),
            array('_12', '_12'),
            array("'12_'", '12_'),
            array("'quoted string'", 'quoted string'),
            array('!!float 1230', 12.30e+02),
            array('1234', 0x4D2),
            array('1243', 02333),
            array("'0x_4_D_2_'", '0x_4_D_2_'),
            array("'0_2_3_3_3'", '0_2_3_3_3'),
            array('.Inf', -log(0)),
            array('-.Inf', log(0)),
            array("'686e444'", '686e444'),
            array('"foo\r\nbar"', "foo\r\nbar"),
            array("'foo#bar'", 'foo#bar'),
            array("'foo # bar'", 'foo # bar'),
            array("'#cfcfcf'", '#cfcfcf'),

            array("'a \"string\" with ''quoted strings inside'''", 'a "string" with \'quoted strings inside\''),

            array("'-dash'", '-dash'),
            array("'-'", '-'),

            
            array("'y'", 'y'),
            array("'n'", 'n'),
            array("'yes'", 'yes'),
            array("'no'", 'no'),
            array("'on'", 'on'),
            array("'off'", 'off'),

            
            array('[foo, bar, false, null, 12]', array('foo', 'bar', false, null, 12)),
            array('[\'foo,bar\', \'foo bar\']', array('foo,bar', 'foo bar')),

            
            array('{ foo: bar, bar: foo, \'false\': false, \'null\': null, integer: 12 }', array('foo' => 'bar', 'bar' => 'foo', 'false' => false, 'null' => null, 'integer' => 12)),
            array('{ foo: bar, bar: \'foo: bar\' }', array('foo' => 'bar', 'bar' => 'foo: bar')),

            
            array('[foo, [bar, foo]]', array('foo', array('bar', 'foo'))),

            array('[foo, [bar, [foo, [bar, foo]], foo]]', array('foo', array('bar', array('foo', array('bar', 'foo')), 'foo'))),

            array('{ foo: { bar: foo } }', array('foo' => array('bar' => 'foo'))),

            array('[foo, { bar: foo }]', array('foo', array('bar' => 'foo'))),

            array('[foo, { bar: foo, foo: [foo, { bar: foo }] }, [foo, { bar: foo }]]', array('foo', array('bar' => 'foo', 'foo' => array('foo', array('bar' => 'foo'))), array('foo', array('bar' => 'foo')))),

            array('[foo, \'@foo.baz\', { \'%foo%\': \'foo is %foo%\', bar: \'%foo%\' }, true, \'@service_container\']', array('foo', '@foo.baz', array('%foo%' => 'foo is %foo%', 'bar' => '%foo%'), true, '@service_container')),

            array('{ foo: { bar: { 1: 2, baz: 3 } } }', array('foo' => array('bar' => array(1 => 2, 'baz' => 3)))),
        );
    }

    
    public function testParseTimestampAsUnixTimestampByDefault($Vklvvq0m52jf, $V42mawe35wri, $Vhxw55nfnbaz, $V4sjxf4itkue, $Vm1z4g4i0ynm, $Vh1nu0pqkxwt, $Vezyfqku51bk)
    {
        $this->assertSame(gmmktime($Vm1z4g4i0ynm, $Vh1nu0pqkxwt, $Vezyfqku51bk, $Vhxw55nfnbaz, $V4sjxf4itkue, $V42mawe35wri), Inline::parse($Vklvvq0m52jf));
    }

    
    public function testParseTimestampAsDateTimeObject($Vklvvq0m52jf, $V42mawe35wri, $Vhxw55nfnbaz, $V4sjxf4itkue, $Vm1z4g4i0ynm, $Vh1nu0pqkxwt, $Vezyfqku51bk, $Vyahhlvbz5sw)
    {
        $V5fdt5hfass0ed = new \DateTime($Vklvvq0m52jf);
        $V5fdt5hfass0ed->setTimeZone(new \DateTimeZone('UTC'));
        $V5fdt5hfass0ed->setDate($V42mawe35wri, $Vhxw55nfnbaz, $V4sjxf4itkue);

        if (\PHP_VERSION_ID >= 70100) {
            $V5fdt5hfass0ed->setTime($Vm1z4g4i0ynm, $Vh1nu0pqkxwt, $Vezyfqku51bk, 1000000 * ($Vezyfqku51bk - (int) $Vezyfqku51bk));
        } else {
            $V5fdt5hfass0ed->setTime($Vm1z4g4i0ynm, $Vh1nu0pqkxwt, $Vezyfqku51bk);
        }

        $V44ektrjtftz = Inline::parse($Vklvvq0m52jf, Yaml::PARSE_DATETIME);
        $this->assertEquals($V5fdt5hfass0ed, $V44ektrjtftz);
        $this->assertSame($Vyahhlvbz5sw, $V44ektrjtftz->format('O'));
    }

    public function getTimestampTests()
    {
        return array(
            'canonical' => array('2001-12-15T02:59:43.1Z', 2001, 12, 15, 2, 59, 43.1, '+0000'),
            'ISO-8601' => array('2001-12-15t21:59:43.10-05:00', 2001, 12, 16, 2, 59, 43.1, '-0500'),
            'spaced' => array('2001-12-15 21:59:43.10 -5', 2001, 12, 16, 2, 59, 43.1, '-0500'),
            'date' => array('2001-12-15', 2001, 12, 15, 0, 0, 0, '+0000'),
        );
    }

    
    public function testParseNestedTimestampListAsDateTimeObject($Vklvvq0m52jf, $V42mawe35wri, $Vhxw55nfnbaz, $V4sjxf4itkue, $Vm1z4g4i0ynm, $Vh1nu0pqkxwt, $Vezyfqku51bk)
    {
        $V5fdt5hfass0ed = new \DateTime($Vklvvq0m52jf);
        $V5fdt5hfass0ed->setTimeZone(new \DateTimeZone('UTC'));
        $V5fdt5hfass0ed->setDate($V42mawe35wri, $Vhxw55nfnbaz, $V4sjxf4itkue);
        if (\PHP_VERSION_ID >= 70100) {
            $V5fdt5hfass0ed->setTime($Vm1z4g4i0ynm, $Vh1nu0pqkxwt, $Vezyfqku51bk, 1000000 * ($Vezyfqku51bk - (int) $Vezyfqku51bk));
        } else {
            $V5fdt5hfass0ed->setTime($Vm1z4g4i0ynm, $Vh1nu0pqkxwt, $Vezyfqku51bk);
        }

        $V5fdt5hfass0edNested = array('nested' => array($V5fdt5hfass0ed));
        $Vklvvq0m52jfNested = "{nested: [$Vklvvq0m52jf]}";

        $this->assertEquals($V5fdt5hfass0edNested, Inline::parse($Vklvvq0m52jfNested, Yaml::PARSE_DATETIME));
    }

    
    public function testDumpDateTime($V44ektrjtftzTime, $V5fdt5hfass0ed)
    {
        $this->assertSame($V5fdt5hfass0ed, Inline::dump($V44ektrjtftzTime));
    }

    public function getDateTimeDumpTests()
    {
        $Vo50qpjpkko3 = array();

        $V44ektrjtftzTime = new \DateTime('2001-12-15 21:59:43', new \DateTimeZone('UTC'));
        $Vo50qpjpkko3['date-time-utc'] = array($V44ektrjtftzTime, '2001-12-15T21:59:43+00:00');

        $V44ektrjtftzTime = new \DateTimeImmutable('2001-07-15 21:59:43', new \DateTimeZone('Europe/Berlin'));
        $Vo50qpjpkko3['immutable-date-time-europe-berlin'] = array($V44ektrjtftzTime, '2001-07-15T21:59:43+02:00');

        return $Vo50qpjpkko3;
    }

    
    public function testParseBinaryData($Vqhzkfsafzrc)
    {
        $this->assertSame('Hello world', Inline::parse($Vqhzkfsafzrc));
    }

    public function getBinaryData()
    {
        return array(
            'enclosed with double quotes' => array('!!binary "SGVsbG8gd29ybGQ="'),
            'enclosed with single quotes' => array("!!binary 'SGVsbG8gd29ybGQ='"),
            'containing spaces' => array('!!binary  "SGVs bG8gd 29ybGQ="'),
        );
    }

    
    public function testParseInvalidBinaryData($Vqhzkfsafzrc, $V5fdt5hfass0edMessage)
    {
        if (method_exists($this, 'expectException')) {
            $this->expectExceptionMessageRegExp($V5fdt5hfass0edMessage);
        } else {
            $this->setExpectedExceptionRegExp(ParseException::class, $V5fdt5hfass0edMessage);
        }

        Inline::parse($Vqhzkfsafzrc);
    }

    public function getInvalidBinaryData()
    {
        return array(
            'length not a multiple of four' => array('!!binary "SGVsbG8d29ybGQ="', '/The normalized base64 encoded data \(data without whitespace characters\) length must be a multiple of four \(\d+ bytes given\)/'),
            'invalid characters' => array('!!binary "SGVsbG8#d29ybGQ="', '/The base64 encoded data \(.*\) contains invalid characters/'),
            'too many equals characters' => array('!!binary "SGVsbG8gd29yb==="', '/The base64 encoded data \(.*\) contains invalid characters/'),
            'misplaced equals character' => array('!!binary "SGVsbG8gd29ybG=Q"', '/The base64 encoded data \(.*\) contains invalid characters/'),
        );
    }

    
    public function testNotSupportedMissingValue()
    {
        Inline::parse('{this, is not, supported}');
    }

    public function testVeryLongQuotedStrings()
    {
        $Vram5woyysna = str_repeat("x\r\n\\\"x\"x", 1000);

        $Vklvvq0m52jfString = Inline::dump(array('longStringWithQuotes' => $Vram5woyysna));
        $Vvs0hc5bhqj3FromYaml = Inline::parse($Vklvvq0m52jfString);

        $this->assertEquals($Vram5woyysna, $Vvs0hc5bhqj3FromYaml['longStringWithQuotes']);
    }

    
    public function testOmittedMappingKeyIsParsedAsColon()
    {
        $this->assertSame(array(':' => 'foo'), Inline::parse('{: foo}'));
    }

    
    public function testParseMissingMappingValueAsNull($Vklvvq0m52jf, $V5fdt5hfass0ed)
    {
        $this->assertSame($V5fdt5hfass0ed, Inline::parse($Vklvvq0m52jf));
    }

    public function getTestsForNullValues()
    {
        return array(
            'null before closing curly brace' => array('{foo:}', array('foo' => null)),
            'null before comma' => array('{foo:, bar: baz}', array('foo' => null, 'bar' => 'baz')),
        );
    }

    public function testTheEmptyStringIsAValidMappingKey()
    {
        $this->assertSame(array('' => 'foo'), Inline::parse('{ "": foo }'));
    }

    
    public function testImplicitStringCastingOfMappingKeysIsDeprecated($Vklvvq0m52jf, $V5fdt5hfass0ed)
    {
        $this->assertSame($V5fdt5hfass0ed, Inline::parse($Vklvvq0m52jf));
    }

    
    public function testExplicitStringCastingOfMappingKeys($Vklvvq0m52jf, $V5fdt5hfass0ed)
    {
        $this->assertSame($V5fdt5hfass0ed, Yaml::parse($Vklvvq0m52jf, Yaml::PARSE_KEYS_AS_STRINGS));
    }

    public function getNotPhpCompatibleMappingKeyData()
    {
        return array(
            'boolean-true' => array('{true: "foo"}', array('true' => 'foo')),
            'boolean-false' => array('{false: "foo"}', array('false' => 'foo')),
            'null' => array('{null: "foo"}', array('null' => 'foo')),
            'float' => array('{0.25: "foo"}', array('0.25' => 'foo')),
        );
    }

    
    public function testDeprecatedStrTag()
    {
        $this->assertSame(array('foo' => 'bar'), Inline::parse('{ foo: !str bar }'));
    }

    
    public function testUnfinishedInlineMap()
    {
        Inline::parse("{abc: 'def'");
    }
}
