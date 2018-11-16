<?php



namespace Prophecy\Doubler\ClassPatch;

use Prophecy\Doubler\Generator\Node\ClassNode;


interface ClassPatchInterface
{
    
    public function supports(ClassNode $Vpbrymo1kvdk);

    
    public function apply(ClassNode $Vpbrymo1kvdk);

    
    public function getPriority();
}
