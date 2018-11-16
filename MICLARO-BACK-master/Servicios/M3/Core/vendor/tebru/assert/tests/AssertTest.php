<?php


namespace Tebru\Test;

use PHPUnit_Framework_TestCase;
use Tebru;


class AssertTest extends PHPUnit_Framework_TestCase
{
    
    public function testAssertConditionFalse()
    {
        Tebru\assert(false);
    }

    public function testAssertConditionTrue()
    {
        $this->assertNull(Tebru\assert(true));
    }

    
    public function testAssertConditionChangeException()
    {
        $Vvs0hc5bhqj3 = [0];
        Tebru\assert(isset($Vvs0hc5bhqj3['key']), new \OutOfRangeException('My test message'));
    }

    
    public function testAssertThatConditionFalse()
    {
        Tebru\assertThat(false);
    }

    public function testAssertThatConditionTrue()
    {
        $this->assertNull(Tebru\assertThat(true));
    }

    
    public function testAssertThatConditionMessage()
    {
        Tebru\assertThat(false, 'My %s message', 'test');
    }

    
    public function testAssertEqualFalse()
    {
        Tebru\assertEqual(1, 2);
    }

    public function testAssertEqualTrue()
    {
        $this->assertNull(Tebru\assertEqual(1, '1'));
    }

    
    public function testAssertEqualMessage()
    {
        Tebru\assertEqual(1, 2, 'My %s message', 'test');
    }

    
    public function testAssertNotEqualFalse()
    {
        Tebru\assertNotEqual(1, '1');
    }

    public function testAssertNotEqualTrue()
    {
        $this->assertNull(Tebru\assertNotEqual(1, 2));
    }

    
    public function testAssertNotEqualMessage()
    {
        Tebru\assertNotEqual(1, '1', 'My %s message', 'test');
    }

    
    public function testAssertSameFalse()
    {
        Tebru\assertSame(1, '1');
    }

    public function testAssertSameTrue()
    {
        $this->assertNull(Tebru\assertSame(1, 1));
    }

    
    public function testAssertSameMessage()
    {
        Tebru\assertSame(1, 2, 'My %s message', 'test');
    }

    
    public function testAssertNotSameFalse()
    {
        Tebru\assertNotSame(1, 1);
    }

    public function testAssertNotSameTrue()
    {
        $this->assertNull(Tebru\assertNotSame(1, '1'));
    }

    
    public function testAssertNotSameMessage()
    {
        Tebru\assertNotSame(1, 1, 'My %s message', 'test');
    }

    
    public function testAssertTrueFalse()
    {
        Tebru\assertTrue(false);
    }

    public function testAssertTrueTrue()
    {
        $this->assertNull(Tebru\assertTrue(true));
    }

    
    public function testAssertTrueMessage()
    {
        Tebru\assertTrue(false, 'My %s message', 'test');
    }

    
    public function testAssertFalseFalse()
    {
        Tebru\assertFalse(true);
    }

    public function testAssertFalseTrue()
    {
        $this->assertNull(Tebru\assertFalse(false));
    }

    
    public function testAssertFalseMessage()
    {
        Tebru\assertFalse(true, 'My %s message', 'test');
    }

    
    public function testAssertNullFalse()
    {
        Tebru\assertNull(1);
    }

    public function testAssertNullTrue()
    {
        $this->assertNull(Tebru\assertNull(null));
    }

    
    public function testAssertNullMessage()
    {
        Tebru\assertNull(1, 'My %s message', 'test');
    }

    
    public function testAssertNotNullFalse()
    {
        Tebru\assertNotNull(null);
    }

    public function testAssertNotNullTrue()
    {
        $this->assertNull(Tebru\assertNotNull(1));
    }

    
    public function testAssertNotNullMessage()
    {
        Tebru\assertNotNull(null, 'My %s message', 'test');
    }

    
    public function testAssertArrayKeyExistsFalse()
    {
        $Vvs0hc5bhqj3[] = 'test';
        Tebru\assertArrayKeyExists(1, $Vvs0hc5bhqj3);
    }

    public function testAssertArrayKeyExistsTrue()
    {
        $Vvs0hc5bhqj3[] = 'test';
        $this->assertNull(Tebru\assertArrayKeyExists(0, $Vvs0hc5bhqj3));
    }

    
    public function testAssertArrayKeyExistsMessage()
    {
        $Vvs0hc5bhqj3[] = 'test';
        Tebru\assertArrayKeyExists(1, $Vvs0hc5bhqj3, 'My %s message', 'test');
    }

    
    public function testAssertArrayKeyNotExistsFalse()
    {
        $Vvs0hc5bhqj3[] = 'test';
        Tebru\assertArrayKeyNotExists(0, $Vvs0hc5bhqj3);
    }

    public function testAssertArrayKeyNotExistsTrue()
    {
        $Vvs0hc5bhqj3[] = 'test';
        $this->assertNull(Tebru\assertArrayKeyNotExists(1, $Vvs0hc5bhqj3));
    }

    
    public function testAssertArrayKeyNotExistsMessage()
    {
        $Vvs0hc5bhqj3[] = 'test';
        Tebru\assertArrayKeyNotExists(0, $Vvs0hc5bhqj3, 'My %s message', 'test');
    }

    
    public function testAssertCountFalse()
    {
        $Vvs0hc5bhqj3[] = 'test';
        Tebru\assertCount(0, $Vvs0hc5bhqj3);
    }

    public function testAssertCountTrue()
    {
        $Vvs0hc5bhqj3[] = 'test';
        $this->assertNull(Tebru\assertCount(1, $Vvs0hc5bhqj3));
    }

    
    public function testAssertCountMessage()
    {
        $Vvs0hc5bhqj3[] = 'test';
        Tebru\assertCount(0, $Vvs0hc5bhqj3, 'My %s message', 'test');
    }
}
