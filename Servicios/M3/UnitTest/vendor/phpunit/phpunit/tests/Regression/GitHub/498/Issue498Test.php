<?php

class Issue498Test extends PHPUnit_Framework_TestCase
{
    
    public function shouldBeTrue($Vkjxtxkqa4lw)
    {
        $this->assertTrue(true);
    }

    
    public function shouldBeFalse($Vkjxtxkqa4lw)
    {
        $this->assertFalse(false);
    }

    public function shouldBeTrueDataProvider()
    {

        
        return array(
            array(true),
            array(false)
        );
    }

    public function shouldBeFalseDataProvider()
    {
        throw new Exception("Can't create the data");

        return array(
            array(true),
            array(false)
        );
    }
}
