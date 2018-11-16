<?php



namespace Symfony\Component\Yaml\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Exception\RuntimeException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Yaml;


class LintCommand extends Command
{
    protected static $Vvrqnragnwfz = 'lint:yaml';

    private $V5zzh1da1wpy;
    private $Vlobivxuxali;
    private $Vt0m1c4f2cyz;
    private $Vjsulxsp0lx1;
    private $Vcag1dfyihya;

    public function __construct($Vgpjmw221p0b = null, $Vjsulxsp0lx1 = null, $Vcag1dfyihya = null)
    {
        parent::__construct($Vgpjmw221p0b);

        $this->directoryIteratorProvider = $Vjsulxsp0lx1;
        $this->isReadableProvider = $Vcag1dfyihya;
    }

    
    protected function configure()
    {
        $this
            ->setDescription('Lints a file and outputs encountered errors')
            ->addArgument('filename', null, 'A file or a directory or STDIN')
            ->addOption('format', null, InputOption::VALUE_REQUIRED, 'The output format', 'txt')
            ->addOption('parse-tags', null, InputOption::VALUE_NONE, 'Parse custom tags')
            ->setHelp(<<<EOF
The <info>%command.name%</info> command lints a YAML file and outputs to STDOUT
the first encountered syntax error.

You can validates YAML contents passed from STDIN:

  <info>cat filename | php %command.full_name%</info>

You can also validate the syntax of a file:

  <info>php %command.full_name% filename</info>

Or of a whole directory:

  <info>php %command.full_name% dirname</info>
  <info>php %command.full_name% dirname --format=json</info>

EOF
            )
        ;
    }

    protected function execute(InputInterface $Vioma0xlpppc, OutputInterface $Vvaiuwffullu)
    {
        $V21q10cq2i40 = new SymfonyStyle($Vioma0xlpppc, $Vvaiuwffullu);
        $Va3qqb0vgkhy = $Vioma0xlpppc->getArgument('filename');
        $this->format = $Vioma0xlpppc->getOption('format');
        $this->displayCorrectFiles = $Vvaiuwffullu->isVerbose();
        $Vrycsn2lkvcj = $Vioma0xlpppc->getOption('parse-tags') ? Yaml::PARSE_CUSTOM_TAGS : 0;

        if (!$Va3qqb0vgkhy) {
            if (!$Votnqtrc40la = $this->getStdin()) {
                throw new RuntimeException('Please provide a filename or pipe file content to STDIN.');
            }

            return $this->display($V21q10cq2i40, array($this->validate($Votnqtrc40la, $Vrycsn2lkvcj)));
        }

        if (!$this->isReadable($Va3qqb0vgkhy)) {
            throw new RuntimeException(sprintf('File or directory "%s" is not readable.', $Va3qqb0vgkhy));
        }

        $Vrzpefeq55yr = array();
        foreach ($this->getFiles($Va3qqb0vgkhy) as $Vpu3xl4uhgg5) {
            $Vrzpefeq55yr[] = $this->validate(file_get_contents($Vpu3xl4uhgg5), $Vrycsn2lkvcj, $Vpu3xl4uhgg5);
        }

        return $this->display($V21q10cq2i40, $Vrzpefeq55yr);
    }

    private function validate($Vjdkyvjsoqdn, $Vrycsn2lkvcj, $Vpu3xl4uhgg5 = null)
    {
        $Vsf3xntxnuje = set_error_handler(function ($Vg54ngp40axi, $Vbl4yrmdan1y, $Vpu3xl4uhgg5, $Vrwsmtja4f2j) use (&$Vsf3xntxnuje) {
            if (E_USER_DEPRECATED === $Vg54ngp40axi) {
                throw new ParseException($Vbl4yrmdan1y, $this->getParser()->getRealCurrentLineNb() + 1);
            }

            return $Vsf3xntxnuje ? $Vsf3xntxnuje($Vg54ngp40axi, $Vbl4yrmdan1y, $Vpu3xl4uhgg5, $Vrwsmtja4f2j) : false;
        });

        try {
            $this->getParser()->parse($Vjdkyvjsoqdn, Yaml::PARSE_CONSTANT | $Vrycsn2lkvcj);
        } catch (ParseException $Vpt32vvhspnv) {
            return array('file' => $Vpu3xl4uhgg5, 'line' => $Vpt32vvhspnv->getParsedLine(), 'valid' => false, 'message' => $Vpt32vvhspnv->getMessage());
        } finally {
            restore_error_handler();
        }

        return array('file' => $Vpu3xl4uhgg5, 'valid' => true);
    }

