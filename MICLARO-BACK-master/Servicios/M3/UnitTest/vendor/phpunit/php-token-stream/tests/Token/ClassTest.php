<?php



class PHP_Token_ClassTest extends PHPUnit_Framework_TestCase
{
    protected $Vqmu1sajhgfn;
    protected $Vi5khqarjczp;

    protected function setUp()
    {
        $Vxbfts1p2jxd = new PHP_Token_Stream(TEST_FILES_PATH . 'source2.php');

        foreach ($Vxbfts1p2jxd as $Vx5bl5ubgnhj) {
            if ($Vx5bl5ubgnhj instanceof PHP_Token_CLASS) {
                $this->class = $Vx5bl5ubgnhj;
            }

            if ($Vx5bl5ubgnhj instanceof PHP_Token_FUNCTION) {
                $this->function = $Vx5bl5ubgnhj;
                break;
            }
        }
    }

    
    public function testGetClassKeywords()
    {
        $this->assertEquals('abstract', $this->class->getKeywords());
    }

    
    public function testGetFunctionKeywords()
    {
        $this->assertEquals('abstract,static', $this->function->getKeywords());
    }

    
    public function testGetFunctionVisibility()
    {
        $this->assertEquals('public', $this->function->getVisibility());
    }

    public function testIssue19()
    {
        $Vxbfts1p2jxd = new PHP_Token_Stream(TEST_FILES_PATH . 'issue19.php');

        foreach ($Vxbfts1p2jxd as $Vx5bl5ubgnhj) {
            if ($Vx5bl5ubgnhj instanceof PHP_Token_CLASS) {
                $this->assertFalse($Vx5bl5ubgnhj->hasInterfaces());
            }
        }
    }

    public function testIssue30()
    {
        $Vxbfts1p2jxd = new PHP_Token_Stream(TEST_FILES_PATH . 'issue30.php');
        $this->assertCount(1, $Vxbfts1p2jxd->getClasses());
    }

    
    public function testAnonymousClassesAreHandledCorrectly()
    {
        $Vxbfts1p2jxd = new PHP_Token_Stream(TEST_FILES_PATH . 'class_with_method_that_declares_anonymous_class.php');

        $Vqmu1sajhgfnes = $Vxbfts1p2jxd->getClasses();

        $this->assertEquals(array('class_with_method_that_declares_anonymous_class'), array_keys($Vqmu1sajhgfnes));
    }

    
    public function testAnonymousClassesAreHandledCorrectly2()
    {
        $Vxbfts1p2jxd = new PHP_Token_Stream(TEST_FILES_PATH . 'class_with_method_that_declares_anonymous_class2.php');

        $Vqmu1sajhgfnes = $Vxbfts1p2jxd->getClasses();

        $this->assertEquals(array('Test'), array_keys($Vqmu1sajhgfnes));
        $this->assertEquals(array('methodOne', 'methodTwo'), array_keys($Vqmu1sajhgfnes['Test']['methods']));

        $this->assertEmpty($Vxbfts1p2jxd->getFunctions());
    }

    
    public function testImportedFunctionsAreHandledCorrectly()
    {
        $Vxbfts1p2jxd = new PHP_Token_Stream(TEST_FILES_PATH . 'classUsesNamespacedFunction.php');

        $this->assertEmpty($Vxbfts1p2jxd->getFunctions());
        $this->assertCount(1, $Vxbfts1p2jxd->getClasses());
    }
}
