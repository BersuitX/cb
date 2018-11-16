<?php



namespace Prophecy\Doubler\ClassPatch;

use Prophecy\Doubler\Generator\Node\ClassNode;
use Prophecy\Doubler\Generator\Node\MethodNode;
use Prophecy\PhpDocumentor\ClassAndInterfaceTagRetriever;
use Prophecy\PhpDocumentor\MethodTagRetrieverInterface;


class MagicCallPatch implements ClassPatchInterface
{
    private $Vebkphmctoi1;

    public function __construct(MethodTagRetrieverInterface $Vebkphmctoi1 = null)
    {
        $this->tagRetriever = null === $Vebkphmctoi1 ? new ClassAndInterfaceTagRetriever() : $Vebkphmctoi1;
    }

    
    public function supports(ClassNode $Vpbrymo1kvdk)
    {
        return true;
    }

    
    public function apply(ClassNode $Vpbrymo1kvdk)
    {
        $Vdj2jsltudrf = array_filter($Vpbrymo1kvdk->getInterfaces(), function ($Vblpzgjj4s3y) {
            return 0 !== strpos($Vblpzgjj4s3y, 'Prophecy\\');
        });
        $Vdj2jsltudrf[] = $Vpbrymo1kvdk->getParentClass();

        foreach ($Vdj2jsltudrf as $V31qrja1w0r2) {
            $Vpjgfkf3ydiv = new \ReflectionClass($V31qrja1w0r2);
            $Vcuo3s1b5m55 = $this->tagRetriever->getTagList($Vpjgfkf3ydiv);

            foreach($Vcuo3s1b5m55 as $Vl2ijnnhdtam) {
                $Vc1exo5hbki5 = $Vl2ijnnhdtam->getMethodName();

                if (empty($Vc1exo5hbki5)) {
                    continue;
                }

                if (!$Vpjgfkf3ydiv->hasMethod($Vc1exo5hbki5)) {
                    $Vnxotukxvrnb = new MethodNode($Vc1exo5hbki5);
                    $Vnxotukxvrnb->setStatic($Vl2ijnnhdtam->isStatic());
                    $Vpbrymo1kvdk->addMethod($Vnxotukxvrnb);
                }
            }
        }
    }

    
    public function getPriority()
    {
        return 50;
    }
}

