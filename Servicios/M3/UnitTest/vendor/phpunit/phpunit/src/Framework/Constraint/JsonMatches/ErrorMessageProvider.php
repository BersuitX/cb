<?php



class PHPUnit_Framework_Constraint_JsonMatches_ErrorMessageProvider
{
    
    public static function determineJsonError($Vpsm42ro4mkq, $V2hf2uebv5m0 = '')
    {
        switch ($Vpsm42ro4mkq) {
            case JSON_ERROR_NONE:
                return;
            case JSON_ERROR_DEPTH:
                return $V2hf2uebv5m0 . 'Maximum stack depth exceeded';
            case JSON_ERROR_STATE_MISMATCH:
                return $V2hf2uebv5m0 . 'Underflow or the modes mismatch';
            case JSON_ERROR_CTRL_CHAR:
                return $V2hf2uebv5m0 . 'Unexpected control character found';
            case JSON_ERROR_SYNTAX:
                return $V2hf2uebv5m0 . 'Syntax error, malformed JSON';
            case JSON_ERROR_UTF8:
                return $V2hf2uebv5m0 . 'Malformed UTF-8 characters, possibly incorrectly encoded';
            default:
                return $V2hf2uebv5m0 . 'Unknown error';
        }
    }

    
    public static function translateTypeToPrefix($V31qrja1w0r2)
    {
        switch (strtolower($V31qrja1w0r2)) {
            case 'expected':
                $V2hf2uebv5m0 = 'Expected value JSON decode error - ';
                break;
            case 'actual':
                $V2hf2uebv5m0 = 'Actual value JSON decode error - ';
                break;
            default:
                $V2hf2uebv5m0 = '';
                break;
        }

        return $V2hf2uebv5m0;
    }
}
