<?php


namespace SebastianBergmann\GlobalState;

use PHPUnit_Framework_TestCase;


class BlacklistTest extends PHPUnit_Framework_TestCase
{
    
    private $Vn54eydon0cr;

    protected function setUp()
    {
        $this->blacklist = new Blacklist;
    }

    public function testGlobalVariableThatIsNotBlacklistedIsNotTreatedAsBlacklisted()
    {
        $this->assertFalse($this->blacklist->isGlobalVariableBlacklisted('variable'));
    }

    public function testGlobalVariableCanBeBlacklisted()
    {
        $this->blacklist->addGlobalVariable('variable');

        $this->assertTrue($this->blacklist->isGlobalVariableBlacklisted('variable'));
    }

    public function testStaticAttributeThatIsNotBlacklistedIsNotTreatedAsBlacklisted()
    {
        $this->assertFalse(
            $this->blacklist->isStaticAttributeBlacklisted(
                'SebastianBergmann\GlobalState\TestFixture\BlacklistedClass',
                'attribute'
            )
        );
    }

    public function testClassCanBeBlacklisted()
    {
        $this->blacklist->addClass('SebastianBergmann\GlobalState\TestFixture\BlacklistedClass');

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
                'SebastianBergmann\GlobalState\TestFixture\BlacklistedClass',
                'attribute'
            )
        );
    }

    public function testSubclassesCanBeBlacklisted()
    {
        $this->blacklist->addSubclassesOf('SebastianBergmann\GlobalState\TestFixture\BlacklistedClass');

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
                'SebastianBergmann\GlobalState\TestFixture\BlacklistedChildClass',
                'attribute'
            )
        );
    }

    public function testImplementorsCanBeBlacklisted()
    {
        $this->blacklist->addImplementorsOf('SebastianBergmann\GlobalState\TestFixture\BlacklistedInterface');

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
                'SebastianBergmann\GlobalState\TestFixture\BlacklistedImplementor',
                'attribute'
            )
        );
    }

    public function testClassNamePrefixesCanBeBlacklisted()
    {
        $this->blacklist->addClassNamePrefix('SebastianBergmann\GlobalState');

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
                'SebastianBergmann\GlobalState\TestFixture\BlacklistedClass',
                'attribute'
            )
        );
    }

    public function testStaticAttributeCanBeBlacklisted()
    {
        $this->blacklist->addStaticAttribute(
            'SebastianBergmann\GlobalState\TestFixture\BlacklistedClass',
            'attribute'
        );

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
                'SebastianBergmann\GlobalState\TestFixture\BlacklistedClass',
                'attribute'
            )
        );
    }
}
