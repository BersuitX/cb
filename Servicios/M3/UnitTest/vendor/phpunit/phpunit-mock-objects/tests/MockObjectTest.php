<?php



class Framework_MockObjectTest extends PHPUnit_Framework_TestCase
{
    public function testMockedMethodIsNeverCalled()
    {
        $Va4elnpuniwh = $this->getMock('AnInterface');
        $Va4elnpuniwh->expects($this->never())
             ->method('doSomething');
    }

    public function testMockedMethodIsNeverCalledWithParameter()
    {
        $Va4elnpuniwh = $this->getMock('SomeClass');
        $Va4elnpuniwh->expects($this->never())
            ->method('doSomething')
            ->with('someArg');
    }

    public function testMockedMethodIsNotCalledWhenExpectsAnyWithParameter()
    {
        $Va4elnpuniwh = $this->getMock('SomeClass');
        $Va4elnpuniwh->expects($this->any())
             ->method('doSomethingElse')
             ->with('someArg');
    }

    public function testMockedMethodIsNotCalledWhenMethodSpecifiedDirectlyWithParameter()
    {
        $Va4elnpuniwh = $this->getMock('SomeClass');
        $Va4elnpuniwh->method('doSomethingElse')
            ->with('someArg');
    }

    public function testMockedMethodIsCalledAtLeastOnce()
    {
        $Va4elnpuniwh = $this->getMock('AnInterface');
        $Va4elnpuniwh->expects($this->atLeastOnce())
             ->method('doSomething');

        $Va4elnpuniwh->doSomething();
    }

    public function testMockedMethodIsCalledAtLeastOnce2()
    {
        $Va4elnpuniwh = $this->getMock('AnInterface');
        $Va4elnpuniwh->expects($this->atLeastOnce())
             ->method('doSomething');

        $Va4elnpuniwh->doSomething();
        $Va4elnpuniwh->doSomething();
    }

    public function testMockedMethodIsCalledAtLeastTwice()
    {
        $Va4elnpuniwh = $this->getMock('AnInterface');
        $Va4elnpuniwh->expects($this->atLeast(2))
             ->method('doSomething');

        $Va4elnpuniwh->doSomething();
        $Va4elnpuniwh->doSomething();
    }

    public function testMockedMethodIsCalledAtLeastTwice2()
    {
        $Va4elnpuniwh = $this->getMock('AnInterface');
        $Va4elnpuniwh->expects($this->atLeast(2))
             ->method('doSomething');

        $Va4elnpuniwh->doSomething();
        $Va4elnpuniwh->doSomething();
        $Va4elnpuniwh->doSomething();
    }

    public function testMockedMethodIsCalledAtMostTwice()
    {
        $Va4elnpuniwh = $this->getMock('AnInterface');
        $Va4elnpuniwh->expects($this->atMost(2))
             ->method('doSomething');

        $Va4elnpuniwh->doSomething();
        $Va4elnpuniwh->doSomething();
    }

    public function testMockedMethodIsCalledAtMosttTwice2()
    {
        $Va4elnpuniwh = $this->getMock('AnInterface');
        $Va4elnpuniwh->expects($this->atMost(2))
             ->method('doSomething');

        $Va4elnpuniwh->doSomething();
    }

    public function testMockedMethodIsCalledOnce()
    {
        $Va4elnpuniwh = $this->getMock('AnInterface');
        $Va4elnpuniwh->expects($this->once())
             ->method('doSomething');

        $Va4elnpuniwh->doSomething();
    }

    public function testMockedMethodIsCalledOnceWithParameter()
    {
        $Va4elnpuniwh = $this->getMock('SomeClass');
        $Va4elnpuniwh->expects($this->once())
             ->method('doSomethingElse')
             ->with($this->equalTo('something'));

        $Va4elnpuniwh->doSomethingElse('something');
    }

