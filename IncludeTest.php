<?php



class PHP_Token_IncludeTest extends PHPUnit_Framework_TestCase
{
    protected $Vxbfts1p2jxd;

    protected function setUp()
    {
        $this->ts = new PHP_Token_Stream(TEST_FILES_PATH . 'source3.php');
    }

    
    public function testGetIncludes()
    {
        $this->assertSame(
          array('test4.php', 'test3.php', 'test2.php', 'test1.php'),
          $this->ts->getIncludes()
        );
    }

    
    public function testGetIncludesCategorized()
    {
        $this->assertSame(
          array(
            'require_once' => array('test4.php'),
            'require'      => array('test3.php'),
            'include_once' => array('test2.php'),
            'include'      => array('test1.php')
          ),
          $this->ts->getIncludes(TRUE)
        );
    }

    
    public function testGetIncludesCategory()
    {
        $this->assertSame(
          array('test4.php'),
          $this->ts->getIncludes(TRUE, 'require_once')
        );
    }
}
