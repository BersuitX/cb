<?php



class PHP_Token_ClosureTest extends PHPUnit_Framework_TestCase
{
    protected $V1smq0dxjwv1;

    protected function setUp()
    {
        $Vxbfts1p2jxd = new PHP_Token_Stream(TEST_FILES_PATH . 'closure.php');

        foreach ($Vxbfts1p2jxd as $Vx5bl5ubgnhj) {
            if ($Vx5bl5ubgnhj instanceof PHP_Token_FUNCTION) {
                $this->functions[] = $Vx5bl5ubgnhj;
            }
        }
    }

    
    public function testGetArguments()
    {
        $this->assertEquals(array('$Vrqaitdc0ft3' => null, '$Vwatlmbamu3p' => null), $this->functions[0]->getArguments());
        $this->assertEquals(array('$Vrqaitdc0ft3' => 'Foo', '$Vwatlmbamu3p' => null), $this->functions[1]->getArguments());
        $this->assertEquals(array('$Vrqaitdc0ft3' => null, '$Vwatlmbamu3p' => null, '$Vk14lfna30ac' => null), $this->functions[2]->getArguments());
        $this->assertEquals(array('$Vrqaitdc0ft3' => 'Foo', '$Vwatlmbamu3p' => null, '$Vk14lfna30ac' => null), $this->functions[3]->getArguments());
        $this->assertEquals(array(), $this->functions[4]->getArguments());
        $this->assertEquals(array(), $this->functions[5]->getArguments());
    }

    
    public function testGetName()
    {
        $this->assertEquals('anonymous function', $this->functions[0]->getName());
        $this->assertEquals('anonymous function', $this->functions[1]->getName());
        $this->assertEquals('anonymous function', $this->functions[2]->getName());
        $this->assertEquals('anonymous function', $this->functions[3]->getName());
        $this->assertEquals('anonymous function', $this->functions[4]->getName());
        $this->assertEquals('anonymous function', $this->functions[5]->getName());
    }

    
    public function testGetLine()
    {
        $this->assertEquals(2, $this->functions[0]->getLine());
        $this->assertEquals(3, $this->functions[1]->getLine());
        $this->assertEquals(4, $this->functions[2]->getLine());
        $this->assertEquals(5, $this->functions[3]->getLine());
    }

    
    public function testGetEndLine()
    {
        $this->assertEquals(2, $this->functions[0]->getLine());
        $this->assertEquals(3, $this->functions[1]->getLine());
        $this->assertEquals(4, $this->functions[2]->getLine());
        $this->assertEquals(5, $this->functions[3]->getLine());
    }
}