    private function display(SymfonyStyle $V21q10cq2i40, array $Vpu3xl4uhgg5s)
    {
        switch ($this->format) {
            case 'txt':
                return $this->displayTxt($V21q10cq2i40, $Vpu3xl4uhgg5s);
            case 'json':
                return $this->displayJson($V21q10cq2i40, $Vpu3xl4uhgg5s);
            default:
                throw new InvalidArgumentException(sprintf('The format "%s" is not supported.', $this->format));
        }
    }

    private function displayTxt(SymfonyStyle $V21q10cq2i40, array $Vrzpefeq55yr)
    {
        $Vvbfurqaclb5 = count($Vrzpefeq55yr);
        $Vpt32vvhspnvrroredFiles = 0;

        foreach ($Vrzpefeq55yr as $Vb5bkktmopn1) {
            if ($Vb5bkktmopn1['valid'] && $this->displayCorrectFiles) {
                $V21q10cq2i40->comment('<info>OK</info>'.($Vb5bkktmopn1['file'] ? sprintf(' in %s', $Vb5bkktmopn1['file']) : ''));
            } elseif (!$Vb5bkktmopn1['valid']) {
                ++$Vpt32vvhspnvrroredFiles;
                $V21q10cq2i40->text('<error> ERROR </error>'.($Vb5bkktmopn1['file'] ? sprintf(' in %s', $Vb5bkktmopn1['file']) : ''));
                $V21q10cq2i40->text(sprintf('<error> >> %s</error>', $Vb5bkktmopn1['message']));
            }
        }

        if (0 === $Vpt32vvhspnvrroredFiles) {
            $V21q10cq2i40->success(sprintf('All %d YAML files contain valid syntax.', $Vvbfurqaclb5));
        } else {
            $V21q10cq2i40->warning(sprintf('%d YAML files have valid syntax and %d contain errors.', $Vvbfurqaclb5 - $Vpt32vvhspnvrroredFiles, $Vpt32vvhspnvrroredFiles));
        }

        return min($Vpt32vvhspnvrroredFiles, 1);
    }

    private function displayJson(SymfonyStyle $V21q10cq2i40, array $Vrzpefeq55yr)
    {
        $Vpt32vvhspnvrrors = 0;

        array_walk($Vrzpefeq55yr, function (&$V3jv1il2hqc3) use (&$Vpt32vvhspnvrrors) {
            $V3jv1il2hqc3['file'] = (string) $V3jv1il2hqc3['file'];
            if (!$V3jv1il2hqc3['valid']) {
                ++$Vpt32vvhspnvrrors;
            }
        });

        $V21q10cq2i40->writeln(json_encode($Vrzpefeq55yr, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return min($Vpt32vvhspnvrrors, 1);
    }

    private function getFiles($Vpu3xl4uhgg5OrDirectory)
    {
        if (is_file($Vpu3xl4uhgg5OrDirectory)) {
            yield new \SplFileInfo($Vpu3xl4uhgg5OrDirectory);

            return;
        }

        foreach ($this->getDirectoryIterator($Vpu3xl4uhgg5OrDirectory) as $Vpu3xl4uhgg5) {
            if (!in_array($Vpu3xl4uhgg5->getExtension(), array('yml', 'yaml'))) {
                continue;
            }

            yield $Vpu3xl4uhgg5;
        }
    }

    private function getStdin()
    {
        if (0 !== ftell(STDIN)) {
            return;
        }

        $Vioma0xlpppcs = '';
        while (!feof(STDIN)) {
            $Vioma0xlpppcs .= fread(STDIN, 1024);
        }

        return $Vioma0xlpppcs;
    }

    private function getParser()
    {
        if (!$this->parser) {
            $this->parser = new Parser();
        }

        return $this->parser;
    }

    private function getDirectoryIterator($Vghfube41qyl)
    {
        $V0ekusmibtbl = function ($Vghfube41qyl) {
            return new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($Vghfube41qyl, \FilesystemIterator::SKIP_DOTS | \FilesystemIterator::FOLLOW_SYMLINKS),
                \RecursiveIteratorIterator::LEAVES_ONLY
            );
        };

        if (null !== $this->directoryIteratorProvider) {
            return call_user_func($this->directoryIteratorProvider, $Vghfube41qyl, $V0ekusmibtbl);
        }

        return $V0ekusmibtbl($Vghfube41qyl);
    }

    private function isReadable($Vpu3xl4uhgg5OrDirectory)
    {
        $V0ekusmibtbl = function ($Vpu3xl4uhgg5OrDirectory) {
            return is_readable($Vpu3xl4uhgg5OrDirectory);
        };

        if (null !== $this->isReadableProvider) {
            return call_user_func($this->isReadableProvider, $Vpu3xl4uhgg5OrDirectory, $V0ekusmibtbl);
        }

        return $V0ekusmibtbl($Vpu3xl4uhgg5OrDirectory);
    }
}
