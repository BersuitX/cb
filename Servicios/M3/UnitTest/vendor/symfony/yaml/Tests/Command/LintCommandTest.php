<?php



namespace Symfony\Component\Yaml\Tests\Command;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Command\LintCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Tester\CommandTester;


class LintCommandTest extends TestCase
{
    private $V5s0rodgwwbv;

    public function testLintCorrectFile()
    {
        $Velcjwe3zusa = $this->createCommandTester();
        $Va3qqb0vgkhy = $this->createFile('foo: bar');

        $Vlgck4bmjqgq = $Velcjwe3zusa->execute(array('filename' => $Va3qqb0vgkhy), array('verbosity' => OutputInterface::VERBOSITY_VERBOSE, 'decorated' => false));

        $this->assertEquals(0, $Vlgck4bmjqgq, 'Returns 0 in case of success');
        $this->assertRegExp('/^\/\/ OK in /', trim($Velcjwe3zusa->getDisplay()));
    }

    public function testLintIncorrectFile()
    {
        $Vzr3ieupw51l = '
foo:
bar';
        $Velcjwe3zusa = $this->createCommandTester();
        $Va3qqb0vgkhy = $this->createFile($Vzr3ieupw51l);

        $Vlgck4bmjqgq = $Velcjwe3zusa->execute(array('filename' => $Va3qqb0vgkhy), array('decorated' => false));

        $this->assertEquals(1, $Vlgck4bmjqgq, 'Returns 1 in case of error');
        $this->assertContains('Unable to parse at line 3 (near "bar").', trim($Velcjwe3zusa->getDisplay()));
    }

    public function testConstantAsKey()
    {
        $Vklvvq0m52jf = <<<YAML
!php/const 'Symfony\Component\Yaml\Tests\Command\Foo::TEST': bar
YAML;
        $Vlgck4bmjqgq = $this->createCommandTester()->execute(array('filename' => $this->createFile($Vklvvq0m52jf)), array('verbosity' => OutputInterface::VERBOSITY_VERBOSE, 'decorated' => false));
        $this->assertSame(0, $Vlgck4bmjqgq, 'lint:yaml exits with code 0 in case of success');
    }

    public function testCustomTags()
    {
        $Vklvvq0m52jf = <<<YAML
foo: !my_tag {foo: bar}
YAML;
        $Vlgck4bmjqgq = $this->createCommandTester()->execute(array('filename' => $this->createFile($Vklvvq0m52jf), '--parse-tags' => true), array('verbosity' => OutputInterface::VERBOSITY_VERBOSE, 'decorated' => false));
        $this->assertSame(0, $Vlgck4bmjqgq, 'lint:yaml exits with code 0 in case of success');
    }

    public function testCustomTagsError()
    {
        $Vklvvq0m52jf = <<<YAML
foo: !my_tag {foo: bar}
YAML;
        $Vlgck4bmjqgq = $this->createCommandTester()->execute(array('filename' => $this->createFile($Vklvvq0m52jf)), array('verbosity' => OutputInterface::VERBOSITY_VERBOSE, 'decorated' => false));
        $this->assertSame(1, $Vlgck4bmjqgq, 'lint:yaml exits with code 1 in case of error');
    }

    
    public function testLintFileNotReadable()
    {
        $Velcjwe3zusa = $this->createCommandTester();
        $Va3qqb0vgkhy = $this->createFile('');
        unlink($Va3qqb0vgkhy);

        $Vlgck4bmjqgq = $Velcjwe3zusa->execute(array('filename' => $Va3qqb0vgkhy), array('decorated' => false));
    }

    
    private function createFile($Vjdkyvjsoqdn)
    {
        $Va3qqb0vgkhy = tempnam(sys_get_temp_dir().'/framework-yml-lint-test', 'sf-');
        file_put_contents($Va3qqb0vgkhy, $Vjdkyvjsoqdn);

        $this->files[] = $Va3qqb0vgkhy;

        return $Va3qqb0vgkhy;
    }

    
    protected function createCommandTester()
    {
        $Vmvdx53krdau = new Application();
        $Vmvdx53krdau->add(new LintCommand());
        $Vtpf5mpptbuy = $Vmvdx53krdau->find('lint:yaml');

        return new CommandTester($Vtpf5mpptbuy);
    }

    protected function setUp()
    {
        $this->files = array();
        @mkdir(sys_get_temp_dir().'/framework-yml-lint-test');
    }

    protected function tearDown()
    {
        foreach ($this->files as $Vpu3xl4uhgg5) {
            if (file_exists($Vpu3xl4uhgg5)) {
                unlink($Vpu3xl4uhgg5);
            }
        }

        rmdir(sys_get_temp_dir().'/framework-yml-lint-test');
    }
}

class Foo
{
    const TEST = 'foo';
}
