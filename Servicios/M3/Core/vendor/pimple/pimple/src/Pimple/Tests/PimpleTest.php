<?php



namespace Pimple\Tests;

use Pimple\Container;


class PimpleTest extends \PHPUnit_Framework_TestCase
{
    public function testWithString()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['param'] = 'value';

        $this->assertEquals('value', $Vyymzk4dypcg['param']);
    }

    public function testWithClosure()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['service'] = function () {
            return new Fixtures\Service();
        };

        $this->assertInstanceOf('Pimple\Tests\Fixtures\Service', $Vyymzk4dypcg['service']);
    }

    public function testServicesShouldBeDifferent()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['service'] = $Vyymzk4dypcg->factory(function () {
            return new Fixtures\Service();
        });

        $Vxfodhws22k0 = $Vyymzk4dypcg['service'];
        $this->assertInstanceOf('Pimple\Tests\Fixtures\Service', $Vxfodhws22k0);

        $Vfp2rzuwfajm = $Vyymzk4dypcg['service'];
        $this->assertInstanceOf('Pimple\Tests\Fixtures\Service', $Vfp2rzuwfajm);

        $this->assertNotSame($Vxfodhws22k0, $Vfp2rzuwfajm);
    }

    public function testShouldPassContainerAsParameter()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['service'] = function () {
            return new Fixtures\Service();
        };
        $Vyymzk4dypcg['container'] = function ($Vb1jhtbuqbys) {
            return $Vb1jhtbuqbys;
        };

        $this->assertNotSame($Vyymzk4dypcg, $Vyymzk4dypcg['service']);
        $this->assertSame($Vyymzk4dypcg, $Vyymzk4dypcg['container']);
    }

    public function testIsset()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['param'] = 'value';
        $Vyymzk4dypcg['service'] = function () {
            return new Fixtures\Service();
        };

        $Vyymzk4dypcg['null'] = null;

        $this->assertTrue(isset($Vyymzk4dypcg['param']));
        $this->assertTrue(isset($Vyymzk4dypcg['service']));
        $this->assertTrue(isset($Vyymzk4dypcg['null']));
        $this->assertFalse(isset($Vyymzk4dypcg['non_existent']));
    }

    public function testConstructorInjection()
    {
        $Vdhafuyqqxgk = array('param' => 'value');
        $Vyymzk4dypcg = new Container($Vdhafuyqqxgk);

        $this->assertSame($Vdhafuyqqxgk['param'], $Vyymzk4dypcg['param']);
    }

    
    public function testOffsetGetValidatesKeyIsPresent()
    {
        $Vyymzk4dypcg = new Container();
        echo $Vyymzk4dypcg['foo'];
    }

    
    public function testLegacyOffsetGetValidatesKeyIsPresent()
    {
        $Vyymzk4dypcg = new Container();
        echo $Vyymzk4dypcg['foo'];
    }

    public function testOffsetGetHonorsNullValues()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['foo'] = null;
        $this->assertNull($Vyymzk4dypcg['foo']);
    }

    public function testUnset()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['param'] = 'value';
        $Vyymzk4dypcg['service'] = function () {
            return new Fixtures\Service();
        };

        unset($Vyymzk4dypcg['param'], $Vyymzk4dypcg['service']);
        $this->assertFalse(isset($Vyymzk4dypcg['param']));
        $this->assertFalse(isset($Vyymzk4dypcg['service']));
    }

    
    public function testShare($Vsdtsk3ofza3)
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['shared_service'] = $Vsdtsk3ofza3;

        $Vxfodhws22k0 = $Vyymzk4dypcg['shared_service'];
        $this->assertInstanceOf('Pimple\Tests\Fixtures\Service', $Vxfodhws22k0);

        $Vfp2rzuwfajm = $Vyymzk4dypcg['shared_service'];
        $this->assertInstanceOf('Pimple\Tests\Fixtures\Service', $Vfp2rzuwfajm);

        $this->assertSame($Vxfodhws22k0, $Vfp2rzuwfajm);
    }

    
    public function testProtect($Vsdtsk3ofza3)
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['protected'] = $Vyymzk4dypcg->protect($Vsdtsk3ofza3);

        $this->assertSame($Vsdtsk3ofza3, $Vyymzk4dypcg['protected']);
    }

    public function testGlobalFunctionNameAsParameterValue()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['global_function'] = 'strlen';
        $this->assertSame('strlen', $Vyymzk4dypcg['global_function']);
    }

    public function testRaw()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['service'] = $Vhajtwowpnu4 = $Vyymzk4dypcg->factory(function () { return 'foo'; });
        $this->assertSame($Vhajtwowpnu4, $Vyymzk4dypcg->raw('service'));
    }

    public function testRawHonorsNullValues()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['foo'] = null;
        $this->assertNull($Vyymzk4dypcg->raw('foo'));
    }

    public function testFluentRegister()
    {
        $Vyymzk4dypcg = new Container();
        $this->assertSame($Vyymzk4dypcg, $Vyymzk4dypcg->register($this->getMockBuilder('Pimple\ServiceProviderInterface')->getMock()));
    }

    
    public function testRawValidatesKeyIsPresent()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg->raw('foo');
    }

    
    public function testLegacyRawValidatesKeyIsPresent()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg->raw('foo');
    }

    
    public function testExtend($Vsdtsk3ofza3)
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['shared_service'] = function () {
            return new Fixtures\Service();
        };
        $Vyymzk4dypcg['factory_service'] = $Vyymzk4dypcg->factory(function () {
            return new Fixtures\Service();
        });

        $Vyymzk4dypcg->extend('shared_service', $Vsdtsk3ofza3);
        $Vxfodhws22k0 = $Vyymzk4dypcg['shared_service'];
        $this->assertInstanceOf('Pimple\Tests\Fixtures\Service', $Vxfodhws22k0);
        $Vfp2rzuwfajm = $Vyymzk4dypcg['shared_service'];
        $this->assertInstanceOf('Pimple\Tests\Fixtures\Service', $Vfp2rzuwfajm);
        $this->assertSame($Vxfodhws22k0, $Vfp2rzuwfajm);
        $this->assertSame($Vxfodhws22k0->value, $Vfp2rzuwfajm->value);

        $Vyymzk4dypcg->extend('factory_service', $Vsdtsk3ofza3);
        $Vxfodhws22k0 = $Vyymzk4dypcg['factory_service'];
        $this->assertInstanceOf('Pimple\Tests\Fixtures\Service', $Vxfodhws22k0);
        $Vfp2rzuwfajm = $Vyymzk4dypcg['factory_service'];
        $this->assertInstanceOf('Pimple\Tests\Fixtures\Service', $Vfp2rzuwfajm);
        $this->assertNotSame($Vxfodhws22k0, $Vfp2rzuwfajm);
        $this->assertNotSame($Vxfodhws22k0->value, $Vfp2rzuwfajm->value);
    }

    public function testExtendDoesNotLeakWithFactories()
    {
        if (extension_loaded('pimple')) {
            $this->markTestSkipped('Pimple extension does not support this test');
        }
        $Vyymzk4dypcg = new Container();

        $Vyymzk4dypcg['foo'] = $Vyymzk4dypcg->factory(function () { return; });
        $Vyymzk4dypcg['foo'] = $Vyymzk4dypcg->extend('foo', function ($Vrqaitdc0ft3, $Vyymzk4dypcg) { return; });
        unset($Vyymzk4dypcg['foo']);

        $Vbf4sq4psyai = new \ReflectionProperty($Vyymzk4dypcg, 'values');
        $Vbf4sq4psyai->setAccessible(true);
        $this->assertEmpty($Vbf4sq4psyai->getValue($Vyymzk4dypcg));

        $Vbf4sq4psyai = new \ReflectionProperty($Vyymzk4dypcg, 'factories');
        $Vbf4sq4psyai->setAccessible(true);
        $this->assertCount(0, $Vbf4sq4psyai->getValue($Vyymzk4dypcg));
    }

    
    public function testExtendValidatesKeyIsPresent()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg->extend('foo', function () {});
    }

    
    public function testLegacyExtendValidatesKeyIsPresent()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg->extend('foo', function () {});
    }

    public function testKeys()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['foo'] = 123;
        $Vyymzk4dypcg['bar'] = 123;

        $this->assertEquals(array('foo', 'bar'), $Vyymzk4dypcg->keys());
    }

    
    public function settingAnInvokableObjectShouldTreatItAsFactory()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['invokable'] = new Fixtures\Invokable();

        $this->assertInstanceOf('Pimple\Tests\Fixtures\Service', $Vyymzk4dypcg['invokable']);
    }

    
    public function settingNonInvokableObjectShouldTreatItAsParameter()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['non_invokable'] = new Fixtures\NonInvokable();

        $this->assertInstanceOf('Pimple\Tests\Fixtures\NonInvokable', $Vyymzk4dypcg['non_invokable']);
    }

    
    public function testFactoryFailsForInvalidServiceDefinitions($Vsdtsk3ofza3)
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg->factory($Vsdtsk3ofza3);
    }

    
    public function testLegacyFactoryFailsForInvalidServiceDefinitions($Vsdtsk3ofza3)
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg->factory($Vsdtsk3ofza3);
    }

    
    public function testProtectFailsForInvalidServiceDefinitions($Vsdtsk3ofza3)
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg->protect($Vsdtsk3ofza3);
    }

    
    public function testLegacyProtectFailsForInvalidServiceDefinitions($Vsdtsk3ofza3)
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg->protect($Vsdtsk3ofza3);
    }

    
    public function testExtendFailsForKeysNotContainingServiceDefinitions($Vsdtsk3ofza3)
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['foo'] = $Vsdtsk3ofza3;
        $Vyymzk4dypcg->extend('foo', function () {});
    }

    
    public function testLegacyExtendFailsForKeysNotContainingServiceDefinitions($Vsdtsk3ofza3)
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['foo'] = $Vsdtsk3ofza3;
        $Vyymzk4dypcg->extend('foo', function () {});
    }

    
    public function testExtendingProtectedClosureDeprecation()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['foo'] = $Vyymzk4dypcg->protect(function () {
            return 'bar';
        });

        $Vyymzk4dypcg->extend('foo', function ($Vcptarsq5qe4) {
            return $Vcptarsq5qe4.'-baz';
        });

        $this->assertSame('bar-baz', $Vyymzk4dypcg['foo']);
    }

    
    public function testExtendFailsForInvalidServiceDefinitions($Vsdtsk3ofza3)
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['foo'] = function () {};
        $Vyymzk4dypcg->extend('foo', $Vsdtsk3ofza3);
    }

    
    public function testLegacyExtendFailsForInvalidServiceDefinitions($Vsdtsk3ofza3)
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['foo'] = function () {};
        $Vyymzk4dypcg->extend('foo', $Vsdtsk3ofza3);
    }

    
    public function testExtendFailsIfFrozenServiceIsNonInvokable()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['foo'] = function () {
            return new Fixtures\NonInvokable();
        };
        $Vrqaitdc0ft3 = $Vyymzk4dypcg['foo'];

        $Vyymzk4dypcg->extend('foo', function () {});
    }

    
    public function testExtendFailsIfFrozenServiceIsInvokable()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['foo'] = function () {
            return new Fixtures\Invokable();
        };
        $Vrqaitdc0ft3 = $Vyymzk4dypcg['foo'];

        $Vyymzk4dypcg->extend('foo', function () {});
    }

    
    public function badServiceDefinitionProvider()
    {
        return array(
          array(123),
          array(new Fixtures\NonInvokable()),
        );
    }

    
    public function serviceDefinitionProvider()
    {
        return array(
            array(function ($Vcptarsq5qe4) {
                $Vsdtsk3ofza3 = new Fixtures\Service();
                $Vsdtsk3ofza3->value = $Vcptarsq5qe4;

                return $Vsdtsk3ofza3;
            }),
            array(new Fixtures\Invokable()),
        );
    }

    public function testDefiningNewServiceAfterFreeze()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['foo'] = function () {
            return 'foo';
        };
        $Vrqaitdc0ft3 = $Vyymzk4dypcg['foo'];

        $Vyymzk4dypcg['bar'] = function () {
            return 'bar';
        };
        $this->assertSame('bar', $Vyymzk4dypcg['bar']);
    }

    
    public function testOverridingServiceAfterFreeze()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['foo'] = function () {
            return 'foo';
        };
        $Vrqaitdc0ft3 = $Vyymzk4dypcg['foo'];

        $Vyymzk4dypcg['foo'] = function () {
            return 'bar';
        };
    }

    
    public function testLegacyOverridingServiceAfterFreeze()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['foo'] = function () {
            return 'foo';
        };
        $Vrqaitdc0ft3 = $Vyymzk4dypcg['foo'];

        $Vyymzk4dypcg['foo'] = function () {
            return 'bar';
        };
    }

    public function testRemovingServiceAfterFreeze()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['foo'] = function () {
            return 'foo';
        };
        $Vrqaitdc0ft3 = $Vyymzk4dypcg['foo'];

        unset($Vyymzk4dypcg['foo']);
        $Vyymzk4dypcg['foo'] = function () {
            return 'bar';
        };
        $this->assertSame('bar', $Vyymzk4dypcg['foo']);
    }

    public function testExtendingService()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['foo'] = function () {
            return 'foo';
        };
        $Vyymzk4dypcg['foo'] = $Vyymzk4dypcg->extend('foo', function ($Vrqaitdc0ft3, $V0ojkog2p2jp) {
            return "$Vrqaitdc0ft3.bar";
        });
        $Vyymzk4dypcg['foo'] = $Vyymzk4dypcg->extend('foo', function ($Vrqaitdc0ft3, $V0ojkog2p2jp) {
            return "$Vrqaitdc0ft3.baz";
        });
        $this->assertSame('foo.bar.baz', $Vyymzk4dypcg['foo']);
    }

    public function testExtendingServiceAfterOtherServiceFreeze()
    {
        $Vyymzk4dypcg = new Container();
        $Vyymzk4dypcg['foo'] = function () {
            return 'foo';
        };
        $Vyymzk4dypcg['bar'] = function () {
            return 'bar';
        };
        $Vrqaitdc0ft3 = $Vyymzk4dypcg['foo'];

        $Vyymzk4dypcg['bar'] = $Vyymzk4dypcg->extend('bar', function ($Vwatlmbamu3p, $V0ojkog2p2jp) {
            return "$Vwatlmbamu3p.baz";
        });
        $this->assertSame('bar.baz', $Vyymzk4dypcg['bar']);
    }
}