    public function testMockedMethodIsCalledExactly()
    {
        $Va4elnpuniwh = $this->getMock('AnInterface');
        $Va4elnpuniwh->expects($this->exactly(2))
             ->method('doSomething');

        $Va4elnpuniwh->doSomething();
        $Va4elnpuniwh->doSomething();
    }

    public function testStubbedException()
    {
        $Va4elnpuniwh = $this->getMock('AnInterface');
        $Va4elnpuniwh->expects($this->any())
             ->method('doSomething')
             ->will($this->throwException(new Exception));

        try {
            $Va4elnpuniwh->doSomething();
        } catch (Exception $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    public function testStubbedWillThrowException()
    {
        $Va4elnpuniwh = $this->getMock('AnInterface');
        $Va4elnpuniwh->expects($this->any())
             ->method('doSomething')
             ->willThrowException(new Exception);

        try {
            $Va4elnpuniwh->doSomething();
        } catch (Exception $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    public function testStubbedReturnValue()
    {
        $Va4elnpuniwh = $this->getMock('AnInterface');
        $Va4elnpuniwh->expects($this->any())
             ->method('doSomething')
             ->will($this->returnValue('something'));

        $this->assertEquals('something', $Va4elnpuniwh->doSomething());

        $Va4elnpuniwh = $this->getMock('AnInterface');
        $Va4elnpuniwh->expects($this->any())
             ->method('doSomething')
             ->willReturn('something');

        $this->assertEquals('something', $Va4elnpuniwh->doSomething());
    }

    public function testStubbedReturnValueMap()
    {
        $Vbdjnzdn3xmh = array(
            array('a', 'b', 'c', 'd'),
            array('e', 'f', 'g', 'h')
        );

        $Va4elnpuniwh = $this->getMock('AnInterface');
        $Va4elnpuniwh->expects($this->any())
             ->method('doSomething')
             ->will($this->returnValueMap($Vbdjnzdn3xmh));

        $this->assertEquals('d', $Va4elnpuniwh->doSomething('a', 'b', 'c'));
        $this->assertEquals('h', $Va4elnpuniwh->doSomething('e', 'f', 'g'));
        $this->assertEquals(null, $Va4elnpuniwh->doSomething('foo', 'bar'));

        $Va4elnpuniwh = $this->getMock('AnInterface');
        $Va4elnpuniwh->expects($this->any())
             ->method('doSomething')
             ->willReturnMap($Vbdjnzdn3xmh);

        $this->assertEquals('d', $Va4elnpuniwh->doSomething('a', 'b', 'c'));
        $this->assertEquals('h', $Va4elnpuniwh->doSomething('e', 'f', 'g'));
        $this->assertEquals(null, $Va4elnpuniwh->doSomething('foo', 'bar'));
    }

    public function testStubbedReturnArgument()
    {
        $Va4elnpuniwh = $this->getMock('AnInterface');
        $Va4elnpuniwh->expects($this->any())
             ->method('doSomething')
             ->will($this->returnArgument(1));

        $this->assertEquals('b', $Va4elnpuniwh->doSomething('a', 'b'));

        $Va4elnpuniwh = $this->getMock('AnInterface');
        $Va4elnpuniwh->expects($this->any())
             ->method('doSomething')
             ->willReturnArgument(1);

        $this->assertEquals('b', $Va4elnpuniwh->doSomething('a', 'b'));
    }

    public function testFunctionCallback()
    {
        $Va4elnpuniwh = $this->getMock('SomeClass', array('doSomething'), array(), '', false);
        $Va4elnpuniwh->expects($this->once())
             ->method('doSomething')
             ->will($this->returnCallback('functionCallback'));

        $this->assertEquals('pass', $Va4elnpuniwh->doSomething('foo', 'bar'));

        $Va4elnpuniwh = $this->getMock('SomeClass', array('doSomething'), array(), '', false);
        $Va4elnpuniwh->expects($this->once())
             ->method('doSomething')
             ->willReturnCallback('functionCallback');

        $this->assertEquals('pass', $Va4elnpuniwh->doSomething('foo', 'bar'));
    }

    public function testStubbedReturnSelf()
    {
        $Va4elnpuniwh = $this->getMock('AnInterface');
        $Va4elnpuniwh->expects($this->any())
             ->method('doSomething')
             ->will($this->returnSelf());

        $this->assertEquals($Va4elnpuniwh, $Va4elnpuniwh->doSomething());

        $Va4elnpuniwh = $this->getMock('AnInterface');
        $Va4elnpuniwh->expects($this->any())
             ->method('doSomething')
             ->willReturnSelf();

        $this->assertEquals($Va4elnpuniwh, $Va4elnpuniwh->doSomething());
    }

    public function testStubbedReturnOnConsecutiveCalls()
    {
        $Va4elnpuniwh = $this->getMock('AnInterface');
        $Va4elnpuniwh->expects($this->any())
             ->method('doSomething')
             ->will($this->onConsecutiveCalls('a', 'b', 'c'));

        $this->assertEquals('a', $Va4elnpuniwh->doSomething());
        $this->assertEquals('b', $Va4elnpuniwh->doSomething());
        $this->assertEquals('c', $Va4elnpuniwh->doSomething());

        $Va4elnpuniwh = $this->getMock('AnInterface');
        $Va4elnpuniwh->expects($this->any())
             ->method('doSomething')
             ->willReturnOnConsecutiveCalls('a', 'b', 'c');

        $this->assertEquals('a', $Va4elnpuniwh->doSomething());
        $this->assertEquals('b', $Va4elnpuniwh->doSomething());
        $this->assertEquals('c', $Va4elnpuniwh->doSomething());
    }

    public function testStaticMethodCallback()
    {
        $Va4elnpuniwh = $this->getMock('SomeClass', array('doSomething'), array(), '', false);
        $Va4elnpuniwh->expects($this->once())
             ->method('doSomething')
             ->will($this->returnCallback(array('MethodCallback', 'staticCallback')));

        $this->assertEquals('pass', $Va4elnpuniwh->doSomething('foo', 'bar'));
    }

    public function testPublicMethodCallback()
    {
        $Va4elnpuniwh = $this->getMock('SomeClass', array('doSomething'), array(), '', false);
        $Va4elnpuniwh->expects($this->once())
             ->method('doSomething')
             ->will($this->returnCallback(array(new MethodCallback, 'nonStaticCallback')));

        $this->assertEquals('pass', $Va4elnpuniwh->doSomething('foo', 'bar'));
    }

    public function testMockClassOnlyGeneratedOnce()
    {
        $Va4elnpuniwh1 = $this->getMock('AnInterface');
        $Va4elnpuniwh2 = $this->getMock('AnInterface');

        $this->assertEquals(get_class($Va4elnpuniwh1), get_class($Va4elnpuniwh2));
    }

    public function testMockClassDifferentForPartialMocks()
    {
        $Va4elnpuniwh1 = $this->getMock('PartialMockTestClass');
        $Va4elnpuniwh2 = $this->getMock('PartialMockTestClass', array('doSomething'));
        $Va4elnpuniwh3 = $this->getMock('PartialMockTestClass', array('doSomething'));
        $Va4elnpuniwh4 = $this->getMock('PartialMockTestClass', array('doAnotherThing'));
        $Va4elnpuniwh5 = $this->getMock('PartialMockTestClass', array('doAnotherThing'));

        $this->assertNotEquals(get_class($Va4elnpuniwh1), get_class($Va4elnpuniwh2));
        $this->assertNotEquals(get_class($Va4elnpuniwh1), get_class($Va4elnpuniwh3));
        $this->assertNotEquals(get_class($Va4elnpuniwh1), get_class($Va4elnpuniwh4));
        $this->assertNotEquals(get_class($Va4elnpuniwh1), get_class($Va4elnpuniwh5));
        $this->assertEquals(get_class($Va4elnpuniwh2), get_class($Va4elnpuniwh3));
        $this->assertNotEquals(get_class($Va4elnpuniwh2), get_class($Va4elnpuniwh4));
        $this->assertNotEquals(get_class($Va4elnpuniwh2), get_class($Va4elnpuniwh5));
        $this->assertEquals(get_class($Va4elnpuniwh4), get_class($Va4elnpuniwh5));
    }

    public function testMockClassStoreOverrulable()
    {
        $Va4elnpuniwh1 = $this->getMock('PartialMockTestClass');
        $Va4elnpuniwh2 = $this->getMock('PartialMockTestClass', array(), array(), 'MyMockClassNameForPartialMockTestClass1');
        $Va4elnpuniwh3 = $this->getMock('PartialMockTestClass');
        $Va4elnpuniwh4 = $this->getMock('PartialMockTestClass', array('doSomething'), array(), 'AnotherMockClassNameForPartialMockTestClass');
        $Va4elnpuniwh5 = $this->getMock('PartialMockTestClass', array(), array(), 'MyMockClassNameForPartialMockTestClass2');

        $this->assertNotEquals(get_class($Va4elnpuniwh1), get_class($Va4elnpuniwh2));
        $this->assertEquals(get_class($Va4elnpuniwh1), get_class($Va4elnpuniwh3));
        $this->assertNotEquals(get_class($Va4elnpuniwh1), get_class($Va4elnpuniwh4));
        $this->assertNotEquals(get_class($Va4elnpuniwh2), get_class($Va4elnpuniwh3));
        $this->assertNotEquals(get_class($Va4elnpuniwh2), get_class($Va4elnpuniwh4));
        $this->assertNotEquals(get_class($Va4elnpuniwh2), get_class($Va4elnpuniwh5));
        $this->assertNotEquals(get_class($Va4elnpuniwh3), get_class($Va4elnpuniwh4));
        $this->assertNotEquals(get_class($Va4elnpuniwh3), get_class($Va4elnpuniwh5));
        $this->assertNotEquals(get_class($Va4elnpuniwh4), get_class($Va4elnpuniwh5));
    }

    
    public function testGetMockWithFixedClassNameCanProduceTheSameMockTwice()
    {
        $Va4elnpuniwh = $this->getMockBuilder('StdClass')->setMockClassName('FixedName')->getMock();
        $Va4elnpuniwh = $this->getMockBuilder('StdClass')->setMockClassName('FixedName')->getMock();
        $this->assertInstanceOf('StdClass', $Va4elnpuniwh);
    }

    public function testOriginalConstructorSettingConsidered()
    {
        $Va4elnpuniwh1 = $this->getMock('PartialMockTestClass');
        $Va4elnpuniwh2 = $this->getMock('PartialMockTestClass', array(), array(), '', false);

        $this->assertTrue($Va4elnpuniwh1->constructorCalled);
        $this->assertFalse($Va4elnpuniwh2->constructorCalled);
    }

    public function testOriginalCloneSettingConsidered()
    {
        $Va4elnpuniwh1 = $this->getMock('PartialMockTestClass');
        $Va4elnpuniwh2 = $this->getMock('PartialMockTestClass', array(), array(), '', true, false);

        $this->assertNotEquals(get_class($Va4elnpuniwh1), get_class($Va4elnpuniwh2));
    }

    public function testGetMockForAbstractClass()
    {
        $Va4elnpuniwh = $this->getMock('AbstractMockTestClass');
        $Va4elnpuniwh->expects($this->never())
             ->method('doSomething');
    }

    public function traversableProvider()
    {
        return array(
          array('Traversable'),
          array('\Traversable'),
          array('TraversableMockTestInterface'),
          array(array('Traversable')),
          array(array('Iterator','Traversable')),
          array(array('\Iterator','\Traversable'))
        );
    }

    
    public function testGetMockForTraversable($V31qrja1w0r2)
    {
        $Va4elnpuniwh = $this->getMock($V31qrja1w0r2);
        $this->assertInstanceOf('Traversable', $Va4elnpuniwh);
    }

    public function testMultipleInterfacesCanBeMockedInSingleObject()
    {
        $Va4elnpuniwh = $this->getMock(array('AnInterface', 'AnotherInterface'));
        $this->assertInstanceOf('AnInterface', $Va4elnpuniwh);
        $this->assertInstanceOf('AnotherInterface', $Va4elnpuniwh);
    }

    
    public function testGetMockForTrait()
    {
        $Va4elnpuniwh = $this->getMockForTrait('AbstractTrait');
        $Va4elnpuniwh->expects($this->never())->method('doSomething');

        $Vz4c1zo3dvrb = get_parent_class($Va4elnpuniwh);
        $Vml1s3yuysul = class_uses($Vz4c1zo3dvrb, false);

        $this->assertContains('AbstractTrait', $Vml1s3yuysul);
    }

    public function testClonedMockObjectShouldStillEqualTheOriginal()
    {
        $Vmbzc5xgwrgo = $this->getMock('stdClass');
        $Vglk1nbl1t2o = clone $Vmbzc5xgwrgo;
        $this->assertEquals($Vmbzc5xgwrgo, $Vglk1nbl1t2o);
    }

    public function testMockObjectsConstructedIndepentantlyShouldBeEqual()
    {
        $Vmbzc5xgwrgo = $this->getMock('stdClass');
        $Vglk1nbl1t2o = $this->getMock('stdClass');
        $this->assertEquals($Vmbzc5xgwrgo, $Vglk1nbl1t2o);
    }

    public function testMockObjectsConstructedIndepentantlyShouldNotBeTheSame()
    {
        $Vmbzc5xgwrgo = $this->getMock('stdClass');
        $Vglk1nbl1t2o = $this->getMock('stdClass');
        $this->assertNotSame($Vmbzc5xgwrgo, $Vglk1nbl1t2o);
    }

    public function testClonedMockObjectCanBeUsedInPlaceOfOriginalOne()
    {
        $Voozl3vb2soz = $this->getMock('stdClass');
        $Vxh3xyx0g4ym = clone $Voozl3vb2soz;

        $Va4elnpuniwh = $this->getMock('stdClass', array('foo'));
        $Va4elnpuniwh->expects($this->once())->method('foo')->with($this->equalTo($Voozl3vb2soz));
        $Va4elnpuniwh->foo($Vxh3xyx0g4ym);
    }

    public function testClonedMockObjectIsNotIdenticalToOriginalOne()
    {
        $Voozl3vb2soz = $this->getMock('stdClass');
        $Vxh3xyx0g4ym = clone $Voozl3vb2soz;

        $Va4elnpuniwh = $this->getMock('stdClass', array('foo'));
        $Va4elnpuniwh->expects($this->once())->method('foo')->with($this->logicalNot($this->identicalTo($Voozl3vb2soz)));
        $Va4elnpuniwh->foo($Vxh3xyx0g4ym);
    }

    public function testObjectMethodCallWithArgumentCloningEnabled()
    {
        $Vpt32vvhspnvxpectedObject = new StdClass;

        $Va4elnpuniwh = $this->getMockBuilder('SomeClass')
                     ->setMethods(array('doSomethingElse'))
                     ->enableArgumentCloning()
                     ->getMock();

        $Vmbzc5xgwrgoctualArguments = array();

        $Va4elnpuniwh->expects($this->any())
        ->method('doSomethingElse')
        ->will($this->returnCallback(function () use (&$Vmbzc5xgwrgoctualArguments) {
            $Vmbzc5xgwrgoctualArguments = func_get_args();
        }));

        $Va4elnpuniwh->doSomethingElse($Vpt32vvhspnvxpectedObject);

        $this->assertEquals(1, count($Vmbzc5xgwrgoctualArguments));
        $this->assertEquals($Vpt32vvhspnvxpectedObject, $Vmbzc5xgwrgoctualArguments[0]);
        $this->assertNotSame($Vpt32vvhspnvxpectedObject, $Vmbzc5xgwrgoctualArguments[0]);
    }

    public function testObjectMethodCallWithArgumentCloningDisabled()
    {
        $Vpt32vvhspnvxpectedObject = new StdClass;

        $Va4elnpuniwh = $this->getMockBuilder('SomeClass')
                     ->setMethods(array('doSomethingElse'))
                     ->disableArgumentCloning()
                     ->getMock();

        $Vmbzc5xgwrgoctualArguments = array();

        $Va4elnpuniwh->expects($this->any())
        ->method('doSomethingElse')
        ->will($this->returnCallback(function () use (&$Vmbzc5xgwrgoctualArguments) {
            $Vmbzc5xgwrgoctualArguments = func_get_args();
        }));

        $Va4elnpuniwh->doSomethingElse($Vpt32vvhspnvxpectedObject);

        $this->assertEquals(1, count($Vmbzc5xgwrgoctualArguments));
        $this->assertSame($Vpt32vvhspnvxpectedObject, $Vmbzc5xgwrgoctualArguments[0]);
    }

    public function testArgumentCloningOptionGeneratesUniqueMock()
    {
        $Va4elnpuniwhWithCloning = $this->getMockBuilder('SomeClass')
                                ->setMethods(array('doSomethingElse'))
                                ->enableArgumentCloning()
                                ->getMock();

        $Va4elnpuniwhWithoutCloning = $this->getMockBuilder('SomeClass')
                                   ->setMethods(array('doSomethingElse'))
                                   ->disableArgumentCloning()
                                   ->getMock();

        $this->assertNotEquals($Va4elnpuniwhWithCloning, $Va4elnpuniwhWithoutCloning);
    }

    public function testVerificationOfMethodNameFailsWithoutParameters()
    {
        $Va4elnpuniwh = $this->getMock('SomeClass', array('right', 'wrong'), array(), '', true, true, true);
        $Va4elnpuniwh->expects($this->once())
             ->method('right');

        $Va4elnpuniwh->wrong();
        try {
            $Va4elnpuniwh->__phpunit_verify();
            $this->fail('Expected exception');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertSame(
                "Expectation failed for method name is equal to <string:right> when invoked 1 time(s).\n"
                . "Method was expected to be called 1 times, actually called 0 times.\n",
                $Vpt32vvhspnv->getMessage()
            );
        }

        $this->resetMockObjects();
    }

    public function testVerificationOfMethodNameFailsWithParameters()
    {
        $Va4elnpuniwh = $this->getMock('SomeClass', array('right', 'wrong'), array(), '', true, true, true);
        $Va4elnpuniwh->expects($this->once())
             ->method('right');

        $Va4elnpuniwh->wrong();
        try {
            $Va4elnpuniwh->__phpunit_verify();
            $this->fail('Expected exception');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertSame(
                "Expectation failed for method name is equal to <string:right> when invoked 1 time(s).\n"
                . "Method was expected to be called 1 times, actually called 0 times.\n",
                $Vpt32vvhspnv->getMessage()
            );
        }

        $this->resetMockObjects();
    }

    public function testVerificationOfMethodNameFailsWithWrongParameters()
    {
        $Va4elnpuniwh = $this->getMock('SomeClass', array('right', 'wrong'), array(), '', true, true, true);
        $Va4elnpuniwh->expects($this->once())
             ->method('right')
             ->with(array('first', 'second'));

        try {
            $Va4elnpuniwh->right(array('second'));
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertSame(
                "Expectation failed for method name is equal to <string:right> when invoked 1 time(s)\n"
                . "Parameter 0 for invocation SomeClass::right(Array (...)) does not match expected value.\n"
                . "Failed asserting that two arrays are equal.",
                $Vpt32vvhspnv->getMessage()
            );
        }

        try {
            $Va4elnpuniwh->__phpunit_verify();
            $this->fail('Expected exception');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertSame(
                "Expectation failed for method name is equal to <string:right> when invoked 1 time(s).\n"
                . "Parameter 0 for invocation SomeClass::right(Array (...)) does not match expected value.\n"
                . "Failed asserting that two arrays are equal.\n"
                . "--- Expected\n"
                . "+++ Actual\n"
                . "@@ @@\n"
                . " Array (\n"
                . "-    0 => 'first'\n"
                . "-    1 => 'second'\n"
                . "+    0 => 'second'\n"
                . " )\n",
                $Vpt32vvhspnv->getMessage()
            );
        }

        $this->resetMockObjects();
    }

    public function testVerificationOfNeverFailsWithEmptyParameters()
    {
        $Va4elnpuniwh = $this->getMock('SomeClass', array('right', 'wrong'), array(), '', true, true, true);
        $Va4elnpuniwh->expects($this->never())
             ->method('right')
             ->with();

        try {
            $Va4elnpuniwh->right();
            $this->fail('Expected exception');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertSame(
                'SomeClass::right() was not expected to be called.',
                $Vpt32vvhspnv->getMessage()
            );
        }

        $this->resetMockObjects();
    }

    public function testVerificationOfNeverFailsWithAnyParameters()
    {
        $Va4elnpuniwh = $this->getMock('SomeClass', array('right', 'wrong'), array(), '', true, true, true);
        $Va4elnpuniwh->expects($this->never())
             ->method('right')
             ->withAnyParameters();

        try {
            $Va4elnpuniwh->right();
            $this->fail('Expected exception');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertSame(
                'SomeClass::right() was not expected to be called.',
                $Vpt32vvhspnv->getMessage()
            );
        }

        $this->resetMockObjects();
    }

    
    public function testWithAnythingInsteadOfWithAnyParameters()
    {
        $Va4elnpuniwh = $this->getMock('SomeClass', array('right'), array(), '', true, true, true);
        $Va4elnpuniwh->expects($this->once())
             ->method('right')
             ->with($this->anything());

        try {
            $Va4elnpuniwh->right();
            $this->fail('Expected exception');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertSame(
                "Expectation failed for method name is equal to <string:right> when invoked 1 time(s)\n" .
                "Parameter count for invocation SomeClass::right() is too low.\n" .
                "To allow 0 or more parameters with any value, omit ->with() or use ->withAnyParameters() instead.",
                $Vpt32vvhspnv->getMessage()
            );
        }

        $this->resetMockObjects();
    }

    
    public function testMockArgumentsPassedByReference()
    {
        $Vrqaitdc0ft3 = $this->getMockBuilder('MethodCallbackByReference')
                    ->setMethods(array('bar'))
                    ->disableOriginalConstructor()
                    ->disableArgumentCloning()
                    ->getMock();

        $Vrqaitdc0ft3->expects($this->any())
            ->method('bar')
            ->will($this->returnCallback(array($Vrqaitdc0ft3, 'callback')));

        $Vmbzc5xgwrgo = $Vglk1nbl1t2o = $Vibefsvmlpru = 0;

        $Vrqaitdc0ft3->bar($Vmbzc5xgwrgo, $Vglk1nbl1t2o, $Vibefsvmlpru);

        $this->assertEquals(1, $Vglk1nbl1t2o);
    }

    
    public function testMockArgumentsPassedByReference2()
    {
        $Vrqaitdc0ft3 = $this->getMockBuilder('MethodCallbackByReference')
                    ->disableOriginalConstructor()
                    ->disableArgumentCloning()
                    ->getMock();

        $Vrqaitdc0ft3->expects($this->any())
            ->method('bar')
            ->will($this->returnCallback(
                function (&$Vmbzc5xgwrgo, &$Vglk1nbl1t2o, $Vibefsvmlpru) {
                    $Vglk1nbl1t2o = 1;
                }
            ));

        $Vmbzc5xgwrgo = $Vglk1nbl1t2o = $Vibefsvmlpru = 0;

        $Vrqaitdc0ft3->bar($Vmbzc5xgwrgo, $Vglk1nbl1t2o, $Vibefsvmlpru);

        $this->assertEquals(1, $Vglk1nbl1t2o);
    }

    
    public function testMockArgumentsPassedByReference3()
    {
        $Vrqaitdc0ft3 = $this->getMockBuilder('MethodCallbackByReference')
                    ->setMethods(array('bar'))
                    ->disableOriginalConstructor()
                    ->disableArgumentCloning()
                    ->getMock();

        $Vmbzc5xgwrgo = new stdClass();
        $Vglk1nbl1t2o = $Vibefsvmlpru = 0;

        $Vrqaitdc0ft3->expects($this->any())
            ->method('bar')
            ->with($Vmbzc5xgwrgo, $Vglk1nbl1t2o, $Vibefsvmlpru)
            ->will($this->returnCallback(array($Vrqaitdc0ft3, 'callback')));

        $Vrqaitdc0ft3->bar($Vmbzc5xgwrgo, $Vglk1nbl1t2o, $Vibefsvmlpru);
    }

    
    public function testMockArgumentsPassedByReference4()
    {
        $Vrqaitdc0ft3 = $this->getMockBuilder('MethodCallbackByReference')
                    ->setMethods(array('bar'))
                    ->disableOriginalConstructor()
                    ->disableArgumentCloning()
                    ->getMock();

        $Vmbzc5xgwrgo = new stdClass();
        $Vglk1nbl1t2o = $Vibefsvmlpru = 0;

        $Vrqaitdc0ft3->expects($this->any())
            ->method('bar')
            ->with($this->isInstanceOf("stdClass"), $Vglk1nbl1t2o, $Vibefsvmlpru)
            ->will($this->returnCallback(array($Vrqaitdc0ft3, 'callback')));

        $Vrqaitdc0ft3->bar($Vmbzc5xgwrgo, $Vglk1nbl1t2o, $Vibefsvmlpru);
    }

    
    public function testCreateMockFromWsdl()
    {
        $Va4elnpuniwh = $this->getMockFromWsdl(__DIR__ . '/_fixture/GoogleSearch.wsdl', 'WsdlMock');
        $this->assertStringStartsWith(
            'Mock_WsdlMock_',
            get_class($Va4elnpuniwh)
        );
    }

    
    public function testCreateNamespacedMockFromWsdl()
    {
        $Va4elnpuniwh = $this->getMockFromWsdl(__DIR__ . '/_fixture/GoogleSearch.wsdl', 'My\\Space\\WsdlMock');
        $this->assertStringStartsWith(
            'Mock_WsdlMock_',
            get_class($Va4elnpuniwh)
        );
    }

    
    public function testCreateTwoMocksOfOneWsdlFile()
    {
        $Va4elnpuniwh = $this->getMockFromWsdl(__DIR__ . '/_fixture/GoogleSearch.wsdl');
        $Va4elnpuniwh = $this->getMockFromWsdl(__DIR__ . '/_fixture/GoogleSearch.wsdl');
    }

    
    public function testInterfaceWithStaticMethodCanBeStubbed()
    {
        $this->assertInstanceOf(
            'InterfaceWithStaticMethod',
            $this->getMock('InterfaceWithStaticMethod')
        );
    }

    
    public function testInvokingStubbedStaticMethodRaisesException()
    {
        $Va4elnpuniwh = $this->getMock('ClassWithStaticMethod');
        $Va4elnpuniwh->staticMethod();
    }

    
    public function testStubForClassThatImplementsSerializableCanBeCreatedWithoutInvokingTheConstructor()
    {
        $this->assertInstanceOf(
            'ClassThatImplementsSerializable',
            $this->getMockBuilder('ClassThatImplementsSerializable')
                 ->disableOriginalConstructor()
                 ->getMock()
        );
    }

    private function resetMockObjects()
    {
        $Vgna2spvhtly = new ReflectionObject($this);
        $Vgna2spvhtly = $Vgna2spvhtly->getParentClass();
        $V31glrcd33et = $Vgna2spvhtly->getProperty('mockObjects');
        $V31glrcd33et->setAccessible(true);
        $V31glrcd33et->setValue($this, array());
    }
}
