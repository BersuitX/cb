<?php



namespace Prophecy\Doubler\ClassPatch;

use Prophecy\Doubler\Generator\Node\ClassNode;
use Prophecy\Doubler\Generator\Node\MethodNode;


class SplFileInfoPatch implements ClassPatchInterface
{
    
    public function supports(ClassNode $Vpbrymo1kvdk)
    {
        if (null === $Vpbrymo1kvdk->getParentClass()) {
            return false;
        }
        return 'SplFileInfo' === $Vpbrymo1kvdk->getParentClass()
            || is_subclass_of($Vpbrymo1kvdk->getParentClass(), 'SplFileInfo')
        ;
    }

    
    public function apply(ClassNode $Vpbrymo1kvdk)
    {
        if ($Vpbrymo1kvdk->hasMethod('__construct')) {
            $V4yt0oahsnhs = $Vpbrymo1kvdk->getMethod('__construct');
        } else {
            $V4yt0oahsnhs = new MethodNode('__construct');
            $Vpbrymo1kvdk->addMethod($V4yt0oahsnhs);
        }

        if ($this->nodeIsDirectoryIterator($Vpbrymo1kvdk)) {
            $V4yt0oahsnhs->setCode('return parent::__construct("' . __DIR__ . '");');

            return;
        }

        if ($this->nodeIsSplFileObject($Vpbrymo1kvdk)) {
            $V4xniuhxoyvj = str_replace('\\','\\\\',__FILE__);
            $V4yt0oahsnhs->setCode('return parent::__construct("' . $V4xniuhxoyvj .'");');

            return;
        }

        if ($this->nodeIsSymfonySplFileInfo($Vpbrymo1kvdk)) {
            $V4xniuhxoyvj = str_replace('\\','\\\\',__FILE__);
            $V4yt0oahsnhs->setCode('return parent::__construct("' . $V4xniuhxoyvj .'", "", "");');

            return;
        }

        $V4yt0oahsnhs->useParentCode();
    }

    
    public function getPriority()
    {
        return 50;
    }

    
    private function nodeIsDirectoryIterator(ClassNode $Vpbrymo1kvdk)
    {
        $Vz4c1zo3dvrb = $Vpbrymo1kvdk->getParentClass();

        return 'DirectoryIterator' === $Vz4c1zo3dvrb
            || is_subclass_of($Vz4c1zo3dvrb, 'DirectoryIterator');
    }

    
    private function nodeIsSplFileObject(ClassNode $Vpbrymo1kvdk)
    {
        $Vz4c1zo3dvrb = $Vpbrymo1kvdk->getParentClass();

        return 'SplFileObject' === $Vz4c1zo3dvrb
            || is_subclass_of($Vz4c1zo3dvrb, 'SplFileObject');
    }

    
    private function nodeIsSymfonySplFileInfo(ClassNode $Vpbrymo1kvdk)
    {
        $Vz4c1zo3dvrb = $Vpbrymo1kvdk->getParentClass();

        return 'Symfony\\Component\\Finder\\SplFileInfo' === $Vz4c1zo3dvrb;
    }
}
