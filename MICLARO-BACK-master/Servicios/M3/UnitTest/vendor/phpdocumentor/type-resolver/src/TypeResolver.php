<?php


namespace phpDocumentor\Reflection;

use phpDocumentor\Reflection\Types\Array_;
use phpDocumentor\Reflection\Types\Compound;
use phpDocumentor\Reflection\Types\Context;
use phpDocumentor\Reflection\Types\Iterable_;
use phpDocumentor\Reflection\Types\Nullable;
use phpDocumentor\Reflection\Types\Object_;

final class TypeResolver
{
    
    const OPERATOR_ARRAY = '[]';

    
    const OPERATOR_NAMESPACE = '\\';

    
    private $Vsd4kqshdumn = array(
        'string' => Types\String_::class,
        'int' => Types\Integer::class,
        'integer' => Types\Integer::class,
        'bool' => Types\Boolean::class,
        'boolean' => Types\Boolean::class,
        'float' => Types\Float_::class,
        'double' => Types\Float_::class,
        'object' => Object_::class,
        'mixed' => Types\Mixed::class,
        'array' => Array_::class,
        'resource' => Types\Resource::class,
        'void' => Types\Void_::class,
        'null' => Types\Null_::class,
        'scalar' => Types\Scalar::class,
        'callback' => Types\Callable_::class,
        'callable' => Types\Callable_::class,
        'false' => Types\Boolean::class,
        'true' => Types\Boolean::class,
        'self' => Types\Self_::class,
        '$this' => Types\This::class,
        'static' => Types\Static_::class,
        'parent' => Types\Parent_::class,
        'iterable' => Iterable_::class,
    );

    
    private $Vg23ilkp2ixo;

    
    public function __construct(FqsenResolver $Vg23ilkp2ixo = null)
    {
        $this->fqsenResolver = $Vg23ilkp2ixo ?: new FqsenResolver();
    }

    
    public function resolve($V31qrja1w0r2, Context $Vylnw34ljlp1 = null)
    {
        if (!is_string($V31qrja1w0r2)) {
            throw new \InvalidArgumentException(
                'Attempted to resolve type but it appeared not to be a string, received: ' . var_export($V31qrja1w0r2, true)
            );
        }

        $V31qrja1w0r2 = trim($V31qrja1w0r2);
        if (!$V31qrja1w0r2) {
            throw new \InvalidArgumentException('Attempted to resolve "' . $V31qrja1w0r2 . '" but it appears to be empty');
        }

        if ($Vylnw34ljlp1 === null) {
            $Vylnw34ljlp1 = new Context('');
        }

        switch (true) {
            case $this->isNullableType($V31qrja1w0r2):
                return $this->resolveNullableType($V31qrja1w0r2, $Vylnw34ljlp1);
            case $this->isKeyword($V31qrja1w0r2):
                return $this->resolveKeyword($V31qrja1w0r2);
            case ($this->isCompoundType($V31qrja1w0r2)):
                return $this->resolveCompoundType($V31qrja1w0r2, $Vylnw34ljlp1);
            case $this->isTypedArray($V31qrja1w0r2):
                return $this->resolveTypedArray($V31qrja1w0r2, $Vylnw34ljlp1);
            case $this->isFqsen($V31qrja1w0r2):
                return $this->resolveTypedObject($V31qrja1w0r2);
            case $this->isPartialStructuralElementName($V31qrja1w0r2):
                return $this->resolveTypedObject($V31qrja1w0r2, $Vylnw34ljlp1);
            
            default:
                
                throw new \RuntimeException(
                    'Unable to resolve type "' . $V31qrja1w0r2 . '", there is no known method to resolve it'
                );
        }
        
    }

    
    public function addKeyword($Vdee0d2hc1wc, $V31qrja1w0r2ClassName)
    {
        if (!class_exists($V31qrja1w0r2ClassName)) {
            throw new \InvalidArgumentException(
                'The Value Object that needs to be created with a keyword "' . $Vdee0d2hc1wc . '" must be an existing class'
                . ' but we could not find the class ' . $V31qrja1w0r2ClassName
            );
        }

        if (!in_array(Type::class, class_implements($V31qrja1w0r2ClassName))) {
            throw new \InvalidArgumentException(
                'The class "' . $V31qrja1w0r2ClassName . '" must implement the interface "phpDocumentor\Reflection\Type"'
            );
        }

        $this->keywords[$Vdee0d2hc1wc] = $V31qrja1w0r2ClassName;
    }

    
    private function isTypedArray($V31qrja1w0r2)
    {
        return substr($V31qrja1w0r2, -2) === self::OPERATOR_ARRAY;
    }

    
    private function isKeyword($V31qrja1w0r2)
    {
        return in_array(strtolower($V31qrja1w0r2), array_keys($this->keywords), true);
    }

    
    private function isPartialStructuralElementName($V31qrja1w0r2)
    {
        return ($V31qrja1w0r2[0] !== self::OPERATOR_NAMESPACE) && !$this->isKeyword($V31qrja1w0r2);
    }

    
    private function isFqsen($V31qrja1w0r2)
    {
        return strpos($V31qrja1w0r2, self::OPERATOR_NAMESPACE) === 0;
    }

    
    private function isCompoundType($V31qrja1w0r2)
    {
        return strpos($V31qrja1w0r2, '|') !== false;
    }

    
    private function isNullableType($V31qrja1w0r2)
    {
        return $V31qrja1w0r2[0] === '?';
    }

    
    private function resolveTypedArray($V31qrja1w0r2, Context $Vylnw34ljlp1)
    {
        return new Array_($this->resolve(substr($V31qrja1w0r2, 0, -2), $Vylnw34ljlp1));
    }

    
    private function resolveKeyword($V31qrja1w0r2)
    {
        $Vh0iae5cev4i = $this->keywords[strtolower($V31qrja1w0r2)];

        return new $Vh0iae5cev4i();
    }

    
    private function resolveTypedObject($V31qrja1w0r2, Context $Vylnw34ljlp1 = null)
    {
        return new Object_($this->fqsenResolver->resolve($V31qrja1w0r2, $Vylnw34ljlp1));
    }

    
    private function resolveCompoundType($V31qrja1w0r2, Context $Vylnw34ljlp1)
    {
        $V31qrja1w0r2s = [];

        foreach (explode('|', $V31qrja1w0r2) as $Vrohh3rksufh) {
            $V31qrja1w0r2s[] = $this->resolve($Vrohh3rksufh, $Vylnw34ljlp1);
        }

        return new Compound($V31qrja1w0r2s);
    }

    
    private function resolveNullableType($V31qrja1w0r2, Context $Vylnw34ljlp1)
    {
        return new Nullable($this->resolve(ltrim($V31qrja1w0r2, '?'), $Vylnw34ljlp1));
    }
}
