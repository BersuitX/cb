<?php



namespace Prophecy\Doubler\Generator;


class ClassCodeGenerator
{
    
    private $Vztvbz5clo1i;

    public function __construct(TypeHintReference $Vztvbz5clo1i = null)
    {
        $this->typeHintReference = $Vztvbz5clo1i ?: new TypeHintReference();
    }

    
    public function generate($V3ngkdmbo02c, Node\ClassNode $Vqmu1sajhgfn)
    {
        $Vbkdgagqgicd     = explode('\\', $V3ngkdmbo02c);
        $V3ngkdmbo02c = array_pop($Vbkdgagqgicd);
        $Vi4q0wxavk53 = implode('\\', $Vbkdgagqgicd);

        $V5kll1klco0v = sprintf("class %s extends \%s implements %s {\n",
            $V3ngkdmbo02c, $Vqmu1sajhgfn->getParentClass(), implode(', ',
                array_map(function ($Vblpzgjj4s3y) {return '\\'.$Vblpzgjj4s3y;}, $Vqmu1sajhgfn->getInterfaces())
            )
        );

        foreach ($Vqmu1sajhgfn->getProperties() as $Vgpjmw221p0b => $Vo3cmnhpplip) {
            $V5kll1klco0v .= sprintf("%s \$%s;\n", $Vo3cmnhpplip, $Vgpjmw221p0b);
        }
        $V5kll1klco0v .= "\n";

        foreach ($Vqmu1sajhgfn->getMethods() as $Vtlfvdwskdge) {
            $V5kll1klco0v .= $this->generateMethod($Vtlfvdwskdge)."\n";
        }
        $V5kll1klco0v .= "\n}";

        return sprintf("namespace %s {\n%s\n}", $Vi4q0wxavk53, $V5kll1klco0v);
    }

    private function generateMethod(Node\MethodNode $Vtlfvdwskdge)
    {
        $Vkyiqtoxqbdy = sprintf("%s %s function %s%s(%s)%s {\n",
            $Vtlfvdwskdge->getVisibility(),
            $Vtlfvdwskdge->isStatic() ? 'static' : '',
            $Vtlfvdwskdge->returnsReference() ? '&':'',
            $Vtlfvdwskdge->getName(),
            implode(', ', $this->generateArguments($Vtlfvdwskdge->getArguments())),
            $this->getReturnType($Vtlfvdwskdge)
        );
        $Vkyiqtoxqbdy .= $Vtlfvdwskdge->getCode()."\n";

        return $Vkyiqtoxqbdy.'}';
    }

    
    private function getReturnType(Node\MethodNode $Vtlfvdwskdge)
    {
        if (version_compare(PHP_VERSION, '7.1', '>=')) {
            if ($Vtlfvdwskdge->hasReturnType()) {
                return $Vtlfvdwskdge->hasNullableReturnType()
                    ? sprintf(': ?%s', $Vtlfvdwskdge->getReturnType())
                    : sprintf(': %s', $Vtlfvdwskdge->getReturnType());
            }
        }

        if (version_compare(PHP_VERSION, '7.0', '>=')) {
            return $Vtlfvdwskdge->hasReturnType() && $Vtlfvdwskdge->getReturnType() !== 'void'
                ? sprintf(': %s', $Vtlfvdwskdge->getReturnType())
                : '';
        }

        return '';
    }

    private function generateArguments(array $Vj23lbel2xn0)
    {
        $Vztvbz5clo1i = $this->typeHintReference;
        return array_map(function (Node\ArgumentNode $Vlf5kwra10uk) use ($Vztvbz5clo1i) {
            $Vkyiqtoxqbdy = '';

            if (version_compare(PHP_VERSION, '7.1', '>=')) {
                $Vkyiqtoxqbdy .= $Vlf5kwra10uk->isNullable() ? '?' : '';
            }

            if ($Vffe0vrvhevo = $Vlf5kwra10uk->getTypeHint()) {
                $Vkyiqtoxqbdy .= $Vztvbz5clo1i->isBuiltInParamTypeHint($Vffe0vrvhevo) ? $Vffe0vrvhevo : '\\'.$Vffe0vrvhevo;
            }

            $Vkyiqtoxqbdy .= ' '.($Vlf5kwra10uk->isPassedByReference() ? '&' : '');

            $Vkyiqtoxqbdy .= $Vlf5kwra10uk->isVariadic() ? '...' : '';

            $Vkyiqtoxqbdy .= '$'.$Vlf5kwra10uk->getName();

            if ($Vlf5kwra10uk->isOptional() && !$Vlf5kwra10uk->isVariadic()) {
                $Vkyiqtoxqbdy .= ' = '.var_export($Vlf5kwra10uk->getDefault(), true);
            }

            return $Vkyiqtoxqbdy;
        }, $Vj23lbel2xn0);
    }
}
