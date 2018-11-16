<?php



class Util_GetoptTest extends PHPUnit_Framework_TestCase
{
    public function testItIncludeTheLongOptionsAfterTheArgument()
    {
        $Veox3iprl5oz = array(
            'command',
            'myArgument',
            '--colors',
        );
        $Vs4nw03sqcam = PHPUnit_Util_Getopt::getopt($Veox3iprl5oz, '', array('colors=='));

        $Vwcb1oykhumm = array(
            array(
                array(
                    '--colors',
                    null,
                ),
            ),
            array(
                'myArgument',
            ),
        );

        $this->assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam);
    }

    public function testItIncludeTheShortOptionsAfterTheArgument()
    {
        $Veox3iprl5oz = array(
            'command',
            'myArgument',
            '-v',
        );
        $Vs4nw03sqcam = PHPUnit_Util_Getopt::getopt($Veox3iprl5oz, 'v');

        $Vwcb1oykhumm = array(
            array(
                array(
                    'v',
                    null,
                ),
            ),
            array(
                'myArgument',
            ),
        );

        $this->assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam);
    }
}
