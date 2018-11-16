<?php



class Util_GlobalStateTest extends PHPUnit_Framework_TestCase
{
    
    public function testIncludedFilesAsStringSkipsVfsProtocols()
    {
        $Vb3iift025ov   = __DIR__;
        $V5s0rodgwwbv = array(
            'phpunit', 
            $Vb3iift025ov . '/ConfigurationTest.php',
            $Vb3iift025ov . '/GlobalStateTest.php',
            'vfs://' . $Vb3iift025ov . '/RegexTest.php',
            'phpvfs53e46260465c7://' . $Vb3iift025ov . '/TestTest.php',
            'file://' . $Vb3iift025ov . '/XMLTest.php'
        );

        $this->assertEquals(
            "require_once '" . $Vb3iift025ov . "/ConfigurationTest.php';\n" .
            "require_once '" . $Vb3iift025ov . "/GlobalStateTest.php';\n" .
            "require_once 'file://" . $Vb3iift025ov . "/XMLTest.php';\n", PHPUnit_Util_GlobalState::processIncludedFilesAsString($V5s0rodgwwbv));
    }
}
