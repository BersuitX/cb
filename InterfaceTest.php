<?php



class PHP_Token_InterfaceTest extends PHPUnit_Framework_TestCase
{
    protected $Vqmu1sajhgfn;
    protected $Voahpkaubtr3;

    protected function setUp()
    {
        $Vxbfts1p2jxd = new PHP_Token_Stream(TEST_FILES_PATH . 'source4.php');
        $Vxja1abp34yq  = 0;
        foreach ($Vxbfts1p2jxd as $Vx5bl5ubgnhj) {
            if ($Vx5bl5ubgnhj instanceof PHP_Token_CLASS) {
                $this->class = $Vx5bl5ubgnhj;
            }
            elseif ($Vx5bl5ubgnhj instanceof PHP_Token_INTERFACE) {
                $this->interfaces[$Vxja1abp34yq] = $Vx5bl5ubgnhj;
                $Vxja1abp34yq++;
            }
        }
    }

    
    public function testGetName()
    {
        $this->assertEquals(
            'iTemplate', $this->interfaces[0]->getName()
        );
    }

    
    public function testGetParentNotExists()
    {
        $this->assertFalse(
            $this->interfaces[0]->getParent()
        );
    }

    
    public function testHasParentNotExists()
    {
        $this->assertFalse(
            $this->interfaces[0]->hasParent()
        );
    }

    
    public function testGetParentExists()
    {
        $this->assertEquals(
            'a', $this->interfaces[2]->getParent()
        );
    }

    
    public function testHasParentExists()
    {
        $this->assertTrue(
            $this->interfaces[2]->hasParent()
        );
    }

    
    public function testGetInterfacesExists()
    {
        $this->assertEquals(
            array('b'),
            $this->class->getInterfaces()
        );
    }

    
    public function testHasInterfacesExists()
    {
        $this->assertTrue(
            $this->class->hasInterfaces()
        );
    }
    
    public function testGetPackageNamespace() {
        $Vx5bl5ubgnhjStream = new PHP_Token_Stream(TEST_FILES_PATH . 'classInNamespace.php');
        foreach($Vx5bl5ubgnhjStream as $Vx5bl5ubgnhj) {
            if($Vx5bl5ubgnhj instanceOf PHP_Token_INTERFACE) {
                $Vhtagczfnncx = $Vx5bl5ubgnhj->getPackage();
                $this->assertSame('Foo\\Bar', $Vhtagczfnncx['namespace']);
            }
        }
    }


    public function provideFilesWithClassesWithinMultipleNamespaces() {
        return array(
            array(TEST_FILES_PATH . 'multipleNamespacesWithOneClassUsingBraces.php'),
            array(TEST_FILES_PATH . 'multipleNamespacesWithOneClassUsingNonBraceSyntax.php'),
        );
    }

    
    public function testGetPackageNamespaceForFileWithMultipleNamespaces($Vbqrwrgqpqc1) {
        $Vx5bl5ubgnhjStream = new PHP_Token_Stream($Vbqrwrgqpqc1);
        $Veaabn5nkvkx = false;
        foreach($Vx5bl5ubgnhjStream as $Vx5bl5ubgnhj) {
            if($Veaabn5nkvkx === false && $Vx5bl5ubgnhj instanceOf PHP_Token_INTERFACE) {
                $Vhtagczfnncx = $Vx5bl5ubgnhj->getPackage();
                $this->assertSame('TestClassInBar', $Vx5bl5ubgnhj->getName());
                $this->assertSame('Foo\\Bar', $Vhtagczfnncx['namespace']);
                $Veaabn5nkvkx = true;
                continue;
            }
            
            if($Vx5bl5ubgnhj instanceOf PHP_Token_INTERFACE) {
                $Vhtagczfnncx = $Vx5bl5ubgnhj->getPackage();
                $this->assertSame('TestClassInBaz', $Vx5bl5ubgnhj->getName());
                $this->assertSame('Foo\\Baz', $Vhtagczfnncx['namespace']);
                return;
            }
        }
        $this->fail("Seachring for 2 classes failed");
    }

    public function testGetPackageNamespaceIsEmptyForInterfacesThatAreNotWithinNamespaces() {
        foreach($this->interfaces as $Vx5bl5ubgnhj) {
            $Vhtagczfnncx = $Vx5bl5ubgnhj->getPackage();
            $this->assertSame("", $Vhtagczfnncx['namespace']);
        }
    }

    
    public function testGetPackageNamespaceWhenExtentingFromNamespaceClass() {
        $Vx5bl5ubgnhjStream = new PHP_Token_Stream(TEST_FILES_PATH . 'classExtendsNamespacedClass.php');
        $Veaabn5nkvkx = false;
        foreach($Vx5bl5ubgnhjStream as $Vx5bl5ubgnhj) {
            if($Veaabn5nkvkx === false && $Vx5bl5ubgnhj instanceOf PHP_Token_INTERFACE) {
                $Vhtagczfnncx = $Vx5bl5ubgnhj->getPackage();
                $this->assertSame('Baz', $Vx5bl5ubgnhj->getName());
                $this->assertSame('Foo\\Bar', $Vhtagczfnncx['namespace']);
                $Veaabn5nkvkx = true;
                continue;
            }
            if($Vx5bl5ubgnhj instanceOf PHP_Token_INTERFACE) {
                $Vhtagczfnncx = $Vx5bl5ubgnhj->getPackage();
                $this->assertSame('Extender', $Vx5bl5ubgnhj->getName());
                $this->assertSame('Other\\Space', $Vhtagczfnncx['namespace']);
                return;
            }
        }
        $this->fail("Searching for 2 classes failed");
    }
}
