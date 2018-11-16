<?php



namespace Prophecy\Doubler\ClassPatch;

use Prophecy\Doubler\Generator\Node\ClassNode;
use Prophecy\Doubler\Generator\Node\MethodNode;


class DisableConstructorPatch implements ClassPatchInterface
{
    
    public function supports(ClassNode $Vpbrymo1kvdk)
    {
        return true;
    }

    
    public function apply(ClassNode $Vpbrymo1kvdk)
    {
        if (!$Vpbrymo1kvdk->hasMethod('__construct')) {
            $Vpbrymo1kvdk->addMethod(new MethodNode('__construct', ''));

            return;
        }

        $V4yt0oahsnhs = $Vpbrymo1kvdk->getMethod('__construct');
        foreach ($V4yt0oahsnhs->getArguments() as $Vlf5kwra10uk) {
            $Vlf5kwra10uk->setDefault(null);
        }

        $V4yt0oahsnhs->setCode(<<<PHP
if (0 < func_num_args()) {
    call_user_func_array(array('parent', '__construct'), func_get_args());
}
PHP
        );
    }

    
    public function getPriority()
    {
        return 100;
    }
}
