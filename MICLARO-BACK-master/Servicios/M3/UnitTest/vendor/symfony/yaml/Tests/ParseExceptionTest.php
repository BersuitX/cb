<?php



namespace Symfony\Component\Yaml\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Exception\ParseException;

class ParseExceptionTest extends TestCase
{
    public function testGetMessage()
    {
        $Vzzme31ixifp = new ParseException('Error message', 42, 'foo: bar', '/var/www/app/config.yml');
        $Vbl4yrmdan1y = 'Error message in "/var/www/app/config.yml" at line 42 (near "foo: bar")';

        $this->assertEquals($Vbl4yrmdan1y, $Vzzme31ixifp->getMessage());
    }

    public function testGetMessageWithUnicodeInFilename()
    {
        $Vzzme31ixifp = new ParseException('Error message', 42, 'foo: bar', 'äöü.yml');
        $Vbl4yrmdan1y = 'Error message in "äöü.yml" at line 42 (near "foo: bar")';

        $this->assertEquals($Vbl4yrmdan1y, $Vzzme31ixifp->getMessage());
    }
}
