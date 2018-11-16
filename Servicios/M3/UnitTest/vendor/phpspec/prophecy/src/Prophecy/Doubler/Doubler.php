<?php



namespace Prophecy\Doubler;

use Doctrine\Instantiator\Instantiator;
use Prophecy\Doubler\ClassPatch\ClassPatchInterface;
use Prophecy\Doubler\Generator\ClassMirror;
use Prophecy\Doubler\Generator\ClassCreator;
use Prophecy\Exception\InvalidArgumentException;
use ReflectionClass;


class Doubler
{
    private $Vuvqzt3jnzr3;
    private $V3mcor4sztcz;
    private $Vpmhbnjkief3;

    
    private $Vqxuamzv2sll = array();

    
    private $Vy3pdqdzoqga;

    
    public function __construct(ClassMirror $Vuvqzt3jnzr3 = null, ClassCreator $V3mcor4sztcz = null,
                                NameGenerator $Vpmhbnjkief3 = null)
    {
        $this->mirror  = $Vuvqzt3jnzr3  ?: new ClassMirror;
        $this->creator = $V3mcor4sztcz ?: new ClassCreator;
        $this->namer   = $Vpmhbnjkief3   ?: new NameGenerator;
    }

    
    public function getClassPatches()
    {
        return $this->patches;
    }

    
    public function registerClassPatch(ClassPatchInterface $Vpp1jxnnbz1f)
    {
        $this->patches[] = $Vpp1jxnnbz1f;

        @usort($this->patches, function (ClassPatchInterface $Vpp1jxnnbz1f1, ClassPatchInterface $Vpp1jxnnbz1f2) {
            return $Vpp1jxnnbz1f2->getPriority() - $Vpp1jxnnbz1f1->getPriority();
        });
    }

    
    public function double(ReflectionClass $Vqmu1sajhgfn = null, array $Voahpkaubtr3, array $Veox3iprl5oz = null)
    {
        foreach ($Voahpkaubtr3 as $Vblpzgjj4s3y) {
            if (!$Vblpzgjj4s3y instanceof ReflectionClass) {
                throw new InvalidArgumentException(sprintf(
                    "[ReflectionClass \$Vblpzgjj4s3y1 [, ReflectionClass \$Vblpzgjj4s3y2]] array expected as\n".
                    "a second argument to `Doubler::double(...)`, but got %s.",
                    is_object($Vblpzgjj4s3y) ? get_class($Vblpzgjj4s3y).' class' : gettype($Vblpzgjj4s3y)
                ));
            }
        }

        $Vqmu1sajhgfnname  = $this->createDoubleClass($Vqmu1sajhgfn, $Voahpkaubtr3);
        $Vjqwoq0sz3ty = new ReflectionClass($Vqmu1sajhgfnname);

        if (null !== $Veox3iprl5oz) {
            return $Vjqwoq0sz3ty->newInstanceArgs($Veox3iprl5oz);
        }
        if ((null === $V4yt0oahsnhs = $Vjqwoq0sz3ty->getConstructor())
            || ($V4yt0oahsnhs->isPublic() && !$V4yt0oahsnhs->isFinal())) {
            return $Vjqwoq0sz3ty->newInstance();
        }

        if (!$this->instantiator) {
            $this->instantiator = new Instantiator();
        }

        return $this->instantiator->instantiate($Vqmu1sajhgfnname);
    }

    
    protected function createDoubleClass(ReflectionClass $Vqmu1sajhgfn = null, array $Voahpkaubtr3)
    {
        $Vgpjmw221p0b = $this->namer->name($Vqmu1sajhgfn, $Voahpkaubtr3);
        $Vpbrymo1kvdk = $this->mirror->reflect($Vqmu1sajhgfn, $Voahpkaubtr3);

        foreach ($this->patches as $Vpp1jxnnbz1f) {
            if ($Vpp1jxnnbz1f->supports($Vpbrymo1kvdk)) {
                $Vpp1jxnnbz1f->apply($Vpbrymo1kvdk);
            }
        }

        $this->creator->create($Vgpjmw221p0b, $Vpbrymo1kvdk);

        return $Vgpjmw221p0b;
    }
}
