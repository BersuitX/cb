<?php



namespace Prophecy\Doubler\ClassPatch;

use Prophecy\Doubler\Generator\Node\ClassNode;
use Prophecy\Doubler\Generator\Node\MethodNode;
use Prophecy\Doubler\Generator\Node\ArgumentNode;


class ProphecySubjectPatch implements ClassPatchInterface
{
    
    public function supports(ClassNode $Vpbrymo1kvdk)
    {
        return true;
    }

    
    public function apply(ClassNode $Vpbrymo1kvdk)
    {
        $Vpbrymo1kvdk->addInterface('Prophecy\Prophecy\ProphecySubjectInterface');
        $Vpbrymo1kvdk->addProperty('objectProphecy', 'private');

        foreach ($Vpbrymo1kvdk->getMethods() as $Vgpjmw221p0b => $Vtlfvdwskdge) {
            if ('__construct' === strtolower($Vgpjmw221p0b)) {
                continue;
            }

            if ($Vtlfvdwskdge->getReturnType() === 'void') {
                $Vtlfvdwskdge->setCode(
                    '$this->getProphecy()->makeProphecyMethodCall(__FUNCTION__, func_get_args());'
                );
            } else {
                $Vtlfvdwskdge->setCode(
                    'return $this->getProphecy()->makeProphecyMethodCall(__FUNCTION__, func_get_args());'
                );
            }
        }

        $Vayy21gy2ydu = new MethodNode('setProphecy');
        $V20z0ftbtnrw = new ArgumentNode('prophecy');
        $V20z0ftbtnrw->setTypeHint('Prophecy\Prophecy\ProphecyInterface');
        $Vayy21gy2ydu->addArgument($V20z0ftbtnrw);
        $Vayy21gy2ydu->setCode('$this->objectProphecy = $V2fq5eyaztqt;');

        $V2fq5eyaztqtGetter = new MethodNode('getProphecy');
        $V2fq5eyaztqtGetter->setCode('return $this->objectProphecy;');

        if ($Vpbrymo1kvdk->hasMethod('__call')) {
            $V3p53vehbctb = $Vpbrymo1kvdk->getMethod('__call');
        } else {
            $V3p53vehbctb = new MethodNode('__call');
            $V3p53vehbctb->addArgument(new ArgumentNode('name'));
            $V3p53vehbctb->addArgument(new ArgumentNode('arguments'));

            $Vpbrymo1kvdk->addMethod($V3p53vehbctb);
        }

        $V3p53vehbctb->setCode(<<<PHP
throw new \Prophecy\Exception\Doubler\MethodNotFoundException(
    sprintf('Method `%s::%s()` not found.', get_class(\$this), func_get_arg(0)),
    \$this->getProphecy(), func_get_arg(0)
);
PHP
        );

        $Vpbrymo1kvdk->addMethod($Vayy21gy2ydu);
        $Vpbrymo1kvdk->addMethod($V2fq5eyaztqtGetter);
    }

    
    public function getPriority()
    {
        return 0;
    }
}
