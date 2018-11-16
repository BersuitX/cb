<?php


namespace DoctrineTest\InstantiatorTest;

use Doctrine\Instantiator\Exception\UnexpectedValueException;
use Doctrine\Instantiator\Instantiator;
use PHPUnit_Framework_TestCase;
use ReflectionClass;


class InstantiatorTest extends PHPUnit_Framework_TestCase
{
    
    private $Vy3pdqdzoqga;

    
    protected function setUp()
    {
        $this->instantiator = new Instantiator();
    }

    
    public function testCanInstantiate($Vh0iae5cev4i)
    {
        $this->assertInstanceOf($Vh0iae5cev4i, $this->instantiator->instantiate($Vh0iae5cev4i));
    }

    
    public function testInstantiatesSeparateInstances($Vh0iae5cev4i)
    {
        $Vaqwguj2ch3j = $this->instantiator->instantiate($Vh0iae5cev4i);
        $Vwdv3tegfgz1 = $this->instantiator->instantiate($Vh0iae5cev4i);

        $this->assertEquals($Vaqwguj2ch3j, $Vwdv3tegfgz1);
        $this->assertNotSame($Vaqwguj2ch3j, $Vwdv3tegfgz1);
    }

    public function testExceptionOnUnSerializationException()
    {
        if (defined('HHVM_VERSION')) {
            $this->markTestSkipped(
                'As of facebook/hhvm#3432, HHVM has no PDORow, and therefore '
                . ' no internal final classes that cannot be instantiated'
            );
        }

        $Vh0iae5cev4i = 'DoctrineTest\\InstantiatorTestAsset\\UnserializeExceptionArrayObjectAsset';

        if (\PHP_VERSION_ID >= 50600) {
            $Vh0iae5cev4i = 'PDORow';
        }

        if (\PHP_VERSION_ID === 50429 || \PHP_VERSION_ID === 50513) {
            $Vh0iae5cev4i = 'DoctrineTest\\InstantiatorTestAsset\\SerializableArrayObjectAsset';
        }

        $this->setExpectedException('Doctrine\\Instantiator\\Exception\\UnexpectedValueException');

        $this->instantiator->instantiate($Vh0iae5cev4i);
    }

    public function testNoticeOnUnSerializationException()
    {
        if (\PHP_VERSION_ID >= 50600) {
            $this->markTestSkipped(
                'PHP 5.6 supports `ReflectionClass#newInstanceWithoutConstructor()` for some internal classes'
            );
        }

        try {
            $this->instantiator->instantiate('DoctrineTest\\InstantiatorTestAsset\\WakeUpNoticesAsset');

            $this->fail('No exception was raised');
        } catch (UnexpectedValueException $Vzzme31ixifp) {
            $Vkqknepreb2a = new ReflectionClass('DoctrineTest\\InstantiatorTestAsset\\WakeUpNoticesAsset');
            $Vvnhp4yqbunj                = $Vzzme31ixifp->getPrevious();

            $this->assertInstanceOf('Exception', $Vvnhp4yqbunj);

            
            if (! (\PHP_VERSION_ID === 50429 || \PHP_VERSION_ID === 50513)) {
                $this->assertSame(
                    'Could not produce an instance of "DoctrineTest\\InstantiatorTestAsset\WakeUpNoticesAsset" '
                    . 'via un-serialization, since an error was triggered in file "'
                    . $Vkqknepreb2a->getFileName() . '" at line "36"',
                    $Vzzme31ixifp->getMessage()
                );

                $this->assertSame('Something went bananas while un-serializing this instance', $Vvnhp4yqbunj->getMessage());
                $this->assertSame(\E_USER_NOTICE, $Vvnhp4yqbunj->getCode());
            }
        }
    }

    
    public function testInstantiationFromNonExistingClass($V5xd1ionostk)
    {
        $this->setExpectedException('Doctrine\\Instantiator\\Exception\\InvalidArgumentException');

        $this->instantiator->instantiate($V5xd1ionostk);
    }

    public function testInstancesAreNotCloned()
    {
        $Vh0iae5cev4i = 'TemporaryClass' . uniqid();

        eval('namespace ' . __NAMESPACE__ . '; class ' . $Vh0iae5cev4i . '{}');

        $Vbikgxmsfl21 = $this->instantiator->instantiate(__NAMESPACE__ . '\\' . $Vh0iae5cev4i);

        $Vbikgxmsfl21->foo = 'bar';

        $Vwdv3tegfgz1 = $this->instantiator->instantiate(__NAMESPACE__ . '\\' . $Vh0iae5cev4i);

        $this->assertObjectNotHasAttribute('foo', $Vwdv3tegfgz1);
    }

    
    public function getInstantiableClasses()
    {
        $Vcoznk2huoff = array(
            array('stdClass'),
            array(__CLASS__),
            array('Doctrine\\Instantiator\\Instantiator'),
            array('Exception'),
            array('PharException'),
            array('DoctrineTest\\InstantiatorTestAsset\\SimpleSerializableAsset'),
            array('DoctrineTest\\InstantiatorTestAsset\\ExceptionAsset'),
            array('DoctrineTest\\InstantiatorTestAsset\\FinalExceptionAsset'),
            array('DoctrineTest\\InstantiatorTestAsset\\PharExceptionAsset'),
            array('DoctrineTest\\InstantiatorTestAsset\\UnCloneableAsset'),
            array('DoctrineTest\\InstantiatorTestAsset\\XMLReaderAsset'),
        );

        if (\PHP_VERSION_ID === 50429 || \PHP_VERSION_ID === 50513) {
            return $Vcoznk2huoff;
        }

        $Vcoznk2huoff = array_merge(
            $Vcoznk2huoff,
            array(
                array('PharException'),
                array('ArrayObject'),
                array('DoctrineTest\\InstantiatorTestAsset\\ArrayObjectAsset'),
                array('DoctrineTest\\InstantiatorTestAsset\\SerializableArrayObjectAsset'),
            )
        );

        if (\PHP_VERSION_ID >= 50600) {
            $Vcoznk2huoff[] = array('DoctrineTest\\InstantiatorTestAsset\\WakeUpNoticesAsset');
            $Vcoznk2huoff[] = array('DoctrineTest\\InstantiatorTestAsset\\UnserializeExceptionArrayObjectAsset');
        }

        return $Vcoznk2huoff;
    }

    
    public function getInvalidClassNames()
    {
        $Vh0iae5cev4is = array(
            array(__CLASS__ . uniqid()),
            array('Doctrine\\Instantiator\\InstantiatorInterface'),
            array('DoctrineTest\\InstantiatorTestAsset\\AbstractClassAsset'),
        );

        if (\PHP_VERSION_ID >= 50400) {
            $Vh0iae5cev4is[] = array('DoctrineTest\\InstantiatorTestAsset\\SimpleTraitAsset');
        }

        return $Vh0iae5cev4is;
    }
}
