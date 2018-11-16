<?php



class PHP_Token_NamespaceTest extends PHPUnit_Framework_TestCase
{
    
    public function testGetName()
    {
        $Veoixhj3ick2 = new PHP_Token_Stream(
          TEST_FILES_PATH . 'classInNamespace.php'
        );

        foreach ($Veoixhj3ick2 as $Vx5bl5ubgnhj) {
            if ($Vx5bl5ubgnhj instanceof PHP_Token_NAMESPACE) {
                $this->assertSame('Foo\\Bar', $Vx5bl5ubgnhj->getName());
            }
        }
    }

    public function testGetStartLineWithUnscopedNamespace()
    {
        $Veoixhj3ick2 = new PHP_Token_Stream(TEST_FILES_PATH . 'classInNamespace.php');
        foreach($Veoixhj3ick2 as $Vx5bl5ubgnhj) {
            if($Vx5bl5ubgnhj instanceOf PHP_Token_NAMESPACE) {
                $this->assertSame(2, $Vx5bl5ubgnhj->getLine());
            }
        }
    }

    public function testGetEndLineWithUnscopedNamespace()
    {
        $Veoixhj3ick2 = new PHP_Token_Stream(TEST_FILES_PATH . 'classInNamespace.php');
        foreach($Veoixhj3ick2 as $Vx5bl5ubgnhj) {
            if($Vx5bl5ubgnhj instanceOf PHP_Token_NAMESPACE) {
                $this->assertSame(2, $Vx5bl5ubgnhj->getEndLine());
            }
        }
    }
    public function testGetStartLineWithScopedNamespace()
    {
        $Veoixhj3ick2 = new PHP_Token_Stream(TEST_FILES_PATH . 'classInScopedNamespace.php');
        foreach($Veoixhj3ick2 as $Vx5bl5ubgnhj) {
            if($Vx5bl5ubgnhj instanceOf PHP_Token_NAMESPACE) {
                $this->assertSame(2, $Vx5bl5ubgnhj->getLine());
            }
        }
    }

    public function testGetEndLineWithScopedNamespace()
    {
        $Veoixhj3ick2 = new PHP_Token_Stream(TEST_FILES_PATH . 'classInScopedNamespace.php');
        foreach($Veoixhj3ick2 as $Vx5bl5ubgnhj) {
            if($Vx5bl5ubgnhj instanceOf PHP_Token_NAMESPACE) {
                $this->assertSame(8, $Vx5bl5ubgnhj->getEndLine());
            }
        }
    }

}
