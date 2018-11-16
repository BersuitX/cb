<?php



class Framework_Constraint_JsonMatches_ErrorMessageProviderTest extends PHPUnit_Framework_TestCase
{
    
    public function testTranslateTypeToPrefix($Vwcb1oykhumm, $V31qrja1w0r2)
    {
        $this->assertEquals(
            $Vwcb1oykhumm,
            PHPUnit_Framework_Constraint_JsonMatches_ErrorMessageProvider::translateTypeToPrefix($V31qrja1w0r2)
        );
    }

    
    public function testDetermineJsonError($Vwcb1oykhumm, $Vpsm42ro4mkq, $V2hf2uebv5m0)
    {
        $this->assertEquals(
            $Vwcb1oykhumm,
            PHPUnit_Framework_Constraint_JsonMatches_ErrorMessageProvider::determineJsonError(
                $Vpsm42ro4mkq,
                $V2hf2uebv5m0
            )
        );
    }

    public static function determineJsonErrorDataprovider()
    {
        return array(
            'JSON_ERROR_NONE'  => array(
                null, 'json_error_none', ''
            ),
            'JSON_ERROR_DEPTH' => array(
                'Maximum stack depth exceeded', JSON_ERROR_DEPTH, ''
            ),
            'prefixed JSON_ERROR_DEPTH' => array(
                'TUX: Maximum stack depth exceeded', JSON_ERROR_DEPTH, 'TUX: '
            ),
            'JSON_ERROR_STATE_MISMatch' => array(
                'Underflow or the modes mismatch', JSON_ERROR_STATE_MISMATCH, ''
            ),
            'JSON_ERROR_CTRL_CHAR' => array(
                'Unexpected control character found', JSON_ERROR_CTRL_CHAR, ''
            ),
            'JSON_ERROR_SYNTAX' => array(
                'Syntax error, malformed JSON', JSON_ERROR_SYNTAX, ''
            ),
            'JSON_ERROR_UTF8`' => array(
                'Malformed UTF-8 characters, possibly incorrectly encoded',
                JSON_ERROR_UTF8,
                ''
            ),
            'Invalid error indicator' => array(
                'Unknown error', 55, ''
            ),
        );
    }

    public static function translateTypeToPrefixDataprovider()
    {
        return array(
            'expected' => array('Expected value JSON decode error - ', 'expected'),
            'actual'   => array('Actual value JSON decode error - ', 'actual'),
            'default'  => array('', ''),
        );
    }
}
