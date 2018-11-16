<?php



namespace Prophecy\PhpDocumentor;

use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\DocBlock\Tag\MethodTag as LegacyMethodTag;


final class LegacyClassTagRetriever implements MethodTagRetrieverInterface
{
    
    public function getTagList(\ReflectionClass $Vpjgfkf3ydiv)
    {
        $Vlr5e3uzt0lf = new DocBlock($Vpjgfkf3ydiv->getDocComment());

        return $Vlr5e3uzt0lf->getTagsByName('method');
    }
}
