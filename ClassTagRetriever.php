<?php



namespace Prophecy\PhpDocumentor;

use phpDocumentor\Reflection\DocBlock\Tags\Method;
use phpDocumentor\Reflection\DocBlockFactory;
use phpDocumentor\Reflection\Types\ContextFactory;


final class ClassTagRetriever implements MethodTagRetrieverInterface
{
    private $Vpj1a2cv5y2d;
    private $Vghtf0nf50fp;

    public function __construct()
    {
        $this->docBlockFactory = DocBlockFactory::createInstance();
        $this->contextFactory = new ContextFactory();
    }

    
    public function getTagList(\ReflectionClass $Vpjgfkf3ydiv)
    {
        try {
            $Vlr5e3uzt0lf = $this->docBlockFactory->create(
                $Vpjgfkf3ydiv,
                $this->contextFactory->createFromReflector($Vpjgfkf3ydiv)
            );

            return $Vlr5e3uzt0lf->getTagsByName('method');
        } catch (\InvalidArgumentException $Vpt32vvhspnv) {
            return array();
        }
    }
}
