<?php



namespace Prophecy\Doubler\ClassPatch;

use Prophecy\Doubler\Generator\Node\ClassNode;


class ReflectionClassNewInstancePatch implements ClassPatchInterface
{
    
    public function supports(ClassNode $Vpbrymo1kvdk)
    {
        return 'ReflectionClass' === $Vpbrymo1kvdk->getParentClass();
    }

    
    public function apply(ClassNode $Vpbrymo1kvdk)
    {
        foreach ($Vpbrymo1kvdk->getMethod('newInstance')->getArguments() as $Vlf5kwra10uk) {
            $Vlf5kwra10uk->setDefault(null);
        }
    }

    
    public function getPriority()
    {
        return 50;
    }
}
