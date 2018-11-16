<?php



class PHP_Token_FunctionTest extends PHPUnit_Framework_TestCase
{
    protected $V1smq0dxjwv1;

    protected function setUp()
    {
        $Vxbfts1p2jxd = new PHP_Token_Stream(TEST_FILES_PATH . 'source.php');

        foreach ($Vxbfts1p2jxd as $Vx5bl5ubgnhj) {
            if ($Vx5bl5ubgnhj instanceof PHP_Token_FUNCTION) {
                $this->functions[] = $Vx5bl5ubgnhj;
            }
        }
    }

    
    public function testGetArguments()
    {
        $this->assertEquals(array(), $this->functions[0]->getArguments());

        $this->assertEquals(
          array('$Vk14lfna30ac' => 'Baz'), $this->functions[1]->getArguments()
        );

        $this->assertEquals(
          array('$Vmeq3jxx1mos' => 'Foobar'), $this->functions[2]->getArguments()
        );

        $this->assertEquals(
          array('$Vd425xtln13i' => 'Barfoo'), $this->functions[3]->getArguments()
        );

        $this->assertEquals(array(), $this->functions[4]->getArguments());

        $this->assertEquals(array('$Voozl3vb2soz' => null, '$Vxh3xyx0g4ym' => null), $this->functions[5]->getArguments());
    }

    
    public function testGetName()
    {
        $this->assertEquals('foo', $this->functions[0]->getName());
        $this->assertEquals('bar', $this->functions[1]->getName());
        $this->assertEquals('foobar', $this->functions[2]->getName());
        $this->assertEquals('barfoo', $this->functions[3]->getName());
        $this->assertEquals('baz', $this->functions[4]->getName());
    }

    
    public function testGetLine()
    {
        $this->assertEquals(5, $this->functions[0]->getLine());
        $this->assertEquals(10, $this->functions[1]->getLine());
        $this->assertEquals(17, $this->functions[2]->getLine());
        $this->assertEquals(21, $this->functions[3]->getLine());
        $this->assertEquals(29, $this->functions[4]->getLine());
    }

    
    public function testGetEndLine()
    {
        $this->assertEquals(5, $this->functions[0]->getEndLine());
        $this->assertEquals(12, $this->functions[1]->getEndLine());
        $this->assertEquals(19, $this->functions[2]->getEndLine());
        $this->assertEquals(23, $this->functions[3]->getEndLine());
        $this->assertEquals(31, $this->functions[4]->getEndLine());
    }

    
    public function testGetDocblock()
    {
        $this->assertNull($this->functions[0]->getDocblock());

        $this->assertEquals(
          "/**\n     * @param Baz \$Vk14lfna30ac\n     */",
          $this->functions[1]->getDocblock()
        );

        $this->assertEquals(
          "/**\n     * @param Foobar \$Vmeq3jxx1mos\n     */",
          $this->functions[2]->getDocblock()
        );

        $this->assertNull($this->functions[3]->getDocblock());
        $this->assertNull($this->functions[4]->getDocblock());
    }

    public function testSignature()
    {
        $Vxbfts1p2jxd = new PHP_Token_Stream(TEST_FILES_PATH . 'source5.php');
        $Vei44fs011eo  = $Vxbfts1p2jxd->getFunctions();
        $Vibefsvmlpru  = $Vxbfts1p2jxd->getClasses();
        $Vxja1abp34yq  = $Vxbfts1p2jxd->getInterfaces();

        $this->assertEquals(
          'foo($Vmbzc5xgwrgo, array $Vglk1nbl1t2o, array $Vibefsvmlpru = array())',
          $Vei44fs011eo['foo']['signature']
        );

        $this->assertEquals(
          'm($Vmbzc5xgwrgo, array $Vglk1nbl1t2o, array $Vibefsvmlpru = array())',
          $Vibefsvmlpru['c']['methods']['m']['signature']
        );

        $this->assertEquals(
          'm($Vmbzc5xgwrgo, array $Vglk1nbl1t2o, array $Vibefsvmlpru = array())',
          $Vibefsvmlpru['a']['methods']['m']['signature']
        );

        $this->assertEquals(
          'm($Vmbzc5xgwrgo, array $Vglk1nbl1t2o, array $Vibefsvmlpru = array())',
          $Vxja1abp34yq['i']['methods']['m']['signature']
        );
    }
}
