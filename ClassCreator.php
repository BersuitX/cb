<?php



namespace Prophecy\Doubler\Generator;

use Prophecy\Exception\Doubler\ClassCreatorException;


class ClassCreator
{
    private $Vi5uqhlkbfzi;

    
    public function __construct(ClassCodeGenerator $Vi5uqhlkbfzi = null)
    {
        $this->generator = $Vi5uqhlkbfzi ?: new ClassCodeGenerator;
    }

    
    public function create($V3ngkdmbo02c, Node\ClassNode $Vqmu1sajhgfn)
    {
        $V5kll1klco0v = $this->generator->generate($V3ngkdmbo02c, $Vqmu1sajhgfn);
        $Vrpudtlhfyg0 = eval($V5kll1klco0v);

        if (!class_exists($V3ngkdmbo02c, false)) {
            if (count($Vqmu1sajhgfn->getInterfaces())) {
                throw new ClassCreatorException(sprintf(
                    'Could not double `%s` and implement interfaces: [%s].',
                    $Vqmu1sajhgfn->getParentClass(), implode(', ', $Vqmu1sajhgfn->getInterfaces())
                ), $Vqmu1sajhgfn);
            }

            throw new ClassCreatorException(
                sprintf('Could not double `%s`.', $Vqmu1sajhgfn->getParentClass()),
                $Vqmu1sajhgfn
            );
        }

        return $Vrpudtlhfyg0;
    }
}
