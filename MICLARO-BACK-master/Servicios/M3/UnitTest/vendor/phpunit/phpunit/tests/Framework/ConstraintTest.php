<?php



class Framework_ConstraintTest extends PHPUnit_Framework_TestCase
{
    
    public function testConstraintArrayHasKey()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::arrayHasKey(0);

        $this->assertFalse($Veup52kdjcwg->evaluate(array(), '', true));
        $this->assertEquals('has the key 0', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate(array());
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
Failed asserting that an array has the key 0.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintArrayHasKey2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::arrayHasKey(0);

        try {
            $Veup52kdjcwg->evaluate(array(), 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
custom message\nFailed asserting that an array has the key 0.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintArrayNotHasKey()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::arrayHasKey(0)
        );

        $this->assertFalse($Veup52kdjcwg->evaluate(array(0 => 1), '', true));
        $this->assertEquals('does not have the key 0', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate(array(0 => 1));
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that an array does not have the key 0.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintArrayNotHasKey2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::arrayHasKey(0)
        );

        try {
            $Veup52kdjcwg->evaluate(array(0), 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
custom message
Failed asserting that an array does not have the key 0.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintFileExists()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::fileExists();

        $this->assertFalse($Veup52kdjcwg->evaluate('foo', '', true));
        $this->assertEquals('file exists', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate('foo');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that file "foo" exists.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintFileExists2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::fileExists();

        try {
            $Veup52kdjcwg->evaluate('foo', 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
custom message
Failed asserting that file "foo" exists.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintFileNotExists()
    {
        $Vpu3xl4uhgg5 = dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'ClassWithNonPublicAttributes.php';

        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::fileExists()
        );

        $this->assertFalse($Veup52kdjcwg->evaluate($Vpu3xl4uhgg5, '', true));
        $this->assertEquals('file does not exist', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate($Vpu3xl4uhgg5);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that file "$Vpu3xl4uhgg5" does not exist.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintFileNotExists2()
    {
        $Vpu3xl4uhgg5 = dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'ClassWithNonPublicAttributes.php';

        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::fileExists()
        );

        try {
            $Veup52kdjcwg->evaluate($Vpu3xl4uhgg5, 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
custom message
Failed asserting that file "$Vpu3xl4uhgg5" does not exist.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintGreaterThan()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::greaterThan(1);

        $this->assertFalse($Veup52kdjcwg->evaluate(0, '', true));
        $this->assertTrue($Veup52kdjcwg->evaluate(2, '', true));
        $this->assertEquals('is greater than 1', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate(0);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that 0 is greater than 1.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintGreaterThan2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::greaterThan(1);

        try {
            $Veup52kdjcwg->evaluate(0, 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
custom message
Failed asserting that 0 is greater than 1.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintNotGreaterThan()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::greaterThan(1)
        );

        $this->assertTrue($Veup52kdjcwg->evaluate(1, '', true));
        $this->assertEquals('is not greater than 1', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate(2);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that 2 is not greater than 1.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintNotGreaterThan2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::greaterThan(1)
        );

        try {
            $Veup52kdjcwg->evaluate(2, 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
custom message
Failed asserting that 2 is not greater than 1.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintGreaterThanOrEqual()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::greaterThanOrEqual(1);

        $this->assertTrue($Veup52kdjcwg->evaluate(1, '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate(0, '', true));
        $this->assertEquals('is equal to 1 or is greater than 1', $Veup52kdjcwg->toString());
        $this->assertEquals(2, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate(0);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that 0 is equal to 1 or is greater than 1.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintGreaterThanOrEqual2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::greaterThanOrEqual(1);

        try {
            $Veup52kdjcwg->evaluate(0, 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
custom message
Failed asserting that 0 is equal to 1 or is greater than 1.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintNotGreaterThanOrEqual()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::greaterThanOrEqual(1)
        );

        $this->assertFalse($Veup52kdjcwg->evaluate(1, '', true));
        $this->assertEquals('not( is equal to 1 or is greater than 1 )', $Veup52kdjcwg->toString());
        $this->assertEquals(2, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate(1);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that not( 1 is equal to 1 or is greater than 1 ).

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintNotGreaterThanOrEqual2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::greaterThanOrEqual(1)
        );

        try {
            $Veup52kdjcwg->evaluate(1, 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
custom message
Failed asserting that not( 1 is equal to 1 or is greater than 1 ).

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintIsAnything()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::anything();

        $this->assertTrue($Veup52kdjcwg->evaluate(null, '', true));
        $this->assertNull($Veup52kdjcwg->evaluate(null));
        $this->assertEquals('is anything', $Veup52kdjcwg->toString());
        $this->assertEquals(0, count($Veup52kdjcwg));
    }

    
    public function testConstraintNotIsAnything()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::anything()
        );

        $this->assertFalse($Veup52kdjcwg->evaluate(null, '', true));
        $this->assertEquals('is not anything', $Veup52kdjcwg->toString());
        $this->assertEquals(0, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate(null);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that null is not anything.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintIsEqual()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::equalTo(1);

        $this->assertTrue($Veup52kdjcwg->evaluate(1, '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate(0, '', true));
        $this->assertEquals('is equal to 1', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate(0);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that 0 matches expected 1.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    public function isEqualProvider()
    {
        $Vmbzc5xgwrgo      = new stdClass;
        $Vmbzc5xgwrgo->foo = 'bar';
        $Vglk1nbl1t2o      = new stdClass;
        $Vmbzc5xgwrgohash  = spl_object_hash($Vmbzc5xgwrgo);
        $Vglk1nbl1t2ohash  = spl_object_hash($Vglk1nbl1t2o);

        $Vibefsvmlpru               = new stdClass;
        $Vibefsvmlpru->foo          = 'bar';
        $Vibefsvmlpru->int          = 1;
        $Vibefsvmlpru->array        = array(0, array(1), array(2), 3);
        $Vibefsvmlpru->related      = new stdClass;
        $Vibefsvmlpru->related->foo = "a\nb\nc\nd\ne\nf\ng\nh\ni\nj\nk";
        $Vibefsvmlpru->self         = $Vibefsvmlpru;
        $Vibefsvmlpru->c            = $Vibefsvmlpru;
        $Vzhkd1voupse               = new stdClass;
        $Vzhkd1voupse->foo          = 'bar';
        $Vzhkd1voupse->int          = 2;
        $Vzhkd1voupse->array        = array(0, array(4), array(2), 3);
        $Vzhkd1voupse->related      = new stdClass;
        $Vzhkd1voupse->related->foo = "a\np\nc\nd\ne\nf\ng\nh\ni\nw\nk";
        $Vzhkd1voupse->self         = $Vzhkd1voupse;
        $Vzhkd1voupse->c            = $Vibefsvmlpru;

        $V1oyf3k5iuiw = new SplObjectStorage;
        $V1oyf3k5iuiw->attach($Vmbzc5xgwrgo);
        $V1oyf3k5iuiw->attach($Vglk1nbl1t2o);
        $Vzo32zv0tioc = new SplObjectStorage;
        $Vzo32zv0tioc->attach($Vglk1nbl1t2o);
        $V1oyf3k5iuiwhash = spl_object_hash($V1oyf3k5iuiw);
        $Vzo32zv0tiochash = spl_object_hash($Vzo32zv0tioc);

        $Vzhkd1voupseom1                     = new DOMDocument;
        $Vzhkd1voupseom1->preserveWhiteSpace = false;
        $Vzhkd1voupseom1->loadXML('<root></root>');
        $Vzhkd1voupseom2                     = new DOMDocument;
        $Vzhkd1voupseom2->preserveWhiteSpace = false;
        $Vzhkd1voupseom2->loadXML('<root><foo/></root>');

        $Vzhkd1voupseata = array(
            array(1, 0, <<<EOF
Failed asserting that 0 matches expected 1.

EOF
            ),
            array(1.1, 0, <<<EOF
Failed asserting that 0 matches expected 1.1.

EOF
            ),
            array('a', 'b', <<<EOF
Failed asserting that two strings are equal.
--- Expected
+++ Actual
@@ @@
-'a'
+'b'

EOF
            ),
            array("a\nb\nc\nd\ne\nf\ng\nh\ni\nj\nk", "a\np\nc\nd\ne\nf\ng\nh\ni\nw\nk", <<<EOF
Failed asserting that two strings are equal.
--- Expected
+++ Actual
@@ @@
 'a
-b
+p

@@ @@
 i
-j
+w
 k'

EOF
            ),
            array(1, array(0), <<<EOF
Array (...) does not match expected type "integer".

EOF
            ),
            array(array(0), 1, <<<EOF
1 does not match expected type "array".

EOF
            ),
            array(array(0), array(1), <<<EOF
Failed asserting that two arrays are equal.
--- Expected
+++ Actual
@@ @@
 Array (
-    0 => 0
+    0 => 1
 )

EOF
            ),
            array(array(true), array('true'), <<<EOF
Failed asserting that two arrays are equal.
--- Expected
+++ Actual
@@ @@
 Array (
-    0 => true
+    0 => 'true'
 )

EOF
            ),
            array(array(0, array(1), array(2), 3), array(0, array(4), array(2), 3), <<<EOF
Failed asserting that two arrays are equal.
--- Expected
+++ Actual
@@ @@
 Array (
     0 => 0
     1 => Array (
-        0 => 1
+        0 => 4
     )
     2 => Array (...)
     3 => 3
 )

EOF
            ),
            array($Vmbzc5xgwrgo, array(0), <<<EOF
Array (...) does not match expected type "object".

EOF
            ),
            array(array(0), $Vmbzc5xgwrgo, <<<EOF
stdClass Object (...) does not match expected type "array".

EOF
            ),
            array($Vmbzc5xgwrgo, $Vglk1nbl1t2o, <<<EOF
Failed asserting that two objects are equal.
--- Expected
+++ Actual
@@ @@
 stdClass Object (
-    'foo' => 'bar'
 )

EOF
            ),
            array($Vibefsvmlpru, $Vzhkd1voupse, <<<EOF
Failed asserting that two objects are equal.
--- Expected
+++ Actual
@@ @@
 stdClass Object (
     'foo' => 'bar'
-    'int' => 1
+    'int' => 2
     'array' => Array (
         0 => 0
         1 => Array (
-            0 => 1
+            0 => 4

@@ @@
         'foo' => 'a
-        b
+        p

@@ @@
         i
-        j
+        w
         k'
     )
     'self' => stdClass Object (...)
     'c' => stdClass Object (...)
 )

EOF
            ),
            array($Vzhkd1voupseom1, $Vzhkd1voupseom2, <<<EOF
Failed asserting that two DOM documents are equal.
--- Expected
+++ Actual
@@ @@
 <?xml version="1.0"?>
-<root/>
+<root>
+  <foo/>
+</root>

EOF
            ),
            array(
              new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/New_York')),
              new DateTime('2013-03-29 04:13:35', new DateTimeZone('America/Chicago')),
              <<<EOF
Failed asserting that two DateTime objects are equal.
--- Expected
+++ Actual
@@ @@
-2013-03-29T04:13:35.000000-0400
+2013-03-29T04:13:35.000000-0500

EOF
            ),
        );

        if (PHP_MAJOR_VERSION < 7) {
            $Vzhkd1voupseata[] = array($V1oyf3k5iuiw, $Vzo32zv0tioc, <<<EOF
Failed asserting that two objects are equal.
--- Expected
+++ Actual
@@ @@
-SplObjectStorage Object &$V1oyf3k5iuiwhash (
-    '$Vmbzc5xgwrgohash' => Array &0 (
-        'obj' => stdClass Object &$Vmbzc5xgwrgohash (
-            'foo' => 'bar'
-        )
+SplObjectStorage Object &$Vzo32zv0tiochash (
+    '$Vglk1nbl1t2ohash' => Array &0 (
+        'obj' => stdClass Object &$Vglk1nbl1t2ohash ()
         'inf' => null
     )
-    '$Vglk1nbl1t2ohash' => Array &0
 )

EOF
            );
        } else {
            $Vzhkd1voupseata[] = array($V1oyf3k5iuiw, $Vzo32zv0tioc, <<<EOF
Failed asserting that two objects are equal.
--- Expected
+++ Actual
@@ @@
-SplObjectStorage Object &$V1oyf3k5iuiwhash (
-    '$Vmbzc5xgwrgohash' => Array &0 (
-        'obj' => stdClass Object &$Vmbzc5xgwrgohash (
-            'foo' => 'bar'
-        )
+SplObjectStorage Object &$Vzo32zv0tiochash (
+    '$Vglk1nbl1t2ohash' => Array &0 (
+        'obj' => stdClass Object &$Vglk1nbl1t2ohash ()
         'inf' => null
     )
-    '$Vglk1nbl1t2ohash' => Array &0
 )

EOF
            );
        }

        return $Vzhkd1voupseata;
    }

    
    public function testConstraintIsEqual2($Vpt32vvhspnvxpected, $Vmbzc5xgwrgoctual, $Vbl4yrmdan1y)
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::equalTo($Vpt32vvhspnvxpected);

        try {
            $Veup52kdjcwg->evaluate($Vmbzc5xgwrgoctual, 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              "custom message\n$Vbl4yrmdan1y",
              $this->trimnl(PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv))
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintIsNotEqual()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::equalTo(1)
        );

        $this->assertTrue($Veup52kdjcwg->evaluate(0, '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate(1, '', true));
        $this->assertEquals('is not equal to 1', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate(1);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that 1 is not equal to 1.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintIsNotEqual2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::equalTo(1)
        );

        try {
            $Veup52kdjcwg->evaluate(1, 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
custom message
Failed asserting that 1 is not equal to 1.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintIsIdentical()
    {
        $Vmbzc5xgwrgo = new stdClass;
        $Vglk1nbl1t2o = new stdClass;

        $Veup52kdjcwg = PHPUnit_Framework_Assert::identicalTo($Vmbzc5xgwrgo);

        $this->assertFalse($Veup52kdjcwg->evaluate($Vglk1nbl1t2o, '', true));
        $this->assertTrue($Veup52kdjcwg->evaluate($Vmbzc5xgwrgo, '', true));
        $this->assertEquals('is identical to an object of class "stdClass"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate($Vglk1nbl1t2o);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
Failed asserting that two variables reference the same object.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintIsIdentical2()
    {
        $Vmbzc5xgwrgo = new stdClass;
        $Vglk1nbl1t2o = new stdClass;

        $Veup52kdjcwg = PHPUnit_Framework_Assert::identicalTo($Vmbzc5xgwrgo);

        try {
            $Veup52kdjcwg->evaluate($Vglk1nbl1t2o, 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
custom message
Failed asserting that two variables reference the same object.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintIsIdentical3()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::identicalTo('a');

        try {
            $Veup52kdjcwg->evaluate('b', 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
custom message
Failed asserting that two strings are identical.
--- Expected
+++ Actual
@@ @@
-a
+b

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintIsNotIdentical()
    {
        $Vmbzc5xgwrgo = new stdClass;
        $Vglk1nbl1t2o = new stdClass;

        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::identicalTo($Vmbzc5xgwrgo)
        );

        $this->assertTrue($Veup52kdjcwg->evaluate($Vglk1nbl1t2o, '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate($Vmbzc5xgwrgo, '', true));
        $this->assertEquals('is not identical to an object of class "stdClass"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate($Vmbzc5xgwrgo);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
Failed asserting that two variables don't reference the same object.

EOF
              ,
              $this->trimnl(PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv))
            );

            return;
        }

        $this->fail();
    }

    /**
     * @covers PHPUnit_Framework_Constraint_IsIdentical
     * @covers PHPUnit_Framework_Constraint_Not
     * @covers PHPUnit_Framework_Assert::identicalTo
     * @covers PHPUnit_Framework_Assert::logicalNot
     * @covers PHPUnit_Framework_TestFailure::exceptionToString
     */
    public function testConstraintIsNotIdentical2()
    {
        $Vmbzc5xgwrgo = new stdClass;

        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::identicalTo($Vmbzc5xgwrgo)
        );

        try {
            $Veup52kdjcwg->evaluate($Vmbzc5xgwrgo, 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
custom message
Failed asserting that two variables don't reference the same object.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintIsNotIdentical3()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::identicalTo('a')
        );

        try {
            $Veup52kdjcwg->evaluate('a', 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
custom message
Failed asserting that two strings are not identical.

EOF
              ,
              $this->trimnl(PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv))
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintIsInstanceOf()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::isInstanceOf('Exception');

        $this->assertFalse($Veup52kdjcwg->evaluate(new stdClass, '', true));
        $this->assertTrue($Veup52kdjcwg->evaluate(new Exception, '', true));
        $this->assertEquals('is instance of class "Exception"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        $V3jzyh54zhyr = PHPUnit_Framework_Assert::isInstanceOf('Countable');
        $this->assertFalse($V3jzyh54zhyr->evaluate(new stdClass, '', true));
        $this->assertTrue($V3jzyh54zhyr->evaluate(new ArrayObject, '', true));
        $this->assertEquals('is instance of interface "Countable"', $V3jzyh54zhyr->toString());

        try {
            $Veup52kdjcwg->evaluate(new stdClass);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that stdClass Object () is an instance of class "Exception".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintIsInstanceOf2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::isInstanceOf('Exception');

        try {
            $Veup52kdjcwg->evaluate(new stdClass, 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
custom message
Failed asserting that stdClass Object () is an instance of class "Exception".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintIsNotInstanceOf()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::isInstanceOf('stdClass')
        );

        $this->assertFalse($Veup52kdjcwg->evaluate(new stdClass, '', true));
        $this->assertTrue($Veup52kdjcwg->evaluate(new Exception, '', true));
        $this->assertEquals('is not instance of class "stdClass"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate(new stdClass);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that stdClass Object () is not an instance of class "stdClass".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintIsNotInstanceOf2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::isInstanceOf('stdClass')
        );

        try {
            $Veup52kdjcwg->evaluate(new stdClass, 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
custom message
Failed asserting that stdClass Object () is not an instance of class "stdClass".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintIsType()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::isType('string');

        $this->assertFalse($Veup52kdjcwg->evaluate(0, '', true));
        $this->assertTrue($Veup52kdjcwg->evaluate('', '', true));
        $this->assertEquals('is of type "string"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate(new stdClass);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertStringMatchesFormat(<<<EOF
Failed asserting that stdClass Object &%x () is of type "string".

EOF
              ,
              $this->trimnl(PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv))
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintIsType2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::isType('string');

        try {
            $Veup52kdjcwg->evaluate(new stdClass, 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertStringMatchesFormat(<<<EOF
custom message
Failed asserting that stdClass Object &%x () is of type "string".

EOF
              ,
              $this->trimnl(PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv))
            );

            return;
        }

        $this->fail();
    }

    public function resources()
    {
        $Vuxbdsa0lda0 = fopen(__FILE__, 'r');
        fclose($Vuxbdsa0lda0);

        return array(
            'open resource'     => array(fopen(__FILE__, 'r')),
            'closed resource'   => array($Vuxbdsa0lda0),
        );
    }

    
    public function testConstraintIsResourceTypeEvaluatesCorrectlyWithResources($Vbduzasjp2m2)
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::isType('resource');

        $this->assertTrue($Veup52kdjcwg->evaluate($Vbduzasjp2m2, '', true));

        @fclose($Vbduzasjp2m2);
    }

    
    public function testConstraintIsNotType()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::isType('string')
        );

        $this->assertTrue($Veup52kdjcwg->evaluate(0, '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate('', '', true));
        $this->assertEquals('is not of type "string"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate('');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that '' is not of type "string".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintIsNotType2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::isType('string')
        );

        try {
            $Veup52kdjcwg->evaluate('', 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
custom message
Failed asserting that '' is not of type "string".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintIsNull()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::isNull();

        $this->assertFalse($Veup52kdjcwg->evaluate(0, '', true));
        $this->assertTrue($Veup52kdjcwg->evaluate(null, '', true));
        $this->assertEquals('is null', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate(0);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
Failed asserting that 0 is null.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintIsNull2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::isNull();

        try {
            $Veup52kdjcwg->evaluate(0, 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
custom message
Failed asserting that 0 is null.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintIsNotNull()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::isNull()
        );

        $this->assertFalse($Veup52kdjcwg->evaluate(null, '', true));
        $this->assertTrue($Veup52kdjcwg->evaluate(0, '', true));
        $this->assertEquals('is not null', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate(null);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
Failed asserting that null is not null.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintIsNotNull2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::isNull()
        );

        try {
            $Veup52kdjcwg->evaluate(null, 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
custom message
Failed asserting that null is not null.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintLessThan()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::lessThan(1);

        $this->assertTrue($Veup52kdjcwg->evaluate(0, '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate(1, '', true));
        $this->assertEquals('is less than 1', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate(1);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that 1 is less than 1.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintLessThan2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::lessThan(1);

        try {
            $Veup52kdjcwg->evaluate(1, 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
custom message
Failed asserting that 1 is less than 1.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintNotLessThan()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::lessThan(1)
        );

        $this->assertTrue($Veup52kdjcwg->evaluate(1, '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate(0, '', true));
        $this->assertEquals('is not less than 1', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate(0);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that 0 is not less than 1.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintNotLessThan2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::lessThan(1)
        );

        try {
            $Veup52kdjcwg->evaluate(0, 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
custom message
Failed asserting that 0 is not less than 1.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintLessThanOrEqual()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::lessThanOrEqual(1);

        $this->assertTrue($Veup52kdjcwg->evaluate(1, '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate(2, '', true));
        $this->assertEquals('is equal to 1 or is less than 1', $Veup52kdjcwg->toString());
        $this->assertEquals(2, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate(2);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that 2 is equal to 1 or is less than 1.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintCallback()
    {
        $VibefsvmlprulosureReflect = function ($Vd51rl30yovf) {
            return $Vd51rl30yovf;
        };

        $VibefsvmlprulosureWithoutParameter = function () {
            return true;
        };

        $Veup52kdjcwg = PHPUnit_Framework_Assert::callback($VibefsvmlprulosureWithoutParameter);
        $this->assertTrue($Veup52kdjcwg->evaluate('', '', true));

        $Veup52kdjcwg = PHPUnit_Framework_Assert::callback($VibefsvmlprulosureReflect);
        $this->assertTrue($Veup52kdjcwg->evaluate(true, '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate(false, '', true));

        $Vibefsvmlpruallback   = array($this, 'callbackReturningTrue');
        $Veup52kdjcwg = PHPUnit_Framework_Assert::callback($Vibefsvmlpruallback);
        $this->assertTrue($Veup52kdjcwg->evaluate(false,  '', true));

        $Vibefsvmlpruallback   = array('Framework_ConstraintTest', 'staticCallbackReturningTrue');
        $Veup52kdjcwg = PHPUnit_Framework_Assert::callback($Vibefsvmlpruallback);
        $this->assertTrue($Veup52kdjcwg->evaluate(null, '', true));

        $this->assertEquals('is accepted by specified callback', $Veup52kdjcwg->toString());
    }

    
    public function testConstraintCallbackFailure()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::callback(function () {
            return false;
        });
        $Veup52kdjcwg->evaluate('This fails');
    }

    public function callbackReturningTrue()
    {
        return true;
    }

    public static function staticCallbackReturningTrue()
    {
        return true;
    }

    
    public function testConstraintLessThanOrEqual2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::lessThanOrEqual(1);

        try {
            $Veup52kdjcwg->evaluate(2, 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
custom message
Failed asserting that 2 is equal to 1 or is less than 1.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintNotLessThanOrEqual()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::lessThanOrEqual(1)
        );

        $this->assertTrue($Veup52kdjcwg->evaluate(2, '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate(1, '', true));
        $this->assertEquals('not( is equal to 1 or is less than 1 )', $Veup52kdjcwg->toString());
        $this->assertEquals(2, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate(1);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that not( 1 is equal to 1 or is less than 1 ).

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintNotLessThanOrEqual2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::lessThanOrEqual(1)
        );

        try {
            $Veup52kdjcwg->evaluate(1, 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
custom message
Failed asserting that not( 1 is equal to 1 or is less than 1 ).

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintClassHasAttribute()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::classHasAttribute('privateAttribute');

        $this->assertTrue($Veup52kdjcwg->evaluate('ClassWithNonPublicAttributes', '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate('stdClass', '', true));
        $this->assertEquals('has attribute "privateAttribute"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate('stdClass');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that class "stdClass" has attribute "privateAttribute".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintClassHasAttribute2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::classHasAttribute('privateAttribute');

        try {
            $Veup52kdjcwg->evaluate('stdClass', 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
custom message
Failed asserting that class "stdClass" has attribute "privateAttribute".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintClassNotHasAttribute()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::classHasAttribute('privateAttribute')
        );

        $this->assertTrue($Veup52kdjcwg->evaluate('stdClass', '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate('ClassWithNonPublicAttributes', '', true));
        $this->assertEquals('does not have attribute "privateAttribute"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate('ClassWithNonPublicAttributes');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that class "ClassWithNonPublicAttributes" does not have attribute "privateAttribute".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintClassNotHasAttribute2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::classHasAttribute('privateAttribute')
        );

        try {
            $Veup52kdjcwg->evaluate('ClassWithNonPublicAttributes', 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
custom message
Failed asserting that class "ClassWithNonPublicAttributes" does not have attribute "privateAttribute".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintClassHasStaticAttribute()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::classHasStaticAttribute('privateStaticAttribute');

        $this->assertTrue($Veup52kdjcwg->evaluate('ClassWithNonPublicAttributes', '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate('stdClass', '', true));
        $this->assertEquals('has static attribute "privateStaticAttribute"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate('stdClass');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that class "stdClass" has static attribute "privateStaticAttribute".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintClassHasStaticAttribute2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::classHasStaticAttribute('foo');

        try {
            $Veup52kdjcwg->evaluate('stdClass', 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
custom message
Failed asserting that class "stdClass" has static attribute "foo".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintClassNotHasStaticAttribute()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::classHasStaticAttribute('privateStaticAttribute')
        );

        $this->assertTrue($Veup52kdjcwg->evaluate('stdClass', '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate('ClassWithNonPublicAttributes', '', true));
        $this->assertEquals('does not have static attribute "privateStaticAttribute"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate('ClassWithNonPublicAttributes');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that class "ClassWithNonPublicAttributes" does not have static attribute "privateStaticAttribute".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintClassNotHasStaticAttribute2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::classHasStaticAttribute('privateStaticAttribute')
        );

        try {
            $Veup52kdjcwg->evaluate('ClassWithNonPublicAttributes', 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
custom message
Failed asserting that class "ClassWithNonPublicAttributes" does not have static attribute "privateStaticAttribute".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintObjectHasAttribute()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::objectHasAttribute('privateAttribute');

        $this->assertTrue($Veup52kdjcwg->evaluate(new ClassWithNonPublicAttributes, '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate(new stdClass, '', true));
        $this->assertEquals('has attribute "privateAttribute"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate(new stdClass);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that object of class "stdClass" has attribute "privateAttribute".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintObjectHasAttribute2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::objectHasAttribute('privateAttribute');

        try {
            $Veup52kdjcwg->evaluate(new stdClass, 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
custom message
Failed asserting that object of class "stdClass" has attribute "privateAttribute".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintObjectNotHasAttribute()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::objectHasAttribute('privateAttribute')
        );

        $this->assertTrue($Veup52kdjcwg->evaluate(new stdClass, '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate(new ClassWithNonPublicAttributes, '', true));
        $this->assertEquals('does not have attribute "privateAttribute"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate(new ClassWithNonPublicAttributes);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that object of class "ClassWithNonPublicAttributes" does not have attribute "privateAttribute".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintObjectNotHasAttribute2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::objectHasAttribute('privateAttribute')
        );

        try {
            $Veup52kdjcwg->evaluate(new ClassWithNonPublicAttributes, 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
custom message
Failed asserting that object of class "ClassWithNonPublicAttributes" does not have attribute "privateAttribute".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintPCREMatch()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::matchesRegularExpression('/foo/');

        $this->assertFalse($Veup52kdjcwg->evaluate('barbazbar', '', true));
        $this->assertTrue($Veup52kdjcwg->evaluate('barfoobar', '', true));
        $this->assertEquals('matches PCRE pattern "/foo/"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate('barbazbar');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that 'barbazbar' matches PCRE pattern "/foo/".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintPCREMatch2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::matchesRegularExpression('/foo/');

        try {
            $Veup52kdjcwg->evaluate('barbazbar', 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
custom message
Failed asserting that 'barbazbar' matches PCRE pattern "/foo/".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintPCRENotMatch()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::matchesRegularExpression('/foo/')
        );

        $this->assertTrue($Veup52kdjcwg->evaluate('barbazbar', '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate('barfoobar', '', true));
        $this->assertEquals('does not match PCRE pattern "/foo/"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate('barfoobar');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that 'barfoobar' does not match PCRE pattern "/foo/".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintPCRENotMatch2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::matchesRegularExpression('/foo/')
        );

        try {
            $Veup52kdjcwg->evaluate('barfoobar', 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(<<<EOF
custom message
Failed asserting that 'barfoobar' does not match PCRE pattern "/foo/".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintStringMatches()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::matches('*%c*');
        $this->assertFalse($Veup52kdjcwg->evaluate('**', '', true));
        $this->assertTrue($Veup52kdjcwg->evaluate('***', '', true));
        $this->assertEquals('matches PCRE pattern "/^\*.\*$/s"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));
    }

    
    public function testConstraintStringMatches2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::matches('*%s*');
        $this->assertFalse($Veup52kdjcwg->evaluate('**', '', true));
        $this->assertTrue($Veup52kdjcwg->evaluate('***', '', true));
        $this->assertEquals('matches PCRE pattern "/^\*[^\r\n]+\*$/s"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));
    }

    
    public function testConstraintStringMatches3()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::matches('*%i*');
        $this->assertFalse($Veup52kdjcwg->evaluate('**', '', true));
        $this->assertTrue($Veup52kdjcwg->evaluate('*0*', '', true));
        $this->assertEquals('matches PCRE pattern "/^\*[+-]?\d+\*$/s"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));
    }

    
    public function testConstraintStringMatches4()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::matches('*%d*');
        $this->assertFalse($Veup52kdjcwg->evaluate('**', '', true));
        $this->assertTrue($Veup52kdjcwg->evaluate('*0*', '', true));
        $this->assertEquals('matches PCRE pattern "/^\*\d+\*$/s"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));
    }

    
    public function testConstraintStringMatches5()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::matches('*%x*');
        $this->assertFalse($Veup52kdjcwg->evaluate('**', '', true));
        $this->assertTrue($Veup52kdjcwg->evaluate('*0f0f0f*', '', true));
        $this->assertEquals('matches PCRE pattern "/^\*[0-9a-fA-F]+\*$/s"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));
    }

    
    public function testConstraintStringMatches6()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::matches('*%f*');
        $this->assertFalse($Veup52kdjcwg->evaluate('**', '', true));
        $this->assertTrue($Veup52kdjcwg->evaluate('*1.0*', '', true));
        $this->assertEquals('matches PCRE pattern "/^\*[+-]?\.?\d+\.?\d*(?:[Ee][+-]?\d+)?\*$/s"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));
    }

    
    public function testConstraintStringStartsWith()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::stringStartsWith('prefix');

        $this->assertFalse($Veup52kdjcwg->evaluate('foo', '', true));
        $this->assertTrue($Veup52kdjcwg->evaluate('prefixfoo', '', true));
        $this->assertEquals('starts with "prefix"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate('foo');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that 'foo' starts with "prefix".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintStringStartsWith2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::stringStartsWith('prefix');

        try {
            $Veup52kdjcwg->evaluate('foo', 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
custom message\nFailed asserting that 'foo' starts with "prefix".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintStringStartsNotWith()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::stringStartsWith('prefix')
        );

        $this->assertTrue($Veup52kdjcwg->evaluate('foo', '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate('prefixfoo', '', true));
        $this->assertEquals('starts not with "prefix"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate('prefixfoo');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that 'prefixfoo' starts not with "prefix".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintStringStartsNotWith2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::stringStartsWith('prefix')
        );

        try {
            $Veup52kdjcwg->evaluate('prefixfoo', 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
custom message
Failed asserting that 'prefixfoo' starts not with "prefix".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintStringContains()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::stringContains('foo');

        $this->assertFalse($Veup52kdjcwg->evaluate('barbazbar', '', true));
        $this->assertTrue($Veup52kdjcwg->evaluate('barfoobar', '', true));
        $this->assertEquals('contains "foo"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate('barbazbar');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that 'barbazbar' contains "foo".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintStringContains2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::stringContains('foo');

        try {
            $Veup52kdjcwg->evaluate('barbazbar', 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
custom message
Failed asserting that 'barbazbar' contains "foo".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintStringNotContains()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::stringContains('foo')
        );

        $this->assertTrue($Veup52kdjcwg->evaluate('barbazbar', '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate('barfoobar', '', true));
        $this->assertEquals('does not contain "foo"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate('barfoobar');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that 'barfoobar' does not contain "foo".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintStringNotContains2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::stringContains('foo')
        );

        try {
            $Veup52kdjcwg->evaluate('barfoobar', 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
custom message
Failed asserting that 'barfoobar' does not contain "foo".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintStringEndsWith()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::stringEndsWith('suffix');

        $this->assertFalse($Veup52kdjcwg->evaluate('foo', '', true));
        $this->assertTrue($Veup52kdjcwg->evaluate('foosuffix', '', true));
        $this->assertEquals('ends with "suffix"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate('foo');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that 'foo' ends with "suffix".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintStringEndsWith2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::stringEndsWith('suffix');

        try {
            $Veup52kdjcwg->evaluate('foo', 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
custom message
Failed asserting that 'foo' ends with "suffix".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintStringEndsNotWith()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::stringEndsWith('suffix')
        );

        $this->assertTrue($Veup52kdjcwg->evaluate('foo', '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate('foosuffix', '', true));
        $this->assertEquals('ends not with "suffix"', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate('foosuffix');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that 'foosuffix' ends not with "suffix".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintStringEndsNotWith2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::stringEndsWith('suffix')
        );

        try {
            $Veup52kdjcwg->evaluate('foosuffix', 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
custom message
Failed asserting that 'foosuffix' ends not with "suffix".

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintArrayContainsCheckForObjectIdentity()
    {
        
        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_TraversableContains('foo', true, true);

        $this->assertFalse($Veup52kdjcwg->evaluate(array(0), '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate(array(true), '', true));

        
        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_TraversableContains('foo');

        $this->assertTrue($Veup52kdjcwg->evaluate(array(0), '', true));
        $this->assertTrue($Veup52kdjcwg->evaluate(array(true), '', true));
    }

    
    public function testConstraintArrayContains()
    {
        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_TraversableContains('foo');

        $this->assertFalse($Veup52kdjcwg->evaluate(array('bar'), '', true));
        $this->assertTrue($Veup52kdjcwg->evaluate(array('foo'), '', true));
        $this->assertEquals("contains 'foo'", $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate(array('bar'));
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that an array contains 'foo'.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintArrayContains2()
    {
        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_TraversableContains('foo');

        try {
            $Veup52kdjcwg->evaluate(array('bar'), 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
custom message
Failed asserting that an array contains 'foo'.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintArrayNotContains()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          new PHPUnit_Framework_Constraint_TraversableContains('foo')
        );

        $this->assertTrue($Veup52kdjcwg->evaluate(array('bar'), '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate(array('foo'), '', true));
        $this->assertEquals("does not contain 'foo'", $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate(array('foo'));
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that an array does not contain 'foo'.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintArrayNotContains2()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          new PHPUnit_Framework_Constraint_TraversableContains('foo')
        );

        try {
            $Veup52kdjcwg->evaluate(array('foo'), 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
custom message
Failed asserting that an array does not contain 'foo'.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintSplObjectStorageContains()
    {
        $Vbj3pw2f5egf     = new StdClass;
        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_TraversableContains($Vbj3pw2f5egf);
        $this->assertStringMatchesFormat('contains stdClass Object &%s ()', $Veup52kdjcwg->toString());

        $Vqictfcp0llj = new SplObjectStorage;
        $this->assertFalse($Veup52kdjcwg->evaluate($Vqictfcp0llj, '', true));

        $Vqictfcp0llj->attach($Vbj3pw2f5egf);
        $this->assertTrue($Veup52kdjcwg->evaluate($Vqictfcp0llj, '', true));

        try {
            $Veup52kdjcwg->evaluate(new SplObjectStorage);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertStringMatchesFormat(
              <<<EOF
Failed asserting that a traversable contains stdClass Object &%x ().

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintSplObjectStorageContains2()
    {
        $Vbj3pw2f5egf     = new StdClass;
        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_TraversableContains($Vbj3pw2f5egf);

        try {
            $Veup52kdjcwg->evaluate(new SplObjectStorage, 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertStringMatchesFormat(
              <<<EOF
custom message
Failed asserting that a traversable contains stdClass Object &%x ().

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testAttributeEqualTo()
    {
        $Vbj3pw2f5egf     = new ClassWithNonPublicAttributes;
        $Veup52kdjcwg = PHPUnit_Framework_Assert::attributeEqualTo('foo', 1);

        $this->assertTrue($Veup52kdjcwg->evaluate($Vbj3pw2f5egf, '', true));
        $this->assertEquals('attribute "foo" is equal to 1', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        $Veup52kdjcwg = PHPUnit_Framework_Assert::attributeEqualTo('foo', 2);

        $this->assertFalse($Veup52kdjcwg->evaluate($Vbj3pw2f5egf, '', true));

        try {
            $Veup52kdjcwg->evaluate($Vbj3pw2f5egf);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that attribute "foo" is equal to 2.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testAttributeEqualTo2()
    {
        $Vbj3pw2f5egf     = new ClassWithNonPublicAttributes;
        $Veup52kdjcwg = PHPUnit_Framework_Assert::attributeEqualTo('foo', 2);

        try {
            $Veup52kdjcwg->evaluate($Vbj3pw2f5egf, 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
custom message\nFailed asserting that attribute "foo" is equal to 2.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testAttributeNotEqualTo()
    {
        $Vbj3pw2f5egf     = new ClassWithNonPublicAttributes;
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::attributeEqualTo('foo', 2)
        );

        $this->assertTrue($Veup52kdjcwg->evaluate($Vbj3pw2f5egf, '', true));
        $this->assertEquals('attribute "foo" is not equal to 2', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::attributeEqualTo('foo', 1)
        );

        $this->assertFalse($Veup52kdjcwg->evaluate($Vbj3pw2f5egf, '', true));

        try {
            $Veup52kdjcwg->evaluate($Vbj3pw2f5egf);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that attribute "foo" is not equal to 1.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testAttributeNotEqualTo2()
    {
        $Vbj3pw2f5egf     = new ClassWithNonPublicAttributes;
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          PHPUnit_Framework_Assert::attributeEqualTo('foo', 1)
        );

        try {
            $Veup52kdjcwg->evaluate($Vbj3pw2f5egf, 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
custom message\nFailed asserting that attribute "foo" is not equal to 1.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintIsEmpty()
    {
        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_IsEmpty;

        $this->assertFalse($Veup52kdjcwg->evaluate(array('foo'), '', true));
        $this->assertTrue($Veup52kdjcwg->evaluate(array(), '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate(new ArrayObject(array('foo')), '', true));
        $this->assertTrue($Veup52kdjcwg->evaluate(new ArrayObject(array()), '', true));
        $this->assertEquals('is empty', $Veup52kdjcwg->toString());
        $this->assertEquals(1, count($Veup52kdjcwg));

        try {
            $Veup52kdjcwg->evaluate(array('foo'));
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that an array is empty.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintIsEmpty2()
    {
        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_IsEmpty;

        try {
            $Veup52kdjcwg->evaluate(array('foo'), 'custom message');
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
custom message\nFailed asserting that an array is empty.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintCountWithAnArray()
    {
        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Count(5);

        $this->assertTrue($Veup52kdjcwg->evaluate(array(1, 2, 3, 4, 5), '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate(array(1, 2, 3, 4), '', true));
    }

    
    public function testConstraintCountWithAnIteratorWhichDoesNotImplementCountable()
    {
        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Count(5);

        $this->assertTrue($Veup52kdjcwg->evaluate(new TestIterator(array(1, 2, 3, 4, 5)), '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate(new TestIterator(array(1, 2, 3, 4)), '', true));
    }

    
    public function testConstraintCountWithAnObjectImplementingCountable()
    {
        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Count(5);

        $this->assertTrue($Veup52kdjcwg->evaluate(new ArrayObject(array(1, 2, 3, 4, 5)), '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate(new ArrayObject(array(1, 2, 3, 4)), '', true));
    }

    
    public function testConstraintCountFailing()
    {
        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Count(5);

        try {
            $Veup52kdjcwg->evaluate(array(1, 2));
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that actual size 2 matches expected size 5.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintNotCountFailing()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          new PHPUnit_Framework_Constraint_Count(2)
        );

        try {
            $Veup52kdjcwg->evaluate(array(1, 2));
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that actual size 2 does not match expected size 2.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintSameSizeWithAnArray()
    {
        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_SameSize(array(1, 2, 3, 4, 5));

        $this->assertTrue($Veup52kdjcwg->evaluate(array(6, 7, 8, 9, 10), '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate(array(1, 2, 3, 4), '', true));
    }

    
    public function testConstraintSameSizeWithAnIteratorWhichDoesNotImplementCountable()
    {
        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_SameSize(new TestIterator(array(1, 2, 3, 4, 5)));

        $this->assertTrue($Veup52kdjcwg->evaluate(new TestIterator(array(6, 7, 8, 9, 10)), '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate(new TestIterator(array(1, 2, 3, 4)), '', true));
    }

    
    public function testConstraintSameSizeWithAnObjectImplementingCountable()
    {
        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_SameSize(new ArrayObject(array(1, 2, 3, 4, 5)));

        $this->assertTrue($Veup52kdjcwg->evaluate(new ArrayObject(array(6, 7, 8, 9, 10)), '', true));
        $this->assertFalse($Veup52kdjcwg->evaluate(new ArrayObject(array(1, 2, 3, 4)), '', true));
    }

    
    public function testConstraintSameSizeFailing()
    {
        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_SameSize(array(1, 2, 3, 4, 5));

        try {
            $Veup52kdjcwg->evaluate(array(1, 2));
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that actual size 2 matches expected size 5.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintNotSameSizeFailing()
    {
        $Veup52kdjcwg = PHPUnit_Framework_Assert::logicalNot(
          new PHPUnit_Framework_Constraint_SameSize(array(1, 2))
        );

        try {
            $Veup52kdjcwg->evaluate(array(3, 4));
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that actual size 2 does not match expected size 2.

EOF
              ,
              PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    public function testConstraintException()
    {
        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Exception('FoobarException');
        $Vpt32vvhspnvxception  = new DummyException('Test');
        $Vtma1iwwpdrk = $Vpt32vvhspnvxception->getTraceAsString();

        try {
            $Veup52kdjcwg->evaluate($Vpt32vvhspnvxception);
        } catch (PHPUnit_Framework_ExpectationFailedException $Vpt32vvhspnv) {
            $this->assertEquals(
              <<<EOF
Failed asserting that exception of type "DummyException" matches expected exception "FoobarException". Message was: "Test" at
$Vtma1iwwpdrk.

EOF
                ,
                PHPUnit_Framework_TestFailure::exceptionToString($Vpt32vvhspnv)
            );

            return;
        }

        $this->fail();
    }

    
    private function trimnl($Ve5tcsso230g)
    {
        return preg_replace('/[ ]*\n/', "\n", $Ve5tcsso230g);
    }
}
