<?php


namespace phpDocumentor\Reflection;

use phpDocumentor\Reflection\Types\Context;

class FqsenResolver
{
    
    const OPERATOR_NAMESPACE = '\\';

    public function resolve($Vdipqmegdb34, Context $Vylnw34ljlp1 = null)
    {
        if ($Vylnw34ljlp1 === null) {
            $Vylnw34ljlp1 = new Context('');
        }

        if ($this->isFqsen($Vdipqmegdb34)) {
            return new Fqsen($Vdipqmegdb34);
        }

        return $this->resolvePartialStructuralElementName($Vdipqmegdb34, $Vylnw34ljlp1);
    }

    
    private function isFqsen($V31qrja1w0r2)
    {
        return strpos($V31qrja1w0r2, self::OPERATOR_NAMESPACE) === 0;
    }

    
    private function resolvePartialStructuralElementName($V31qrja1w0r2, Context $Vylnw34ljlp1)
    {
        $V31qrja1w0r2Parts = explode(self::OPERATOR_NAMESPACE, $V31qrja1w0r2, 2);

        $Vfj1ednexsds = $Vylnw34ljlp1->getNamespaceAliases();

        
        if (!isset($Vfj1ednexsds[$V31qrja1w0r2Parts[0]])) {
            $Vi4q0wxavk53 = $Vylnw34ljlp1->getNamespace();
            if ('' !== $Vi4q0wxavk53) {
                $Vi4q0wxavk53 .= self::OPERATOR_NAMESPACE;
            }

            return new Fqsen(self::OPERATOR_NAMESPACE . $Vi4q0wxavk53 . $V31qrja1w0r2);
        }

        $V31qrja1w0r2Parts[0] = $Vfj1ednexsds[$V31qrja1w0r2Parts[0]];

        return new Fqsen(self::OPERATOR_NAMESPACE . implode(self::OPERATOR_NAMESPACE, $V31qrja1w0r2Parts));
    }
}
