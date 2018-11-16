<?php



namespace Prophecy\PhpDocumentor;

use phpDocumentor\Reflection\DocBlock\Tag\MethodTag as LegacyMethodTag;
use phpDocumentor\Reflection\DocBlock\Tags\Method;


final class ClassAndInterfaceTagRetriever implements MethodTagRetrieverInterface
{
    private $Vqjagoglqxyk;

    public function __construct(MethodTagRetrieverInterface $Vqjagoglqxyk = null)
    {
        if (null !== $Vqjagoglqxyk) {
            $this->classRetriever = $Vqjagoglqxyk;

            return;
        }

        $this->classRetriever = class_exists('phpDocumentor\Reflection\DocBlockFactory') && class_exists('phpDocumentor\Reflection\Types\ContextFactory')
            ? new ClassTagRetriever()
            : new LegacyClassTagRetriever()
        ;
    }

    
    public function getTagList(\ReflectionClass $Vpjgfkf3ydiv)
    {
        return array_merge(
            $this->classRetriever->getTagList($Vpjgfkf3ydiv),
            $this->getInterfacesTagList($Vpjgfkf3ydiv)
        );
    }

    
    private function getInterfacesTagList(\ReflectionClass $Vpjgfkf3ydiv)
    {
        $Voahpkaubtr3 = $Vpjgfkf3ydiv->getInterfaces();
        $Vcuo3s1b5m55 = array();

        foreach($Voahpkaubtr3 as $Vblpzgjj4s3y) {
            $Vcuo3s1b5m55 = array_merge($Vcuo3s1b5m55, $this->classRetriever->getTagList($Vblpzgjj4s3y));
        }

        return $Vcuo3s1b5m55;
    }
}
