<?php



namespace Prophecy\Doubler\ClassPatch;

use Prophecy\Doubler\Generator\Node\ClassNode;
use Prophecy\Doubler\Generator\Node\MethodNode;


class TraversablePatch implements ClassPatchInterface
{
    
    public function supports(ClassNode $Vpbrymo1kvdk)
    {
        if (in_array('Iterator', $Vpbrymo1kvdk->getInterfaces())) {
            return false;
        }
        if (in_array('IteratorAggregate', $Vpbrymo1kvdk->getInterfaces())) {
            return false;
        }

        foreach ($Vpbrymo1kvdk->getInterfaces() as $Vblpzgjj4s3y) {
            if ('Traversable' !== $Vblpzgjj4s3y && !is_subclass_of($Vblpzgjj4s3y, 'Traversable')) {
                continue;
            }
            if ('Iterator' === $Vblpzgjj4s3y || is_subclass_of($Vblpzgjj4s3y, 'Iterator')) {
                continue;
            }
            if ('IteratorAggregate' === $Vblpzgjj4s3y || is_subclass_of($Vblpzgjj4s3y, 'IteratorAggregate')) {
                continue;
            }

            return true;
        }

        return false;
    }

    
    public function apply(ClassNode $Vpbrymo1kvdk)
    {
        $Vpbrymo1kvdk->addInterface('Iterator');

        $Vpbrymo1kvdk->addMethod(new MethodNode('current'));
        $Vpbrymo1kvdk->addMethod(new MethodNode('key'));
        $Vpbrymo1kvdk->addMethod(new MethodNode('next'));
        $Vpbrymo1kvdk->addMethod(new MethodNode('rewind'));
        $Vpbrymo1kvdk->addMethod(new MethodNode('valid'));
    }

    
    public function getPriority()
    {
        return 100;
    }
}
