<?php


namespace phpDocumentor\Reflection\Types;


final class Context
{
    
    private $Vi4q0wxavk53;

    
    private $Vi4q0wxavk53Aliases;

    
    public function __construct($Vi4q0wxavk53, array $Vi4q0wxavk53Aliases = [])
    {
        $this->namespace = ('global' !== $Vi4q0wxavk53 && 'default' !== $Vi4q0wxavk53)
            ? trim((string)$Vi4q0wxavk53, '\\')
            : '';

        foreach ($Vi4q0wxavk53Aliases as $V3wv5avvipt3 => $Vzldwenz0ruq) {
            if ($Vzldwenz0ruq[0] === '\\') {
                $Vzldwenz0ruq = substr($Vzldwenz0ruq, 1);
            }
            if ($Vzldwenz0ruq[strlen($Vzldwenz0ruq) - 1] === '\\') {
                $Vzldwenz0ruq = substr($Vzldwenz0ruq, 0, -1);
            }

            $Vi4q0wxavk53Aliases[$V3wv5avvipt3] = $Vzldwenz0ruq;
        }

        $this->namespaceAliases = $Vi4q0wxavk53Aliases;
    }

    
    public function getNamespace()
    {
        return $this->namespace;
    }

    
    public function getNamespaceAliases()
    {
        return $this->namespaceAliases;
    }
}
