<?php



class Framework_AssertTest extends PHPUnit_Framework_TestCase
{
    
    private $Vs3qktgsvqxs;

    protected function setUp()
    {
        $this->filesDirectory = dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR;
    }

    
    public function testFail()
    {
        try {
            $this->fail();
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        throw new PHPUnit_Framework_AssertionFailedError('Fail did not throw fail exception');
    }

    
    public function testAssertSplObjectStorageContainsObject()
    {
        $Vmbzc5xgwrgo = new stdClass;
        $Vglk1nbl1t2o = new stdClass;
        $Vibefsvmlpru = new SplObjectStorage;
        $Vibefsvmlpru->attach($Vmbzc5xgwrgo);

        $this->assertContains($Vmbzc5xgwrgo, $Vibefsvmlpru);

        try {
            $this->assertContains($Vglk1nbl1t2o, $Vibefsvmlpru);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertArrayContainsObject()
    {
        $Vmbzc5xgwrgo = new stdClass;
        $Vglk1nbl1t2o = new stdClass;

        $this->assertContains($Vmbzc5xgwrgo, array($Vmbzc5xgwrgo));

        try {
            $this->assertContains($Vmbzc5xgwrgo, array($Vglk1nbl1t2o));
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertArrayContainsString()
    {
        $this->assertContains('foo', array('foo'));

        try {
            $this->assertContains('foo', array('bar'));
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertArrayContainsNonObject()
    {
        $this->assertContains('foo', array(true));

        try {
            $this->assertContains('foo', array(true), '', false, true, true);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertContainsOnlyInstancesOf()
    {
        $Vpswbntjg3pr = array(
            new Book(),
            new Book
        );
        $this->assertContainsOnlyInstancesOf('Book', $Vpswbntjg3pr);
        $this->assertContainsOnlyInstancesOf('stdClass', array(new stdClass()));

        $Vpswbntjg3pr2 = array(
            new Author('Test')
        );
        try {
            $this->assertContainsOnlyInstancesOf('Book', $Vpswbntjg3pr2);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }
        $this->fail();
    }

    
    public function testAssertArrayHasKeyThrowsExceptionForInvalidFirstArgument()
    {
        $this->assertArrayHasKey(null, array());
    }

    
    public function testAssertArrayHasKeyThrowsExceptionForInvalidSecondArgument()
    {
        $this->assertArrayHasKey(0, null);
    }

    
    public function testAssertArrayHasIntegerKey()
    {
        $this->assertArrayHasKey(0, array('foo'));

        try {
            $this->assertArrayHasKey(1, array('foo'));
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertArraySubset()
    {
        $Vmbzc5xgwrgorray = array(
            'a' => 'item a',
            'b' => 'item b',
            'c' => array('a2' => 'item a2', 'b2' => 'item b2'),
            'd' => array('a2' => array('a3' => 'item a3', 'b3' => 'item b3'))
        );

        $this->assertArraySubset(array('a' => 'item a', 'c' => array('a2' => 'item a2')), $Vmbzc5xgwrgorray);
        $this->assertArraySubset(array('a' => 'item a', 'd' => array('a2' => array('b3' => 'item b3'))), $Vmbzc5xgwrgorray);

        $Vmbzc5xgwrgorrayAccessData = new ArrayObject($Vmbzc5xgwrgorray);

        $this->assertArraySubset(array('a' => 'item a', 'c' => array('a2' => 'item a2')), $Vmbzc5xgwrgorrayAccessData);
        $this->assertArraySubset(array('a' => 'item a', 'd' => array('a2' => array('b3' => 'item b3'))), $Vmbzc5xgwrgorrayAccessData);

        try {
            $this->assertArraySubset(array('a' => 'bad value'), $Vmbzc5xgwrgorray);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
        }

        try {
            $this->assertArraySubset(array('d' => array('a2' => array('bad index' => 'item b3'))), $Vmbzc5xgwrgorray);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertArraySubsetWithDeepNestedArrays()
    {
        $Vmbzc5xgwrgorray = array(
            'path' => array(
                'to' => array(
                    'the' => array(
                        'cake' => 'is a lie'
                    )
                )
            )
        );

        $this->assertArraySubset(array('path' => array()), $Vmbzc5xgwrgorray);
        $this->assertArraySubset(array('path' => array('to' => array())), $Vmbzc5xgwrgorray);
        $this->assertArraySubset(array('path' => array('to' => array('the' => array()))), $Vmbzc5xgwrgorray);
        $this->assertArraySubset(array('path' => array('to' => array('the' => array('cake' => 'is a lie')))), $Vmbzc5xgwrgorray);

        try {
            $this->assertArraySubset(array('path' => array('to' => array('the' => array('cake' => 'is not a lie')))), $Vmbzc5xgwrgorray);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertArraySubsetWithNoStrictCheckAndObjects()
    {
        $Vuvvkm1baslr       = new \stdClass;
        $Vea0tc0mxkzg = &$Vuvvkm1baslr;
        $Vmbzc5xgwrgorray     = array('a' => $Vuvvkm1baslr);

        $this->assertArraySubset(array('a' => $Vea0tc0mxkzg), $Vmbzc5xgwrgorray);
        $this->assertArraySubset(array('a' => new \stdClass), $Vmbzc5xgwrgorray);
    }

    
    public function testAssertArraySubsetWithStrictCheckAndObjects()
    {
        $Vuvvkm1baslr       = new \stdClass;
        $Vea0tc0mxkzg = &$Vuvvkm1baslr;
        $Vmbzc5xgwrgorray     = array('a' => $Vuvvkm1baslr);

        $this->assertArraySubset(array('a' => $Vea0tc0mxkzg), $Vmbzc5xgwrgorray, true);

        try {
            $this->assertArraySubset(array('a' => new \stdClass), $Vmbzc5xgwrgorray, true);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail('Strict recursive array check fail.');
    }

    
    public function testAssertArraySubsetRaisesExceptionForInvalidArguments($Vpmlupyvayyh, $Vkjvds2sfywy)
    {
        $this->assertArraySubset($Vpmlupyvayyh, $Vkjvds2sfywy);
    }

    
    public function assertArraySubsetInvalidArgumentProvider()
    {
        return array(
            array(false, array()),
            array(array(), false),
        );
    }

    
    public function testAssertArrayNotHasKeyThrowsExceptionForInvalidFirstArgument()
    {
        $this->assertArrayNotHasKey(null, array());
    }

    
    public function testAssertArrayNotHasKeyThrowsExceptionForInvalidSecondArgument()
    {
        $this->assertArrayNotHasKey(0, null);
    }

    
    public function testAssertArrayNotHasIntegerKey()
    {
        $this->assertArrayNotHasKey(1, array('foo'));

        try {
            $this->assertArrayNotHasKey(0, array('foo'));
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertArrayHasStringKey()
    {
        $this->assertArrayHasKey('foo', array('foo' => 'bar'));

        try {
            $this->assertArrayHasKey('bar', array('foo' => 'bar'));
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertArrayNotHasStringKey()
    {
        $this->assertArrayNotHasKey('bar', array('foo' => 'bar'));

        try {
            $this->assertArrayNotHasKey('foo', array('foo' => 'bar'));
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertArrayHasKeyAcceptsArrayObjectValue()
    {
        $Vmbzc5xgwrgorray        = new ArrayObject();
        $Vmbzc5xgwrgorray['foo'] = 'bar';
        $this->assertArrayHasKey('foo', $Vmbzc5xgwrgorray);
    }

    
    public function testAssertArrayHasKeyProperlyFailsWithArrayObjectValue()
    {
        $Vmbzc5xgwrgorray        = new ArrayObject();
        $Vmbzc5xgwrgorray['bar'] = 'bar';
        $this->assertArrayHasKey('foo', $Vmbzc5xgwrgorray);
    }

    
    public function testAssertArrayHasKeyAcceptsArrayAccessValue()
    {
        $Vmbzc5xgwrgorray        = new SampleArrayAccess();
        $Vmbzc5xgwrgorray['foo'] = 'bar';
        $this->assertArrayHasKey('foo', $Vmbzc5xgwrgorray);
    }

    
    public function testAssertArrayHasKeyProperlyFailsWithArrayAccessValue()
    {
        $Vmbzc5xgwrgorray        = new SampleArrayAccess();
        $Vmbzc5xgwrgorray['bar'] = 'bar';
        $this->assertArrayHasKey('foo', $Vmbzc5xgwrgorray);
    }

    
    public function testAssertArrayNotHasKeyAcceptsArrayAccessValue()
    {
        $Vmbzc5xgwrgorray        = new ArrayObject();
        $Vmbzc5xgwrgorray['foo'] = 'bar';
        $this->assertArrayNotHasKey('bar', $Vmbzc5xgwrgorray);
    }

    
    public function testAssertArrayNotHasKeyPropertlyFailsWithArrayAccessValue()
    {
        $Vmbzc5xgwrgorray        = new ArrayObject();
        $Vmbzc5xgwrgorray['bar'] = 'bar';
        $this->assertArrayNotHasKey('bar', $Vmbzc5xgwrgorray);
    }

    
    public function testAssertContainsThrowsException()
    {
        $this->assertContains(null, null);
    }

    
    public function testAssertIteratorContainsObject()
    {
        $Vrqaitdc0ft3 = new stdClass;

        $this->assertContains($Vrqaitdc0ft3, new TestIterator(array($Vrqaitdc0ft3)));

        try {
            $this->assertContains($Vrqaitdc0ft3, new TestIterator(array(new stdClass)));
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertIteratorContainsString()
    {
        $this->assertContains('foo', new TestIterator(array('foo')));

        try {
            $this->assertContains('foo', new TestIterator(array('bar')));
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertStringContainsString()
    {
        $this->assertContains('foo', 'foobar');

        try {
            $this->assertContains('foo', 'bar');
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertNotContainsThrowsException()
    {
        $this->assertNotContains(null, null);
    }

    
    public function testAssertSplObjectStorageNotContainsObject()
    {
        $Vmbzc5xgwrgo = new stdClass;
        $Vglk1nbl1t2o = new stdClass;
        $Vibefsvmlpru = new SplObjectStorage;
        $Vibefsvmlpru->attach($Vmbzc5xgwrgo);

        $this->assertNotContains($Vglk1nbl1t2o, $Vibefsvmlpru);

        try {
            $this->assertNotContains($Vmbzc5xgwrgo, $Vibefsvmlpru);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertArrayNotContainsObject()
    {
        $Vmbzc5xgwrgo = new stdClass;
        $Vglk1nbl1t2o = new stdClass;

        $this->assertNotContains($Vmbzc5xgwrgo, array($Vglk1nbl1t2o));

        try {
            $this->assertNotContains($Vmbzc5xgwrgo, array($Vmbzc5xgwrgo));
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertArrayNotContainsString()
    {
        $this->assertNotContains('foo', array('bar'));

        try {
            $this->assertNotContains('foo', array('foo'));
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertArrayNotContainsNonObject()
    {
        $this->assertNotContains('foo', array(true), '', false, true, true);

        try {
            $this->assertNotContains('foo', array(true));
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertStringNotContainsString()
    {
        $this->assertNotContains('foo', 'bar');

        try {
            $this->assertNotContains('foo', 'foo');
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertContainsOnlyThrowsException()
    {
        $this->assertContainsOnly(null, null);
    }

    
    public function testAssertNotContainsOnlyThrowsException()
    {
        $this->assertNotContainsOnly(null, null);
    }

    
    public function testAssertContainsOnlyInstancesOfThrowsException()
    {
        $this->assertContainsOnlyInstancesOf(null, null);
    }

    
    public function testAssertArrayContainsOnlyIntegers()
    {
        $this->assertContainsOnly('integer', array(1, 2, 3));

        try {
            $this->assertContainsOnly('integer', array('1', 2, 3));
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertArrayNotContainsOnlyIntegers()
    {
        $this->assertNotContainsOnly('integer', array('1', 2, 3));

        try {
            $this->assertNotContainsOnly('integer', array(1, 2, 3));
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertArrayContainsOnlyStdClass()
    {
        $this->assertContainsOnly('StdClass', array(new stdClass));

        try {
            $this->assertContainsOnly('StdClass', array('StdClass'));
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertArrayNotContainsOnlyStdClass()
    {
        $this->assertNotContainsOnly('StdClass', array('StdClass'));

        try {
            $this->assertNotContainsOnly('StdClass', array(new stdClass));
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    protected function sameValues()
    {
        $Vuvvkm1baslrect = new SampleClass(4, 8, 15);
        
        
        $Vpu3xl4uhgg5     = dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'foo.xml';
        $Vbduzasjp2m2 = fopen($Vpu3xl4uhgg5, 'r');

        return array(
            
            array(null, null),
            
            array('a', 'a'),
            
            array(0, 0),
            
            array(2.3, 2.3),
            array(1/3, 1 - 2/3),
            array(log(0), log(0)),
            
            array(array(), array()),
            array(array(0 => 1), array(0 => 1)),
            array(array(0 => null), array(0 => null)),
            array(array('a', 'b' => array(1, 2)), array('a', 'b' => array(1, 2))),
            
            array($Vuvvkm1baslrect, $Vuvvkm1baslrect),
            
            array($Vbduzasjp2m2, $Vbduzasjp2m2),
        );
    }

    protected function notEqualValues()
    {
        
        $Vglk1nbl1t2oook1                  = new Book;
        $Vglk1nbl1t2oook1->author          = new Author('Terry Pratchett');
        $Vglk1nbl1t2oook1->author->books[] = $Vglk1nbl1t2oook1;
        $Vglk1nbl1t2oook2                  = new Book;
        $Vglk1nbl1t2oook2->author          = new Author('Terry Pratch');
        $Vglk1nbl1t2oook2->author->books[] = $Vglk1nbl1t2oook2;

        $Vglk1nbl1t2oook3         = new Book;
        $Vglk1nbl1t2oook3->author = 'Terry Pratchett';
        $Vglk1nbl1t2oook4         = new stdClass;
        $Vglk1nbl1t2oook4->author = 'Terry Pratchett';

        $Vuvvkm1baslrect1  = new SampleClass(4, 8, 15);
        $Vuvvkm1baslrect2  = new SampleClass(16, 23, 42);
        $Vuvvkm1baslrect3  = new SampleClass(4, 8, 15);
        $V1oyf3k5iuiw = new SplObjectStorage;
        $V1oyf3k5iuiw->attach($Vuvvkm1baslrect1);
        $Vzo32zv0tioc = new SplObjectStorage;
        $Vzo32zv0tioc->attach($Vuvvkm1baslrect3); 

        
        
        $Vpu3xl4uhgg5 = dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'foo.xml';

        return array(
            
            array('a', 'b'),
            array('a', 'A'),
            
            array('9E6666666','9E7777777'),
            
            array(1, 2),
            array(2, 1),
            
            array(2.3, 4.2),
            array(2.3, 4.2, 0.5),
            array(array(2.3), array(4.2), 0.5),
            array(array(array(2.3)), array(array(4.2)), 0.5),
            array(new Struct(2.3), new Struct(4.2), 0.5),
            array(array(new Struct(2.3)), array(new Struct(4.2)), 0.5),
            
            array(NAN, NAN),
            
            array(array(), array(0 => 1)),
            array(array(0          => 1), array()),
            array(array(0          => null), array()),
            array(array(0          => 1, 1 => 2), array(0          => 1, 1 => 3)),
            array(array('a', 'b' => array(1, 2)), array('a', 'b' => array(2, 1))),
            
            array(new SampleClass(4, 8, 15), new SampleClass(16, 23, 42)),
            array($Vuvvkm1baslrect1, $Vuvvkm1baslrect2),
            array($Vglk1nbl1t2oook1, $Vglk1nbl1t2oook2),
            array($Vglk1nbl1t2oook3, $Vglk1nbl1t2oook4), 
            
            array(fopen($Vpu3xl4uhgg5, 'r'), fopen($Vpu3xl4uhgg5, 'r')),
            
            array($V1oyf3k5iuiw, $Vzo32zv0tioc),
            
            array(
                PHPUnit_Util_XML::load('<root></root>'),
                PHPUnit_Util_XML::load('<bar/>'),
            ),
            array(
                PHPUnit_Util_XML::load('<foo attr1="bar"/>'),
                PHPUnit_Util_XML::load('<foo attr1="foobar"/>'),
            ),
            array(
                PHPUnit_Util_XML::load('<foo> bar </foo>'),
                PHPUnit_Util_XML::load('<foo />'),
            ),
            array(
                PHPUnit_Util_XML::load('<foo xmlns="urn:myns:bar"/>'),
                PHPUnit_Util_XML::load('<foo xmlns="urn:notmyns:bar"/>'),
            ),
            array(
                PHPUnit_Util_XML::load('<foo> bar </foo>'),
                PHPUnit_Util_XML::load('<foo> bir </foo>'),
            ),
            array(
                new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York')),
                new DateTime('2013-03-29 03:13:35', new DateTimeZone('America/New_York')),
            ),
            array(
                new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York')),
                new DateTime('2013-03-29 03:13:35', new DateTimeZone('America/New_York')),
                3500
            ),
            array(
                new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York')),
                new DateTime('2013-03-29 05:13:35', new DateTimeZone('America/New_York')),
                3500
            ),
            array(
                new DateTime('2013-03-29', new DateTimeZone('America/New_York')),
                new DateTime('2013-03-30', new DateTimeZone('America/New_York')),
            ),
            array(
                new DateTime('2013-03-29', new DateTimeZone('America/New_York')),
                new DateTime('2013-03-30', new DateTimeZone('America/New_York')),
                43200
            ),
            array(
                new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York')),
                new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/Chicago')),
            ),
            array(
                new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York')),
                new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/Chicago')),
                3500
            ),
            array(
                new DateTime('2013-03-30', new DateTimeZone('America/New_York')),
                new DateTime('2013-03-30', new DateTimeZone('America/Chicago')),
            ),
            array(
                new DateTime('2013-03-29T05:13:35-0600'),
                new DateTime('2013-03-29T04:13:35-0600'),
            ),
            array(
                new DateTime('2013-03-29T05:13:35-0600'),
                new DateTime('2013-03-29T05:13:35-0500'),
            ),
            
            
            
            array(new SampleClass(4, 8, 15), false),
            array(false, new SampleClass(4, 8, 15)),
            array(array(0        => 1, 1 => 2), false),
            array(false, array(0 => 1, 1 => 2)),
            array(array(), new stdClass),
            array(new stdClass, array()),
            
            
            array(0, 'Foobar'),
            array('Foobar', 0),
            array(3, acos(8)),
            array(acos(8), 3)
        );
    }

    protected function equalValues()
    {
        
        $Vglk1nbl1t2oook1                  = new Book;
        $Vglk1nbl1t2oook1->author          = new Author('Terry Pratchett');
        $Vglk1nbl1t2oook1->author->books[] = $Vglk1nbl1t2oook1;
        $Vglk1nbl1t2oook2                  = new Book;
        $Vglk1nbl1t2oook2->author          = new Author('Terry Pratchett');
        $Vglk1nbl1t2oook2->author->books[] = $Vglk1nbl1t2oook2;

        $Vuvvkm1baslrect1  = new SampleClass(4, 8, 15);
        $Vuvvkm1baslrect2  = new SampleClass(4, 8, 15);
        $V1oyf3k5iuiw = new SplObjectStorage;
        $V1oyf3k5iuiw->attach($Vuvvkm1baslrect1);
        $Vzo32zv0tioc = new SplObjectStorage;
        $Vzo32zv0tioc->attach($Vuvvkm1baslrect1);

        return array(
            
            array('a', 'A', 0, false, true), 
            
            array(array('a' => 1, 'b' => 2), array('b' => 2, 'a' => 1)),
            array(array(1), array('1')),
            array(array(3, 2, 1), array(2, 3, 1), 0, true), 
            
            array(2.3, 2.5, 0.5),
            array(array(2.3), array(2.5), 0.5),
            array(array(array(2.3)), array(array(2.5)), 0.5),
            array(new Struct(2.3), new Struct(2.5), 0.5),
            array(array(new Struct(2.3)), array(new Struct(2.5)), 0.5),
            
            array(1, 2, 1),
            
            array($Vuvvkm1baslrect1, $Vuvvkm1baslrect2),
            array($Vglk1nbl1t2oook1, $Vglk1nbl1t2oook2),
            
            array($V1oyf3k5iuiw, $Vzo32zv0tioc),
            
            array(
                PHPUnit_Util_XML::load('<root></root>'),
                PHPUnit_Util_XML::load('<root/>'),
            ),
            array(
                PHPUnit_Util_XML::load('<root attr="bar"></root>'),
                PHPUnit_Util_XML::load('<root attr="bar"/>'),
            ),
            array(
                PHPUnit_Util_XML::load('<root><foo attr="bar"></foo></root>'),
                PHPUnit_Util_XML::load('<root><foo attr="bar"/></root>'),
            ),
            array(
                PHPUnit_Util_XML::load("<root>\n  <child/>\n</root>"),
                PHPUnit_Util_XML::load('<root><child/></root>'),
            ),
            array(
                new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York')),
                new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York')),
            ),
            array(
                new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York')),
                new DateTime('2013-03-29 04:13:25', new DateTimeZone('America/New_York')),
                10
            ),
            array(
                new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York')),
                new DateTime('2013-03-29 04:14:40', new DateTimeZone('America/New_York')),
                65
            ),
            array(
                new DateTime('2013-03-29', new DateTimeZone('America/New_York')),
                new DateTime('2013-03-29', new DateTimeZone('America/New_York')),
            ),
            array(
                new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York')),
                new DateTime('2013-03-29 03:13:35', new DateTimeZone('America/Chicago')),
            ),
            array(
                new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York')),
                new DateTime('2013-03-29 03:13:49', new DateTimeZone('America/Chicago')),
                15
            ),
            array(
                new DateTime('2013-03-30', new DateTimeZone('America/New_York')),
                new DateTime('2013-03-29 23:00:00', new DateTimeZone('America/Chicago')),
            ),
            array(
                new DateTime('2013-03-30', new DateTimeZone('America/New_York')),
                new DateTime('2013-03-29 23:01:30', new DateTimeZone('America/Chicago')),
                100
            ),
            array(
                new DateTime('@1364616000'),
                new DateTime('2013-03-29 23:00:00', new DateTimeZone('America/Chicago')),
            ),
            array(
                new DateTime('2013-03-29T05:13:35-0500'),
                new DateTime('2013-03-29T04:13:35-0600'),
            ),
            
            
            
            array(0, '0'),
            array('0', 0),
            array(2.3, '2.3'),
            array('2.3', 2.3),
            array((string) (1/3), 1 - 2/3),
            array(1/3, (string) (1 - 2/3)),
            array('string representation', new ClassWithToString),
            array(new ClassWithToString, 'string representation'),
        );
    }

    public function equalProvider()
    {
        
        return array_merge($this->equalValues(), $this->sameValues());
    }

    public function notEqualProvider()
    {
        return $this->notEqualValues();
    }

    public function sameProvider()
    {
        return $this->sameValues();
    }

    public function notSameProvider()
    {
        
        
        return array_merge($this->notEqualValues(), $this->equalValues());
    }

    
    public function testAssertEqualsSucceeds($Vmbzc5xgwrgo, $Vglk1nbl1t2o, $Vxo5kvys4l4m = 0.0, $Vibefsvmlpruanonicalize = false, $V2tcbx0tpkh3 = false)
    {
        $this->assertEquals($Vmbzc5xgwrgo, $Vglk1nbl1t2o, '', $Vxo5kvys4l4m, 10, $Vibefsvmlpruanonicalize, $V2tcbx0tpkh3);
    }

    
    public function testAssertEqualsFails($Vmbzc5xgwrgo, $Vglk1nbl1t2o, $Vxo5kvys4l4m = 0.0, $Vibefsvmlpruanonicalize = false, $V2tcbx0tpkh3 = false)
    {
        try {
            $this->assertEquals($Vmbzc5xgwrgo, $Vglk1nbl1t2o, '', $Vxo5kvys4l4m, 10, $Vibefsvmlpruanonicalize, $V2tcbx0tpkh3);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertNotEqualsSucceeds($Vmbzc5xgwrgo, $Vglk1nbl1t2o, $Vxo5kvys4l4m = 0.0, $Vibefsvmlpruanonicalize = false, $V2tcbx0tpkh3 = false)
    {
        $this->assertNotEquals($Vmbzc5xgwrgo, $Vglk1nbl1t2o, '', $Vxo5kvys4l4m, 10, $Vibefsvmlpruanonicalize, $V2tcbx0tpkh3);
    }

    
    public function testAssertNotEqualsFails($Vmbzc5xgwrgo, $Vglk1nbl1t2o, $Vxo5kvys4l4m = 0.0, $Vibefsvmlpruanonicalize = false, $V2tcbx0tpkh3 = false)
    {
        try {
            $this->assertNotEquals($Vmbzc5xgwrgo, $Vglk1nbl1t2o, '', $Vxo5kvys4l4m, 10, $Vibefsvmlpruanonicalize, $V2tcbx0tpkh3);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertSameSucceeds($Vmbzc5xgwrgo, $Vglk1nbl1t2o)
    {
        $this->assertSame($Vmbzc5xgwrgo, $Vglk1nbl1t2o);
    }

    
    public function testAssertSameFails($Vmbzc5xgwrgo, $Vglk1nbl1t2o)
    {
        try {
            $this->assertSame($Vmbzc5xgwrgo, $Vglk1nbl1t2o);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertNotSameSucceeds($Vmbzc5xgwrgo, $Vglk1nbl1t2o)
    {
        $this->assertNotSame($Vmbzc5xgwrgo, $Vglk1nbl1t2o);
    }

    
    public function testAssertNotSameFails($Vmbzc5xgwrgo, $Vglk1nbl1t2o)
    {
        try {
            $this->assertNotSame($Vmbzc5xgwrgo, $Vglk1nbl1t2o);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertXmlFileEqualsXmlFile()
    {
        $this->assertXmlFileEqualsXmlFile(
            $this->filesDirectory . 'foo.xml',
            $this->filesDirectory . 'foo.xml'
        );

        try {
            $this->assertXmlFileEqualsXmlFile(
                $this->filesDirectory . 'foo.xml',
                $this->filesDirectory . 'bar.xml'
            );
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertXmlFileNotEqualsXmlFile()
    {
        $this->assertXmlFileNotEqualsXmlFile(
            $this->filesDirectory . 'foo.xml',
            $this->filesDirectory . 'bar.xml'
        );

        try {
            $this->assertXmlFileNotEqualsXmlFile(
                $this->filesDirectory . 'foo.xml',
                $this->filesDirectory . 'foo.xml'
            );
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertXmlStringEqualsXmlFile()
    {
        $this->assertXmlStringEqualsXmlFile(
            $this->filesDirectory . 'foo.xml',
            file_get_contents($this->filesDirectory . 'foo.xml')
        );

        try {
            $this->assertXmlStringEqualsXmlFile(
                $this->filesDirectory . 'foo.xml',
                file_get_contents($this->filesDirectory . 'bar.xml')
            );
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testXmlStringNotEqualsXmlFile()
    {
        $this->assertXmlStringNotEqualsXmlFile(
            $this->filesDirectory . 'foo.xml',
            file_get_contents($this->filesDirectory . 'bar.xml')
        );

        try {
            $this->assertXmlStringNotEqualsXmlFile(
                $this->filesDirectory . 'foo.xml',
                file_get_contents($this->filesDirectory . 'foo.xml')
            );
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertXmlStringEqualsXmlString()
    {
        $this->assertXmlStringEqualsXmlString('<root/>', '<root/>');

        try {
            $this->assertXmlStringEqualsXmlString('<foo/>', '<bar/>');
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertXmlStringEqualsXmlString2()
    {
        $this->assertXmlStringEqualsXmlString('<a></b>', '<c></d>');
    }

    
    public function testAssertXmlStringEqualsXmlString3()
    {
        $Vpt32vvhspnvxpected = <<<XML
<?xml version="1.0"?>
<root>
    <node />
</root>
XML;

        $Vmbzc5xgwrgoctual = <<<XML
<?xml version="1.0"?>
<root>
<node />
</root>
XML;

        $this->assertXmlStringEqualsXmlString($Vpt32vvhspnvxpected, $Vmbzc5xgwrgoctual);
    }

    
    public function testAssertXmlStringNotEqualsXmlString()
    {
        $this->assertXmlStringNotEqualsXmlString('<foo/>', '<bar/>');

        try {
            $this->assertXmlStringNotEqualsXmlString('<root/>', '<root/>');
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testXMLStructureIsSame()
    {
        $Vpt32vvhspnvxpected = new DOMDocument;
        $Vpt32vvhspnvxpected->load($this->filesDirectory . 'structureExpected.xml');

        $Vmbzc5xgwrgoctual = new DOMDocument;
        $Vmbzc5xgwrgoctual->load($this->filesDirectory . 'structureExpected.xml');

        $this->assertEqualXMLStructure(
            $Vpt32vvhspnvxpected->firstChild, $Vmbzc5xgwrgoctual->firstChild, true
        );
    }

    
    public function testXMLStructureWrongNumberOfAttributes()
    {
        $Vpt32vvhspnvxpected = new DOMDocument;
        $Vpt32vvhspnvxpected->load($this->filesDirectory . 'structureExpected.xml');

        $Vmbzc5xgwrgoctual = new DOMDocument;
        $Vmbzc5xgwrgoctual->load($this->filesDirectory . 'structureWrongNumberOfAttributes.xml');

        $this->assertEqualXMLStructure(
            $Vpt32vvhspnvxpected->firstChild, $Vmbzc5xgwrgoctual->firstChild, true
        );
    }

    
    public function testXMLStructureWrongNumberOfNodes()
    {
        $Vpt32vvhspnvxpected = new DOMDocument;
        $Vpt32vvhspnvxpected->load($this->filesDirectory . 'structureExpected.xml');

        $Vmbzc5xgwrgoctual = new DOMDocument;
        $Vmbzc5xgwrgoctual->load($this->filesDirectory . 'structureWrongNumberOfNodes.xml');

        $this->assertEqualXMLStructure(
            $Vpt32vvhspnvxpected->firstChild, $Vmbzc5xgwrgoctual->firstChild, true
        );
    }

    
    public function testXMLStructureIsSameButDataIsNot()
    {
        $Vpt32vvhspnvxpected = new DOMDocument;
        $Vpt32vvhspnvxpected->load($this->filesDirectory . 'structureExpected.xml');

        $Vmbzc5xgwrgoctual = new DOMDocument;
        $Vmbzc5xgwrgoctual->load($this->filesDirectory . 'structureIsSameButDataIsNot.xml');

        $this->assertEqualXMLStructure(
            $Vpt32vvhspnvxpected->firstChild, $Vmbzc5xgwrgoctual->firstChild, true
        );
    }

    
    public function testXMLStructureAttributesAreSameButValuesAreNot()
    {
        $Vpt32vvhspnvxpected = new DOMDocument;
        $Vpt32vvhspnvxpected->load($this->filesDirectory . 'structureExpected.xml');

        $Vmbzc5xgwrgoctual = new DOMDocument;
        $Vmbzc5xgwrgoctual->load($this->filesDirectory . 'structureAttributesAreSameButValuesAreNot.xml');

        $this->assertEqualXMLStructure(
            $Vpt32vvhspnvxpected->firstChild, $Vmbzc5xgwrgoctual->firstChild, true
        );
    }

    
    public function testXMLStructureIgnoreTextNodes()
    {
        $Vpt32vvhspnvxpected = new DOMDocument;
        $Vpt32vvhspnvxpected->load($this->filesDirectory . 'structureExpected.xml');

        $Vmbzc5xgwrgoctual = new DOMDocument;
        $Vmbzc5xgwrgoctual->load($this->filesDirectory . 'structureIgnoreTextNodes.xml');

        $this->assertEqualXMLStructure(
            $Vpt32vvhspnvxpected->firstChild, $Vmbzc5xgwrgoctual->firstChild, true
        );
    }

    
    public function testAssertStringEqualsNumeric()
    {
        $this->assertEquals('0', 0);

        try {
            $this->assertEquals('0', 1);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertStringEqualsNumeric2()
    {
        $this->assertNotEquals('A', 0);
    }

    
    public function testAssertFileExistsThrowsException()
    {
        $this->assertFileExists(null);
    }

    
    public function testAssertFileExists()
    {
        $this->assertFileExists(__FILE__);

        try {
            $this->assertFileExists(__DIR__ . DIRECTORY_SEPARATOR . 'NotExisting');
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertFileNotExistsThrowsException()
    {
        $this->assertFileNotExists(null);
    }

    
    public function testAssertFileNotExists()
    {
        $this->assertFileNotExists(__DIR__ . DIRECTORY_SEPARATOR . 'NotExisting');

        try {
            $this->assertFileNotExists(__FILE__);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertObjectHasAttribute()
    {
        $Vgcvauwd5u5t = new Author('Terry Pratchett');

        $this->assertObjectHasAttribute('name', $Vgcvauwd5u5t);

        try {
            $this->assertObjectHasAttribute('foo', $Vgcvauwd5u5t);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertObjectNotHasAttribute()
    {
        $Vgcvauwd5u5t = new Author('Terry Pratchett');

        $this->assertObjectNotHasAttribute('foo', $Vgcvauwd5u5t);

        try {
            $this->assertObjectNotHasAttribute('name', $Vgcvauwd5u5t);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertNull()
    {
        $this->assertNull(null);

        try {
            $this->assertNull(new stdClass);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertNotNull()
    {
        $this->assertNotNull(new stdClass);

        try {
            $this->assertNotNull(null);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertTrue()
    {
        $this->assertTrue(true);

        try {
            $this->assertTrue(false);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertNotTrue()
    {
        $this->assertNotTrue(false);
        $this->assertNotTrue(1);
        $this->assertNotTrue('true');

        try {
            $this->assertNotTrue(true);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertFalse()
    {
        $this->assertFalse(false);

        try {
            $this->assertFalse(true);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertNotFalse()
    {
        $this->assertNotFalse(true);
        $this->assertNotFalse(0);
        $this->assertNotFalse('');

        try {
            $this->assertNotFalse(false);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertRegExpThrowsException()
    {
        $this->assertRegExp(null, null);
    }

    
    public function testAssertRegExpThrowsException2()
    {
        $this->assertRegExp('', null);
    }

    
    public function testAssertNotRegExpThrowsException()
    {
        $this->assertNotRegExp(null, null);
    }

    
    public function testAssertNotRegExpThrowsException2()
    {
        $this->assertNotRegExp('', null);
    }

    
    public function testAssertRegExp()
    {
        $this->assertRegExp('/foo/', 'foobar');

        try {
            $this->assertRegExp('/foo/', 'bar');
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertNotRegExp()
    {
        $this->assertNotRegExp('/foo/', 'bar');

        try {
            $this->assertNotRegExp('/foo/', 'foobar');
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertSame()
    {
        $Vgcvauwd5u5t = new stdClass;

        $this->assertSame($Vgcvauwd5u5t, $Vgcvauwd5u5t);

        try {
            $this->assertSame(
                new stdClass,
                new stdClass
            );
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertSame2()
    {
        $this->assertSame(true, true);
        $this->assertSame(false, false);

        try {
            $this->assertSame(true, false);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertNotSame()
    {
        $this->assertNotSame(
            new stdClass,
            null
        );

        $this->assertNotSame(
            null,
            new stdClass
        );

        $this->assertNotSame(
            new stdClass,
            new stdClass
        );

        $Vgcvauwd5u5t = new stdClass;

        try {
            $this->assertNotSame($Vgcvauwd5u5t, $Vgcvauwd5u5t);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertNotSame2()
    {
        $this->assertNotSame(true, false);
        $this->assertNotSame(false, true);

        try {
            $this->assertNotSame(true, true);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertNotSameFailsNull()
    {
        try {
            $this->assertNotSame(null, null);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testGreaterThan()
    {
        $this->assertGreaterThan(1, 2);

        try {
            $this->assertGreaterThan(2, 1);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAttributeGreaterThan()
    {
        $this->assertAttributeGreaterThan(
            1, 'bar', new ClassWithNonPublicAttributes
        );

        try {
            $this->assertAttributeGreaterThan(
                1, 'foo', new ClassWithNonPublicAttributes
            );
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testGreaterThanOrEqual()
    {
        $this->assertGreaterThanOrEqual(1, 2);

        try {
            $this->assertGreaterThanOrEqual(2, 1);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAttributeGreaterThanOrEqual()
    {
        $this->assertAttributeGreaterThanOrEqual(
            1, 'bar', new ClassWithNonPublicAttributes
        );

        try {
            $this->assertAttributeGreaterThanOrEqual(
                2, 'foo', new ClassWithNonPublicAttributes
            );
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testLessThan()
    {
        $this->assertLessThan(2, 1);

        try {
            $this->assertLessThan(1, 2);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAttributeLessThan()
    {
        $this->assertAttributeLessThan(
            2, 'foo', new ClassWithNonPublicAttributes
        );

        try {
            $this->assertAttributeLessThan(
                1, 'bar', new ClassWithNonPublicAttributes
            );
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testLessThanOrEqual()
    {
        $this->assertLessThanOrEqual(2, 1);

        try {
            $this->assertLessThanOrEqual(1, 2);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAttributeLessThanOrEqual()
    {
        $this->assertAttributeLessThanOrEqual(
            2, 'foo', new ClassWithNonPublicAttributes
        );

        try {
            $this->assertAttributeLessThanOrEqual(
                1, 'bar', new ClassWithNonPublicAttributes
            );
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testReadAttribute()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertEquals('foo', $this->readAttribute($Vuvvkm1baslr, 'publicAttribute'));
        $this->assertEquals('bar', $this->readAttribute($Vuvvkm1baslr, 'protectedAttribute'));
        $this->assertEquals('baz', $this->readAttribute($Vuvvkm1baslr, 'privateAttribute'));
        $this->assertEquals('bar', $this->readAttribute($Vuvvkm1baslr, 'protectedParentAttribute'));
        
    }

    
    public function testReadAttribute2()
    {
        $this->assertEquals('foo', $this->readAttribute('ClassWithNonPublicAttributes', 'publicStaticAttribute'));
        $this->assertEquals('bar', $this->readAttribute('ClassWithNonPublicAttributes', 'protectedStaticAttribute'));
        $this->assertEquals('baz', $this->readAttribute('ClassWithNonPublicAttributes', 'privateStaticAttribute'));
        $this->assertEquals('foo', $this->readAttribute('ClassWithNonPublicAttributes', 'protectedStaticParentAttribute'));
        $this->assertEquals('foo', $this->readAttribute('ClassWithNonPublicAttributes', 'privateStaticParentAttribute'));
    }

    
    public function testReadAttribute3()
    {
        $this->readAttribute('StdClass', null);
    }

    
    public function testReadAttribute4()
    {
        $this->readAttribute('NotExistingClass', 'foo');
    }

    
    public function testReadAttribute5()
    {
        $this->readAttribute(null, 'foo');
    }

    
    public function testReadAttributeIfAttributeNameIsNotValid()
    {
        $this->readAttribute('StdClass', '2');
    }

    
    public function testGetStaticAttributeRaisesExceptionForInvalidFirstArgument()
    {
        $this->getStaticAttribute(null, 'foo');
    }

    
    public function testGetStaticAttributeRaisesExceptionForInvalidFirstArgument2()
    {
        $this->getStaticAttribute('NotExistingClass', 'foo');
    }

    
    public function testGetStaticAttributeRaisesExceptionForInvalidSecondArgument()
    {
        $this->getStaticAttribute('stdClass', null);
    }

    
    public function testGetStaticAttributeRaisesExceptionForInvalidSecondArgument2()
    {
        $this->getStaticAttribute('stdClass', '0');
    }

    
    public function testGetStaticAttributeRaisesExceptionForInvalidSecondArgument3()
    {
        $this->getStaticAttribute('stdClass', 'foo');
    }

    
    public function testGetObjectAttributeRaisesExceptionForInvalidFirstArgument()
    {
        $this->getObjectAttribute(null, 'foo');
    }

    
    public function testGetObjectAttributeRaisesExceptionForInvalidSecondArgument()
    {
        $this->getObjectAttribute(new stdClass, null);
    }

    
    public function testGetObjectAttributeRaisesExceptionForInvalidSecondArgument2()
    {
        $this->getObjectAttribute(new stdClass, '0');
    }

    
    public function testGetObjectAttributeRaisesExceptionForInvalidSecondArgument3()
    {
        $this->getObjectAttribute(new stdClass, 'foo');
    }

    
    public function testGetObjectAttributeWorksForInheritedAttributes()
    {
        $this->assertEquals(
            'bar',
            $this->getObjectAttribute(new ClassWithNonPublicAttributes, 'privateParentAttribute')
        );
    }

    
    public function testAssertPublicAttributeContains()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertAttributeContains('foo', 'publicArray', $Vuvvkm1baslr);

        try {
            $this->assertAttributeContains('bar', 'publicArray', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertPublicAttributeContainsOnly()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertAttributeContainsOnly('string', 'publicArray', $Vuvvkm1baslr);

        try {
            $this->assertAttributeContainsOnly('integer', 'publicArray', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertPublicAttributeNotContains()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertAttributeNotContains('bar', 'publicArray', $Vuvvkm1baslr);

        try {
            $this->assertAttributeNotContains('foo', 'publicArray', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertPublicAttributeNotContainsOnly()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertAttributeNotContainsOnly('integer', 'publicArray', $Vuvvkm1baslr);

        try {
            $this->assertAttributeNotContainsOnly('string', 'publicArray', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertProtectedAttributeContains()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertAttributeContains('bar', 'protectedArray', $Vuvvkm1baslr);

        try {
            $this->assertAttributeContains('foo', 'protectedArray', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertProtectedAttributeNotContains()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertAttributeNotContains('foo', 'protectedArray', $Vuvvkm1baslr);

        try {
            $this->assertAttributeNotContains('bar', 'protectedArray', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertPrivateAttributeContains()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertAttributeContains('baz', 'privateArray', $Vuvvkm1baslr);

        try {
            $this->assertAttributeContains('foo', 'privateArray', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertPrivateAttributeNotContains()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertAttributeNotContains('foo', 'privateArray', $Vuvvkm1baslr);

        try {
            $this->assertAttributeNotContains('baz', 'privateArray', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertAttributeContainsNonObject()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertAttributeContains(true, 'privateArray', $Vuvvkm1baslr);

        try {
            $this->assertAttributeContains(true, 'privateArray', $Vuvvkm1baslr, '', false, true, true);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertAttributeNotContainsNonObject()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertAttributeNotContains(true, 'privateArray', $Vuvvkm1baslr, '', false, true, true);

        try {
            $this->assertAttributeNotContains(true, 'privateArray', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertPublicAttributeEquals()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertAttributeEquals('foo', 'publicAttribute', $Vuvvkm1baslr);

        try {
            $this->assertAttributeEquals('bar', 'publicAttribute', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertPublicAttributeNotEquals()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertAttributeNotEquals('bar', 'publicAttribute', $Vuvvkm1baslr);

        try {
            $this->assertAttributeNotEquals('foo', 'publicAttribute', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertPublicAttributeSame()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertAttributeSame('foo', 'publicAttribute', $Vuvvkm1baslr);

        try {
            $this->assertAttributeSame('bar', 'publicAttribute', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertPublicAttributeNotSame()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertAttributeNotSame('bar', 'publicAttribute', $Vuvvkm1baslr);

        try {
            $this->assertAttributeNotSame('foo', 'publicAttribute', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertProtectedAttributeEquals()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertAttributeEquals('bar', 'protectedAttribute', $Vuvvkm1baslr);

        try {
            $this->assertAttributeEquals('foo', 'protectedAttribute', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertProtectedAttributeNotEquals()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertAttributeNotEquals('foo', 'protectedAttribute', $Vuvvkm1baslr);

        try {
            $this->assertAttributeNotEquals('bar', 'protectedAttribute', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertPrivateAttributeEquals()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertAttributeEquals('baz', 'privateAttribute', $Vuvvkm1baslr);

        try {
            $this->assertAttributeEquals('foo', 'privateAttribute', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertPrivateAttributeNotEquals()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertAttributeNotEquals('foo', 'privateAttribute', $Vuvvkm1baslr);

        try {
            $this->assertAttributeNotEquals('baz', 'privateAttribute', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertPublicStaticAttributeEquals()
    {
        $this->assertAttributeEquals('foo', 'publicStaticAttribute', 'ClassWithNonPublicAttributes');

        try {
            $this->assertAttributeEquals('bar', 'publicStaticAttribute', 'ClassWithNonPublicAttributes');
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertPublicStaticAttributeNotEquals()
    {
        $this->assertAttributeNotEquals('bar', 'publicStaticAttribute', 'ClassWithNonPublicAttributes');

        try {
            $this->assertAttributeNotEquals('foo', 'publicStaticAttribute', 'ClassWithNonPublicAttributes');
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertProtectedStaticAttributeEquals()
    {
        $this->assertAttributeEquals('bar', 'protectedStaticAttribute', 'ClassWithNonPublicAttributes');

        try {
            $this->assertAttributeEquals('foo', 'protectedStaticAttribute', 'ClassWithNonPublicAttributes');
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertProtectedStaticAttributeNotEquals()
    {
        $this->assertAttributeNotEquals('foo', 'protectedStaticAttribute', 'ClassWithNonPublicAttributes');

        try {
            $this->assertAttributeNotEquals('bar', 'protectedStaticAttribute', 'ClassWithNonPublicAttributes');
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertPrivateStaticAttributeEquals()
    {
        $this->assertAttributeEquals('baz', 'privateStaticAttribute', 'ClassWithNonPublicAttributes');

        try {
            $this->assertAttributeEquals('foo', 'privateStaticAttribute', 'ClassWithNonPublicAttributes');
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertPrivateStaticAttributeNotEquals()
    {
        $this->assertAttributeNotEquals('foo', 'privateStaticAttribute', 'ClassWithNonPublicAttributes');

        try {
            $this->assertAttributeNotEquals('baz', 'privateStaticAttribute', 'ClassWithNonPublicAttributes');
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertClassHasAttributeThrowsException()
    {
        $this->assertClassHasAttribute(null, null);
    }

    
    public function testAssertClassHasAttributeThrowsException2()
    {
        $this->assertClassHasAttribute('foo', null);
    }

    
    public function testAssertClassHasAttributeThrowsExceptionIfAttributeNameIsNotValid()
    {
        $this->assertClassHasAttribute('1', 'ClassWithNonPublicAttributes');
    }

    
    public function testAssertClassNotHasAttributeThrowsException()
    {
        $this->assertClassNotHasAttribute(null, null);
    }

    
    public function testAssertClassNotHasAttributeThrowsException2()
    {
        $this->assertClassNotHasAttribute('foo', null);
    }

    
    public function testAssertClassNotHasAttributeThrowsExceptionIfAttributeNameIsNotValid()
    {
        $this->assertClassNotHasAttribute('1', 'ClassWithNonPublicAttributes');
    }

    
    public function testAssertClassHasStaticAttributeThrowsException()
    {
        $this->assertClassHasStaticAttribute(null, null);
    }

    
    public function testAssertClassHasStaticAttributeThrowsException2()
    {
        $this->assertClassHasStaticAttribute('foo', null);
    }

    
    public function testAssertClassHasStaticAttributeThrowsExceptionIfAttributeNameIsNotValid()
    {
        $this->assertClassHasStaticAttribute('1', 'ClassWithNonPublicAttributes');
    }

    
    public function testAssertClassNotHasStaticAttributeThrowsException()
    {
        $this->assertClassNotHasStaticAttribute(null, null);
    }

    
    public function testAssertClassNotHasStaticAttributeThrowsException2()
    {
        $this->assertClassNotHasStaticAttribute('foo', null);
    }

    
    public function testAssertClassNotHasStaticAttributeThrowsExceptionIfAttributeNameIsNotValid()
    {
        $this->assertClassNotHasStaticAttribute('1', 'ClassWithNonPublicAttributes');
    }

    
    public function testAssertObjectHasAttributeThrowsException()
    {
        $this->assertObjectHasAttribute(null, null);
    }

    
    public function testAssertObjectHasAttributeThrowsException2()
    {
        $this->assertObjectHasAttribute('foo', null);
    }

    
    public function testAssertObjectHasAttributeThrowsExceptionIfAttributeNameIsNotValid()
    {
        $this->assertObjectHasAttribute('1', 'ClassWithNonPublicAttributes');
    }

    
    public function testAssertObjectNotHasAttributeThrowsException()
    {
        $this->assertObjectNotHasAttribute(null, null);
    }

    
    public function testAssertObjectNotHasAttributeThrowsException2()
    {
        $this->assertObjectNotHasAttribute('foo', null);
    }

    
    public function testAssertObjectNotHasAttributeThrowsExceptionIfAttributeNameIsNotValid()
    {
        $this->assertObjectNotHasAttribute('1', 'ClassWithNonPublicAttributes');
    }

    
    public function testClassHasPublicAttribute()
    {
        $this->assertClassHasAttribute('publicAttribute', 'ClassWithNonPublicAttributes');

        try {
            $this->assertClassHasAttribute('attribute', 'ClassWithNonPublicAttributes');
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testClassNotHasPublicAttribute()
    {
        $this->assertClassNotHasAttribute('attribute', 'ClassWithNonPublicAttributes');

        try {
            $this->assertClassNotHasAttribute('publicAttribute', 'ClassWithNonPublicAttributes');
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testClassHasPublicStaticAttribute()
    {
        $this->assertClassHasStaticAttribute('publicStaticAttribute', 'ClassWithNonPublicAttributes');

        try {
            $this->assertClassHasStaticAttribute('attribute', 'ClassWithNonPublicAttributes');
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testClassNotHasPublicStaticAttribute()
    {
        $this->assertClassNotHasStaticAttribute('attribute', 'ClassWithNonPublicAttributes');

        try {
            $this->assertClassNotHasStaticAttribute('publicStaticAttribute', 'ClassWithNonPublicAttributes');
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testObjectHasPublicAttribute()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertObjectHasAttribute('publicAttribute', $Vuvvkm1baslr);

        try {
            $this->assertObjectHasAttribute('attribute', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testObjectNotHasPublicAttribute()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertObjectNotHasAttribute('attribute', $Vuvvkm1baslr);

        try {
            $this->assertObjectNotHasAttribute('publicAttribute', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testObjectHasOnTheFlyAttribute()
    {
        $Vuvvkm1baslr      = new stdClass;
        $Vuvvkm1baslr->foo = 'bar';

        $this->assertObjectHasAttribute('foo', $Vuvvkm1baslr);

        try {
            $this->assertObjectHasAttribute('bar', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testObjectNotHasOnTheFlyAttribute()
    {
        $Vuvvkm1baslr      = new stdClass;
        $Vuvvkm1baslr->foo = 'bar';

        $this->assertObjectNotHasAttribute('bar', $Vuvvkm1baslr);

        try {
            $this->assertObjectNotHasAttribute('foo', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testObjectHasProtectedAttribute()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertObjectHasAttribute('protectedAttribute', $Vuvvkm1baslr);

        try {
            $this->assertObjectHasAttribute('attribute', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testObjectNotHasProtectedAttribute()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertObjectNotHasAttribute('attribute', $Vuvvkm1baslr);

        try {
            $this->assertObjectNotHasAttribute('protectedAttribute', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testObjectHasPrivateAttribute()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertObjectHasAttribute('privateAttribute', $Vuvvkm1baslr);

        try {
            $this->assertObjectHasAttribute('attribute', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testObjectNotHasPrivateAttribute()
    {
        $Vuvvkm1baslr = new ClassWithNonPublicAttributes;

        $this->assertObjectNotHasAttribute('attribute', $Vuvvkm1baslr);

        try {
            $this->assertObjectNotHasAttribute('privateAttribute', $Vuvvkm1baslr);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertThatAttributeEquals()
    {
        $this->assertThat(
            new ClassWithNonPublicAttributes,
            $this->attribute(
                $this->equalTo('foo'),
                'publicAttribute'
            )
        );
    }

    
    public function testAssertThatAttributeEquals2()
    {
        $this->assertThat(
            new ClassWithNonPublicAttributes,
            $this->attribute(
                $this->equalTo('bar'),
                'publicAttribute'
            )
        );
    }

    
    public function testAssertThatAttributeEqualTo()
    {
        $this->assertThat(
            new ClassWithNonPublicAttributes,
            $this->attributeEqualTo('publicAttribute', 'foo')
        );
    }

    
    public function testAssertThatAnything()
    {
        $this->assertThat('anything', $this->anything());
    }

    
    public function testAssertThatIsTrue()
    {
        $this->assertThat(true, $this->isTrue());
    }

    
    public function testAssertThatIsFalse()
    {
        $this->assertThat(false, $this->isFalse());
    }

    
    public function testAssertThatIsJson()
    {
        $this->assertThat('{}', $this->isJson());
    }

    
    public function testAssertThatAnythingAndAnything()
    {
        $this->assertThat(
            'anything',
            $this->logicalAnd(
                $this->anything(), $this->anything()
            )
        );
    }

    
    public function testAssertThatAnythingOrAnything()
    {
        $this->assertThat(
            'anything',
            $this->logicalOr(
                $this->anything(), $this->anything()
            )
        );
    }

    
    public function testAssertThatAnythingXorNotAnything()
    {
        $this->assertThat(
            'anything',
            $this->logicalXor(
                $this->anything(),
                $this->logicalNot($this->anything())
            )
        );
    }

    
    public function testAssertThatContains()
    {
        $this->assertThat(array('foo'), $this->contains('foo'));
    }

    
    public function testAssertThatStringContains()
    {
        $this->assertThat('barfoobar', $this->stringContains('foo'));
    }

    
    public function testAssertThatContainsOnly()
    {
        $this->assertThat(array('foo'), $this->containsOnly('string'));
    }
    
    public function testAssertThatContainsOnlyInstancesOf()
    {
        $this->assertThat(array(new Book), $this->containsOnlyInstancesOf('Book'));
    }

    
    public function testAssertThatArrayHasKey()
    {
        $this->assertThat(array('foo' => 'bar'), $this->arrayHasKey('foo'));
    }

    
    public function testAssertThatClassHasAttribute()
    {
        $this->assertThat(
            new ClassWithNonPublicAttributes,
            $this->classHasAttribute('publicAttribute')
        );
    }

    
    public function testAssertThatClassHasStaticAttribute()
    {
        $this->assertThat(
            new ClassWithNonPublicAttributes,
            $this->classHasStaticAttribute('publicStaticAttribute')
        );
    }

    
    public function testAssertThatObjectHasAttribute()
    {
        $this->assertThat(
            new ClassWithNonPublicAttributes,
            $this->objectHasAttribute('publicAttribute')
        );
    }

    
    public function testAssertThatEqualTo()
    {
        $this->assertThat('foo', $this->equalTo('foo'));
    }

    
    public function testAssertThatIdenticalTo()
    {
        $Vcptarsq5qe4      = new stdClass;
        $Vibefsvmlpruonstraint = $this->identicalTo($Vcptarsq5qe4);

        $this->assertThat($Vcptarsq5qe4, $Vibefsvmlpruonstraint);
    }

    
    public function testAssertThatIsInstanceOf()
    {
        $this->assertThat(new stdClass, $this->isInstanceOf('StdClass'));
    }

    
    public function testAssertThatIsType()
    {
        $this->assertThat('string', $this->isType('string'));
    }

    
    public function testAssertThatIsEmpty()
    {
        $this->assertThat(array(), $this->isEmpty());
    }

    
    public function testAssertThatFileExists()
    {
        $this->assertThat(__FILE__, $this->fileExists());
    }

    
    public function testAssertThatGreaterThan()
    {
        $this->assertThat(2, $this->greaterThan(1));
    }

    
    public function testAssertThatGreaterThanOrEqual()
    {
        $this->assertThat(2, $this->greaterThanOrEqual(1));
    }

    
    public function testAssertThatLessThan()
    {
        $this->assertThat(1, $this->lessThan(2));
    }

    
    public function testAssertThatLessThanOrEqual()
    {
        $this->assertThat(1, $this->lessThanOrEqual(2));
    }

    
    public function testAssertThatMatchesRegularExpression()
    {
        $this->assertThat('foobar', $this->matchesRegularExpression('/foo/'));
    }

    
    public function testAssertThatCallback()
    {
        $this->assertThat(
            null,
            $this->callback(function ($Vgcvauwd5u5tther) { return true; })
        );
    }

    
    public function testAssertThatCountOf()
    {
        $this->assertThat(array(1), $this->countOf(1));
    }

    
    public function testAssertFileEquals()
    {
        $this->assertFileEquals(
            $this->filesDirectory . 'foo.xml',
            $this->filesDirectory . 'foo.xml'
        );

        try {
            $this->assertFileEquals(
                $this->filesDirectory . 'foo.xml',
                $this->filesDirectory . 'bar.xml'
            );
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertFileNotEquals()
    {
        $this->assertFileNotEquals(
            $this->filesDirectory . 'foo.xml',
            $this->filesDirectory . 'bar.xml'
        );

        try {
            $this->assertFileNotEquals(
                $this->filesDirectory . 'foo.xml',
                $this->filesDirectory . 'foo.xml'
            );
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertStringEqualsFile()
    {
        $this->assertStringEqualsFile(
            $this->filesDirectory . 'foo.xml',
            file_get_contents($this->filesDirectory . 'foo.xml')
        );

        try {
            $this->assertStringEqualsFile(
                $this->filesDirectory . 'foo.xml',
                file_get_contents($this->filesDirectory . 'bar.xml')
            );
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertStringNotEqualsFile()
    {
        $this->assertStringNotEqualsFile(
            $this->filesDirectory . 'foo.xml',
            file_get_contents($this->filesDirectory . 'bar.xml')
        );

        try {
            $this->assertStringNotEqualsFile(
                $this->filesDirectory . 'foo.xml',
                file_get_contents($this->filesDirectory . 'foo.xml')
            );
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertStringStartsWithThrowsException()
    {
        $this->assertStringStartsWith(null, null);
    }

    
    public function testAssertStringStartsWithThrowsException2()
    {
        $this->assertStringStartsWith('', null);
    }

    
    public function testAssertStringStartsNotWithThrowsException()
    {
        $this->assertStringStartsNotWith(null, null);
    }

    
    public function testAssertStringStartsNotWithThrowsException2()
    {
        $this->assertStringStartsNotWith('', null);
    }

    
    public function testAssertStringEndsWithThrowsException()
    {
        $this->assertStringEndsWith(null, null);
    }

    
    public function testAssertStringEndsWithThrowsException2()
    {
        $this->assertStringEndsWith('', null);
    }

    
    public function testAssertStringEndsNotWithThrowsException()
    {
        $this->assertStringEndsNotWith(null, null);
    }

    
    public function testAssertStringEndsNotWithThrowsException2()
    {
        $this->assertStringEndsNotWith('', null);
    }

    
    public function testAssertStringStartsWith()
    {
        $this->assertStringStartsWith('prefix', 'prefixfoo');

        try {
            $this->assertStringStartsWith('prefix', 'foo');
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertStringStartsNotWith()
    {
        $this->assertStringStartsNotWith('prefix', 'foo');

        try {
            $this->assertStringStartsNotWith('prefix', 'prefixfoo');
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertStringEndsWith()
    {
        $this->assertStringEndsWith('suffix', 'foosuffix');

        try {
            $this->assertStringEndsWith('suffix', 'foo');
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertStringEndsNotWith()
    {
        $this->assertStringEndsNotWith('suffix', 'foo');

        try {
            $this->assertStringEndsNotWith('suffix', 'foosuffix');
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertStringMatchesFormatRaisesExceptionForInvalidFirstArgument()
    {
        $this->assertStringMatchesFormat(null, '');
    }

    
    public function testAssertStringMatchesFormatRaisesExceptionForInvalidSecondArgument()
    {
        $this->assertStringMatchesFormat('', null);
    }

    
    public function testAssertStringMatchesFormat()
    {
        $this->assertStringMatchesFormat('*%s*', '***');
    }

    
    public function testAssertStringMatchesFormatFailure()
    {
        $this->assertStringMatchesFormat('*%s*', '**');
    }

    
    public function testAssertStringNotMatchesFormatRaisesExceptionForInvalidFirstArgument()
    {
        $this->assertStringNotMatchesFormat(null, '');
    }

    
    public function testAssertStringNotMatchesFormatRaisesExceptionForInvalidSecondArgument()
    {
        $this->assertStringNotMatchesFormat('', null);
    }

    
    public function testAssertStringNotMatchesFormat()
    {
        $this->assertStringNotMatchesFormat('*%s*', '**');

        try {
            $this->assertStringMatchesFormat('*%s*', '**');
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertEmpty()
    {
        $this->assertEmpty(array());

        try {
            $this->assertEmpty(array('foo'));
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertNotEmpty()
    {
        $this->assertNotEmpty(array('foo'));

        try {
            $this->assertNotEmpty(array());
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertAttributeEmpty()
    {
        $Vgcvauwd5u5t    = new stdClass;
        $Vgcvauwd5u5t->a = array();

        $this->assertAttributeEmpty('a', $Vgcvauwd5u5t);

        try {
            $Vgcvauwd5u5t->a = array('b');
            $this->assertAttributeEmpty('a', $Vgcvauwd5u5t);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertAttributeNotEmpty()
    {
        $Vgcvauwd5u5t    = new stdClass;
        $Vgcvauwd5u5t->a = array('b');

        $this->assertAttributeNotEmpty('a', $Vgcvauwd5u5t);

        try {
            $Vgcvauwd5u5t->a = array();
            $this->assertAttributeNotEmpty('a', $Vgcvauwd5u5t);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testMarkTestIncomplete()
    {
        try {
            $this->markTestIncomplete('incomplete');
        } catch (PHPUnit_Framework_IncompleteTestError $Vpt32vvhspnv) {
            $this->assertEquals('incomplete', $Vpt32vvhspnv->getMessage());

            return;
        }

        $this->fail();
    }

    
    public function testMarkTestSkipped()
    {
        try {
            $this->markTestSkipped('skipped');
        } catch (PHPUnit_Framework_SkippedTestError $Vpt32vvhspnv) {
            $this->assertEquals('skipped', $Vpt32vvhspnv->getMessage());

            return;
        }

        $this->fail();
    }

    
    public function testAssertCount()
    {
        $this->assertCount(2, array(1, 2));

        try {
            $this->assertCount(2, array(1, 2, 3));
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertCountTraversable()
    {
        $this->assertCount(2, new ArrayIterator(array(1, 2)));

        try {
            $this->assertCount(2, new ArrayIterator(array(1, 2, 3)));
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertCountThrowsExceptionIfExpectedCountIsNoInteger()
    {
        try {
            $this->assertCount('a', array());
        } catch (PHPUnit_Framework_Exception $Vpt32vvhspnv) {
            $this->assertEquals('Argument #1 (No Value) of PHPUnit_Framework_Assert::assertCount() must be a integer', $Vpt32vvhspnv->getMessage());

            return;
        }

        $this->fail();
    }

    
    public function testAssertCountThrowsExceptionIfElementIsNotCountable()
    {
        try {
            $this->assertCount(2, '');
        } catch (PHPUnit_Framework_Exception $Vpt32vvhspnv) {
            $this->assertEquals('Argument #2 (No Value) of PHPUnit_Framework_Assert::assertCount() must be a countable or traversable', $Vpt32vvhspnv->getMessage());

            return;
        }

        $this->fail();
    }

    
    public function testAssertAttributeCount()
    {
        $Vgcvauwd5u5t    = new stdClass;
        $Vgcvauwd5u5t->a = array();

        $this->assertAttributeCount(0, 'a', $Vgcvauwd5u5t);
    }

    
    public function testAssertNotCount()
    {
        $this->assertNotCount(2, array(1, 2, 3));

        try {
            $this->assertNotCount(2, array(1, 2));
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertNotCountThrowsExceptionIfExpectedCountIsNoInteger()
    {
        $this->assertNotCount('a', array());
    }

    
    public function testAssertNotCountThrowsExceptionIfElementIsNotCountable()
    {
        $this->assertNotCount(2, '');
    }

    
    public function testAssertAttributeNotCount()
    {
        $Vgcvauwd5u5t    = new stdClass;
        $Vgcvauwd5u5t->a = array();

        $this->assertAttributeNotCount(1, 'a', $Vgcvauwd5u5t);
    }

    
    public function testAssertSameSize()
    {
        $this->assertSameSize(array(1, 2), array(3, 4));

        try {
            $this->assertSameSize(array(1, 2), array(1, 2, 3));
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertSameSizeThrowsExceptionIfExpectedIsNotCountable()
    {
        try {
            $this->assertSameSize('a', array());
        } catch (PHPUnit_Framework_Exception $Vpt32vvhspnv) {
            $this->assertEquals('Argument #1 (No Value) of PHPUnit_Framework_Assert::assertSameSize() must be a countable or traversable', $Vpt32vvhspnv->getMessage());

            return;
        }

        $this->fail();
    }

    
    public function testAssertSameSizeThrowsExceptionIfActualIsNotCountable()
    {
        try {
            $this->assertSameSize(array(), '');
        } catch (PHPUnit_Framework_Exception $Vpt32vvhspnv) {
            $this->assertEquals('Argument #2 (No Value) of PHPUnit_Framework_Assert::assertSameSize() must be a countable or traversable', $Vpt32vvhspnv->getMessage());

            return;
        }

        $this->fail();
    }

    
    public function testAssertNotSameSize()
    {
        $this->assertNotSameSize(array(1, 2), array(1, 2, 3));

        try {
            $this->assertNotSameSize(array(1, 2), array(3, 4));
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertNotSameSizeThrowsExceptionIfExpectedIsNotCountable()
    {
        $this->assertNotSameSize('a', array());
    }

    
    public function testAssertNotSameSizeThrowsExceptionIfActualIsNotCountable()
    {
        $this->assertNotSameSize(array(), '');
    }

    
    public function testAssertJsonRaisesExceptionForInvalidArgument()
    {
        $this->assertJson(null);
    }

    
    public function testAssertJson()
    {
        $this->assertJson('{}');
    }

    
    public function testAssertJsonStringEqualsJsonString()
    {
        $Vpt32vvhspnvxpected = '{"Mascott" : "Tux"}';
        $Vmbzc5xgwrgoctual   = '{"Mascott" : "Tux"}';
        $Vbl4yrmdan1y  = 'Given Json strings do not match';

        $this->assertJsonStringEqualsJsonString($Vpt32vvhspnvxpected, $Vmbzc5xgwrgoctual, $Vbl4yrmdan1y);
    }

    
    public function testAssertJsonStringEqualsJsonStringErrorRaised($Vpt32vvhspnvxpected, $Vmbzc5xgwrgoctual)
    {
        try {
            $this->assertJsonStringEqualsJsonString($Vpt32vvhspnvxpected, $Vmbzc5xgwrgoctual);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }
        $this->fail('Expected exception not found');
    }

    
    public function testAssertJsonStringNotEqualsJsonString()
    {
        $Vpt32vvhspnvxpected = '{"Mascott" : "Beastie"}';
        $Vmbzc5xgwrgoctual   = '{"Mascott" : "Tux"}';
        $Vbl4yrmdan1y  = 'Given Json strings do match';

        $this->assertJsonStringNotEqualsJsonString($Vpt32vvhspnvxpected, $Vmbzc5xgwrgoctual, $Vbl4yrmdan1y);
    }

    
    public function testAssertJsonStringNotEqualsJsonStringErrorRaised($Vpt32vvhspnvxpected, $Vmbzc5xgwrgoctual)
    {
        try {
            $this->assertJsonStringNotEqualsJsonString($Vpt32vvhspnvxpected, $Vmbzc5xgwrgoctual);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }
        $this->fail('Expected exception not found');
    }

    
    public function testAssertJsonStringEqualsJsonFile()
    {
        $Vpu3xl4uhgg5    = __DIR__ . '/../_files/JsonData/simpleObject.json';
        $Vmbzc5xgwrgoctual  = json_encode(array('Mascott' => 'Tux'));
        $Vbl4yrmdan1y = '';
        $this->assertJsonStringEqualsJsonFile($Vpu3xl4uhgg5, $Vmbzc5xgwrgoctual, $Vbl4yrmdan1y);
    }

    
    public function testAssertJsonStringEqualsJsonFileExpectingExpectationFailedException()
    {
        $Vpu3xl4uhgg5    = __DIR__ . '/../_files/JsonData/simpleObject.json';
        $Vmbzc5xgwrgoctual  = json_encode(array('Mascott' => 'Beastie'));
        $Vbl4yrmdan1y = '';
        try {
            $this->assertJsonStringEqualsJsonFile($Vpu3xl4uhgg5, $Vmbzc5xgwrgoctual, $Vbl4yrmdan1y);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
                'Failed asserting that \'{"Mascott":"Beastie"}\' matches JSON string "{"Mascott":"Tux"}".',
                $Vpt32vvhspnv->getMessage()
            );

            return;
        }

        $this->fail('Expected Exception not thrown.');
    }

    
    public function testAssertJsonStringEqualsJsonFileExpectingException()
    {
        $Vpu3xl4uhgg5 = __DIR__ . '/../_files/JsonData/simpleObject.json';
        try {
            $this->assertJsonStringEqualsJsonFile($Vpu3xl4uhgg5, null);
        } catch (PHPUnit_Framework_Exception $Vpt32vvhspnv) {
            return;
        }
        $this->fail('Expected Exception not thrown.');
    }

    
    public function testAssertJsonStringNotEqualsJsonFile()
    {
        $Vpu3xl4uhgg5    = __DIR__ . '/../_files/JsonData/simpleObject.json';
        $Vmbzc5xgwrgoctual  = json_encode(array('Mascott' => 'Beastie'));
        $Vbl4yrmdan1y = '';
        $this->assertJsonStringNotEqualsJsonFile($Vpu3xl4uhgg5, $Vmbzc5xgwrgoctual, $Vbl4yrmdan1y);
    }

    
    public function testAssertJsonStringNotEqualsJsonFileExpectingException()
    {
        $Vpu3xl4uhgg5 = __DIR__ . '/../_files/JsonData/simpleObject.json';
        try {
            $this->assertJsonStringNotEqualsJsonFile($Vpu3xl4uhgg5, null);
        } catch (PHPUnit_Framework_Exception $Vpt32vvhspnv) {
            return;
        }
        $this->fail('Expected exception not found.');
    }

    
    public function testAssertJsonFileNotEqualsJsonFile()
    {
        $Vpu3xl4uhgg5Expected = __DIR__ . '/../_files/JsonData/simpleObject.json';
        $Vpu3xl4uhgg5Actual   = __DIR__ . '/../_files/JsonData/arrayObject.json';
        $Vbl4yrmdan1y      = '';
        $this->assertJsonFileNotEqualsJsonFile($Vpu3xl4uhgg5Expected, $Vpu3xl4uhgg5Actual, $Vbl4yrmdan1y);
    }

    
    public function testAssertJsonFileEqualsJsonFile()
    {
        $Vpu3xl4uhgg5    = __DIR__ . '/../_files/JsonData/simpleObject.json';
        $Vbl4yrmdan1y = '';
        $this->assertJsonFileEqualsJsonFile($Vpu3xl4uhgg5, $Vpu3xl4uhgg5, $Vbl4yrmdan1y);
    }

    
    public function testAssertInstanceOf()
    {
        $this->assertInstanceOf('stdClass', new stdClass);

        try {
            $this->assertInstanceOf('Exception', new stdClass);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertInstanceOfThrowsExceptionForInvalidArgument()
    {
        $this->assertInstanceOf(null, new stdClass);
    }

    
    public function testAssertAttributeInstanceOf()
    {
        $Vgcvauwd5u5t    = new stdClass;
        $Vgcvauwd5u5t->a = new stdClass;

        $this->assertAttributeInstanceOf('stdClass', 'a', $Vgcvauwd5u5t);
    }

    
    public function testAssertNotInstanceOf()
    {
        $this->assertNotInstanceOf('Exception', new stdClass);

        try {
            $this->assertNotInstanceOf('stdClass', new stdClass);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertNotInstanceOfThrowsExceptionForInvalidArgument()
    {
        $this->assertNotInstanceOf(null, new stdClass);
    }

    
    public function testAssertAttributeNotInstanceOf()
    {
        $Vgcvauwd5u5t    = new stdClass;
        $Vgcvauwd5u5t->a = new stdClass;

        $this->assertAttributeNotInstanceOf('Exception', 'a', $Vgcvauwd5u5t);
    }

    
    public function testAssertInternalType()
    {
        $this->assertInternalType('integer', 1);

        try {
            $this->assertInternalType('string', 1);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertInternalTypeDouble()
    {
        $this->assertInternalType('double', 1.0);

        try {
            $this->assertInternalType('double', 1);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertInternalTypeThrowsExceptionForInvalidArgument()
    {
        $this->assertInternalType(null, 1);
    }

    
    public function testAssertAttributeInternalType()
    {
        $Vgcvauwd5u5t    = new stdClass;
        $Vgcvauwd5u5t->a = 1;

        $this->assertAttributeInternalType('integer', 'a', $Vgcvauwd5u5t);
    }

    
    public function testAssertNotInternalType()
    {
        $this->assertNotInternalType('string', 1);

        try {
            $this->assertNotInternalType('integer', 1);
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertNotInternalTypeThrowsExceptionForInvalidArgument()
    {
        $this->assertNotInternalType(null, 1);
    }

    
    public function testAssertAttributeNotInternalType()
    {
        $Vgcvauwd5u5t    = new stdClass;
        $Vgcvauwd5u5t->a = 1;

        $this->assertAttributeNotInternalType('string', 'a', $Vgcvauwd5u5t);
    }

    
    public function testAssertStringMatchesFormatFileThrowsExceptionForInvalidArgument()
    {
        $this->assertStringMatchesFormatFile('not_existing_file', '');
    }

    
    public function testAssertStringMatchesFormatFileThrowsExceptionForInvalidArgument2()
    {
        $this->assertStringMatchesFormatFile($this->filesDirectory . 'expectedFileFormat.txt', null);
    }

    
    public function testAssertStringMatchesFormatFile()
    {
        $this->assertStringMatchesFormatFile($this->filesDirectory . 'expectedFileFormat.txt', "FOO\n");

        try {
            $this->assertStringMatchesFormatFile($this->filesDirectory . 'expectedFileFormat.txt', "BAR\n");
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public function testAssertStringNotMatchesFormatFileThrowsExceptionForInvalidArgument()
    {
        $this->assertStringNotMatchesFormatFile('not_existing_file', '');
    }

    
    public function testAssertStringNotMatchesFormatFileThrowsExceptionForInvalidArgument2()
    {
        $this->assertStringNotMatchesFormatFile($this->filesDirectory . 'expectedFileFormat.txt', null);
    }

    
    public function testAssertStringNotMatchesFormatFile()
    {
        $this->assertStringNotMatchesFormatFile($this->filesDirectory . 'expectedFileFormat.txt', "BAR\n");

        try {
            $this->assertStringNotMatchesFormatFile($this->filesDirectory . 'expectedFileFormat.txt', "FOO\n");
        } catch (PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv) {
            return;
        }

        $this->fail();
    }

    
    public static function validInvalidJsonDataprovider()
    {
        return array(
            'error syntax in expected JSON' => array('{"Mascott"::}', '{"Mascott" : "Tux"}'),
            'error UTF-8 in actual JSON'    => array('{"Mascott" : "Tux"}', '{"Mascott" : :}'),
        );
    }
}
