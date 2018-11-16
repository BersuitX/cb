<?php



class Framework_Constraint_JsonMatchesTest extends PHPUnit_Framework_TestCase
{
    
    public function testEvaluate($Vwcb1oykhumm, $Vaoabxwqtbxj, $V2w1mv11vnp4)
    {
        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_JsonMatches($V2w1mv11vnp4);
        $this->assertEquals($Vwcb1oykhumm, $Veup52kdjcwg->evaluate($Vaoabxwqtbxj, '', true));
    }

    
    public function testToString()
    {
        $V2w1mv11vnp4  = json_encode(array('Mascott' => 'Tux'));
        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_JsonMatches($V2w1mv11vnp4);

        $this->assertEquals('matches JSON string "' . $V2w1mv11vnp4 . '"', $Veup52kdjcwg->toString());
    }

    public static function evaluateDataprovider()
    {
        return array(
            'valid JSON'                          => array(true, json_encode(array('Mascott'                           => 'Tux')), json_encode(array('Mascott'                           => 'Tux'))),
            'error syntax'                        => array(false, '{"Mascott"::}', json_encode(array('Mascott'         => 'Tux'))),
            'error UTF-8'                         => array(false, json_encode('\xB1\x31'), json_encode(array('Mascott' => 'Tux'))),
            'invalid JSON in class instantiation' => array(false, json_encode(array('Mascott'                          => 'Tux')), '{"Mascott"::}'),
        );
    }
}
