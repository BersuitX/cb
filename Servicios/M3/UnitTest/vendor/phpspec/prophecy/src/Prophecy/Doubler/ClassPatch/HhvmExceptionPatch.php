<?php



namespace Prophecy\Doubler\ClassPatch;

use Prophecy\Doubler\Generator\Node\ClassNode;


class HhvmExceptionPatch implements ClassPatchInterface
{
    
    public function supports(ClassNode $Vpbrymo1kvdk)
    {
        if (!defined('HHVM_VERSION')) {
            return false;
        }

        return 'Exception' === $Vpbrymo1kvdk->getParentClass() || is_subclass_of($Vpbrymo1kvdk->getParentClass(), 'Exception');
    }

    
    public function apply(ClassNode $Vpbrymo1kvdk)
    {
        if ($Vpbrymo1kvdk->hasMethod('setTraceOptions')) {
            $Vpbrymo1kvdk->getMethod('setTraceOptions')->useParentCode();
        }
        if ($Vpbrymo1kvdk->hasMethod('getTraceOptions')) {
            $Vpbrymo1kvdk->getMethod('getTraceOptions')->useParentCode();
        }
    }

    
    public function getPriority()
    {
        return -50;
    }
}
