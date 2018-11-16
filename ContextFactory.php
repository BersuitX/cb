<?php


namespace phpDocumentor\Reflection\Types;


final class ContextFactory
{
    
    const T_LITERAL_END_OF_USE = ';';

    
    const T_LITERAL_USE_SEPARATOR = ',';

    
    public function createFromReflector(\Reflector $Vf4nbpoij40n)
    {
        if (method_exists($Vf4nbpoij40n, 'getDeclaringClass')) {
            $Vf4nbpoij40n = $Vf4nbpoij40n->getDeclaringClass();
        }

        $Vuxrjtk44md2 = $Vf4nbpoij40n->getFileName();
        $Vi4q0wxavk53 = $Vf4nbpoij40n->getNamespaceName();

        if (file_exists($Vuxrjtk44md2)) {
            return $this->createForNamespace($Vi4q0wxavk53, file_get_contents($Vuxrjtk44md2));
        }

        return new Context($Vi4q0wxavk53, []);
    }

    
    public function createForNamespace($Vi4q0wxavk53, $Vzltfg2o2lgi)
    {
        $Vi4q0wxavk53 = trim($Vi4q0wxavk53, '\\');
        $Vqbsmz1uhy2j = [];
        $V3lkgblgwfzd = '';
        $Vthon1suqmsr = new \ArrayIterator(token_get_all($Vzltfg2o2lgi));

        while ($Vthon1suqmsr->valid()) {
            switch ($Vthon1suqmsr->current()[0]) {
                case T_NAMESPACE:
                    $V3lkgblgwfzd = $this->parseNamespace($Vthon1suqmsr);
                    break;
                case T_CLASS:
                    
                    
                    
                    $Vdcctap4m0e5 = 0;
                    $Vknjlhnnmtlb = false;
                    while ($Vthon1suqmsr->valid() && ($Vdcctap4m0e5 > 0 || !$Vknjlhnnmtlb)) {
                        if ($Vthon1suqmsr->current() === '{'
                            || $Vthon1suqmsr->current()[0] === T_CURLY_OPEN
                            || $Vthon1suqmsr->current()[0] === T_DOLLAR_OPEN_CURLY_BRACES) {
                            if (!$Vknjlhnnmtlb) {
                                $Vknjlhnnmtlb = true;
                            }
                            $Vdcctap4m0e5++;
                        }

                        if ($Vthon1suqmsr->current() === '}') {
                            $Vdcctap4m0e5--;
                        }
                        $Vthon1suqmsr->next();
                    }
                    break;
                case T_USE:
                    if ($V3lkgblgwfzd === $Vi4q0wxavk53) {
                        $Vqbsmz1uhy2j = array_merge($Vqbsmz1uhy2j, $this->parseUseStatement($Vthon1suqmsr));
                    }
                    break;
            }
            $Vthon1suqmsr->next();
        }

        return new Context($Vi4q0wxavk53, $Vqbsmz1uhy2j);
    }

    
    private function parseNamespace(\ArrayIterator $Vthon1suqmsr)
    {
        
        $this->skipToNextStringOrNamespaceSeparator($Vthon1suqmsr);

        $Vgpjmw221p0b = '';
        while ($Vthon1suqmsr->valid() && ($Vthon1suqmsr->current()[0] === T_STRING || $Vthon1suqmsr->current()[0] === T_NS_SEPARATOR)
        ) {
            $Vgpjmw221p0b .= $Vthon1suqmsr->current()[1];
            $Vthon1suqmsr->next();
        }

        return $Vgpjmw221p0b;
    }

    
    private function parseUseStatement(\ArrayIterator $Vthon1suqmsr)
    {
        $Vf3izj4v2xze = [];
        $V2nibo0sdsnh = true;

        while ($V2nibo0sdsnh) {
            $this->skipToNextStringOrNamespaceSeparator($Vthon1suqmsr);

            list($V3wv5avvipt3, $Vzldwenz0ruq) = $this->extractUseStatement($Vthon1suqmsr);
            $Vf3izj4v2xze[$V3wv5avvipt3] = $Vzldwenz0ruq;
            if ($Vthon1suqmsr->current()[0] === self::T_LITERAL_END_OF_USE) {
                $V2nibo0sdsnh = false;
            }
        }

        return $Vf3izj4v2xze;
    }

    
    private function skipToNextStringOrNamespaceSeparator(\ArrayIterator $Vthon1suqmsr)
    {
        while ($Vthon1suqmsr->valid() && ($Vthon1suqmsr->current()[0] !== T_STRING) && ($Vthon1suqmsr->current()[0] !== T_NS_SEPARATOR)) {
            $Vthon1suqmsr->next();
        }
    }

    
    private function extractUseStatement(\ArrayIterator $Vthon1suqmsr)
    {
        $Vv0hyvhlkjqr = [''];
        while ($Vthon1suqmsr->valid()
            && ($Vthon1suqmsr->current()[0] !== self::T_LITERAL_USE_SEPARATOR)
            && ($Vthon1suqmsr->current()[0] !== self::T_LITERAL_END_OF_USE)
        ) {
            if ($Vthon1suqmsr->current()[0] === T_AS) {
                $Vv0hyvhlkjqr[] = '';
            }
            if ($Vthon1suqmsr->current()[0] === T_STRING || $Vthon1suqmsr->current()[0] === T_NS_SEPARATOR) {
                $Vv0hyvhlkjqr[count($Vv0hyvhlkjqr) - 1] .= $Vthon1suqmsr->current()[1];
            }
            $Vthon1suqmsr->next();
        }

        if (count($Vv0hyvhlkjqr) == 1) {
            $V1pfn1lzehct = strrpos($Vv0hyvhlkjqr[0], '\\');

            if (false !== $V1pfn1lzehct) {
                $Vv0hyvhlkjqr[] = substr($Vv0hyvhlkjqr[0], $V1pfn1lzehct + 1);
            } else {
                $Vv0hyvhlkjqr[] = $Vv0hyvhlkjqr[0];
            }
        }

        return array_reverse($Vv0hyvhlkjqr);
    }
}
