<?php



namespace Prophecy\Doubler\Generator;

use Prophecy\Exception\InvalidArgumentException;
use Prophecy\Exception\Doubler\ClassMirrorException;
use ReflectionClass;
use ReflectionMethod;
use ReflectionParameter;


class ClassMirror
{
    private static $Vdrelmmdiil5 = array(
        '__construct',
        '__destruct',
        '__sleep',
        '__wakeup',
        '__toString',
        '__call',
        '__invoke'
    );

    
    public function reflect(ReflectionClass $Vqmu1sajhgfn = null, array $Voahpkaubtr3)
    {
        $Vpbrymo1kvdk = new Node\ClassNode;

        if (null !== $Vqmu1sajhgfn) {
            if (true === $Vqmu1sajhgfn->isInterface()) {
                throw new InvalidArgumentException(sprintf(
                    "Could not reflect %s as a class, because it\n".
                    "is interface - use the second argument instead.",
                    $Vqmu1sajhgfn->getName()
                ));
            }

            $this->reflectClassToNode($Vqmu1sajhgfn, $Vpbrymo1kvdk);
        }

        foreach ($Voahpkaubtr3 as $Vblpzgjj4s3y) {
            if (!$Vblpzgjj4s3y instanceof ReflectionClass) {
                throw new InvalidArgumentException(sprintf(
                    "[ReflectionClass \$Vblpzgjj4s3y1 [, ReflectionClass \$Vblpzgjj4s3y2]] array expected as\n".
                    "a second argument to `ClassMirror::reflect(...)`, but got %s.",
                    is_object($Vblpzgjj4s3y) ? get_class($Vblpzgjj4s3y).' class' : gettype($Vblpzgjj4s3y)
                ));
            }
            if (false === $Vblpzgjj4s3y->isInterface()) {
                throw new InvalidArgumentException(sprintf(
                    "Could not reflect %s as an interface, because it\n".
                    "is class - use the first argument instead.",
                    $Vblpzgjj4s3y->getName()
                ));
            }

            $this->reflectInterfaceToNode($Vblpzgjj4s3y, $Vpbrymo1kvdk);
        }

        $Vpbrymo1kvdk->addInterface('Prophecy\Doubler\Generator\ReflectionInterface');

        return $Vpbrymo1kvdk;
    }

    private function reflectClassToNode(ReflectionClass $Vqmu1sajhgfn, Node\ClassNode $Vpbrymo1kvdk)
    {
        if (true === $Vqmu1sajhgfn->isFinal()) {
            throw new ClassMirrorException(sprintf(
                'Could not reflect class %s as it is marked final.', $Vqmu1sajhgfn->getName()
            ), $Vqmu1sajhgfn);
        }

        $Vpbrymo1kvdk->setParentClass($Vqmu1sajhgfn->getName());

        foreach ($Vqmu1sajhgfn->getMethods(ReflectionMethod::IS_ABSTRACT) as $Vtlfvdwskdge) {
            if (false === $Vtlfvdwskdge->isProtected()) {
                continue;
            }

            $this->reflectMethodToNode($Vtlfvdwskdge, $Vpbrymo1kvdk);
        }

        foreach ($Vqmu1sajhgfn->getMethods(ReflectionMethod::IS_PUBLIC) as $Vtlfvdwskdge) {
            if (0 === strpos($Vtlfvdwskdge->getName(), '_')
                && !in_array($Vtlfvdwskdge->getName(), self::$Vdrelmmdiil5)) {
                continue;
            }

            if (true === $Vtlfvdwskdge->isFinal()) {
                $Vpbrymo1kvdk->addUnextendableMethod($Vtlfvdwskdge->getName());
                continue;
            }

            $this->reflectMethodToNode($Vtlfvdwskdge, $Vpbrymo1kvdk);
        }
    }

    private function reflectInterfaceToNode(ReflectionClass $Vblpzgjj4s3y, Node\ClassNode $Vpbrymo1kvdk)
    {
        $Vpbrymo1kvdk->addInterface($Vblpzgjj4s3y->getName());

        foreach ($Vblpzgjj4s3y->getMethods() as $Vtlfvdwskdge) {
            $this->reflectMethodToNode($Vtlfvdwskdge, $Vpbrymo1kvdk);
        }
    }

    private function reflectMethodToNode(ReflectionMethod $Vtlfvdwskdge, Node\ClassNode $Vqmu1sajhgfnNode)
    {
        $Vpbrymo1kvdk = new Node\MethodNode($Vtlfvdwskdge->getName());

        if (true === $Vtlfvdwskdge->isProtected()) {
            $Vpbrymo1kvdk->setVisibility('protected');
        }

        if (true === $Vtlfvdwskdge->isStatic()) {
            $Vpbrymo1kvdk->setStatic();
        }

        if (true === $Vtlfvdwskdge->returnsReference()) {
            $Vpbrymo1kvdk->setReturnsReference();
        }

        if (version_compare(PHP_VERSION, '7.0', '>=') && $Vtlfvdwskdge->hasReturnType()) {
            $Vyqhyew5tiwd = (string) $Vtlfvdwskdge->getReturnType();
            $Vyqhyew5tiwdLower = strtolower($Vyqhyew5tiwd);

            if ('self' === $Vyqhyew5tiwdLower) {
                $Vyqhyew5tiwd = $Vtlfvdwskdge->getDeclaringClass()->getName();
            }
            if ('parent' === $Vyqhyew5tiwdLower) {
                $Vyqhyew5tiwd = $Vtlfvdwskdge->getDeclaringClass()->getParentClass()->getName();
            }

            $Vpbrymo1kvdk->setReturnType($Vyqhyew5tiwd);

            if (version_compare(PHP_VERSION, '7.1', '>=') && $Vtlfvdwskdge->getReturnType()->allowsNull()) {
                $Vpbrymo1kvdk->setNullableReturnType(true);
            }
        }

        if (is_array($Vdhafuyqqxgk = $Vtlfvdwskdge->getParameters()) && count($Vdhafuyqqxgk)) {
            foreach ($Vdhafuyqqxgk as $Vujboxjk2s1s) {
                $this->reflectArgumentToNode($Vujboxjk2s1s, $Vpbrymo1kvdk);
            }
        }

        $Vqmu1sajhgfnNode->addMethod($Vpbrymo1kvdk);
    }

    private function reflectArgumentToNode(ReflectionParameter $Vujboxjk2s1seter, Node\MethodNode $VtlfvdwskdgeNode)
    {
        $Vgpjmw221p0b = $Vujboxjk2s1seter->getName() == '...' ? '__dot_dot_dot__' : $Vujboxjk2s1seter->getName();
        $Vpbrymo1kvdk = new Node\ArgumentNode($Vgpjmw221p0b);

        $Vpbrymo1kvdk->setTypeHint($this->getTypeHint($Vujboxjk2s1seter));

        if ($this->isVariadic($Vujboxjk2s1seter)) {
            $Vpbrymo1kvdk->setAsVariadic();
        }

        if ($this->hasDefaultValue($Vujboxjk2s1seter)) {
            $Vpbrymo1kvdk->setDefault($this->getDefaultValue($Vujboxjk2s1seter));
        }

        if ($Vujboxjk2s1seter->isPassedByReference()) {
            $Vpbrymo1kvdk->setAsPassedByReference();
        }

        $VtlfvdwskdgeNode->addArgument($Vpbrymo1kvdk);
    }

    private function hasDefaultValue(ReflectionParameter $Vujboxjk2s1seter)
    {
        if ($this->isVariadic($Vujboxjk2s1seter)) {
            return false;
        }

        if ($Vujboxjk2s1seter->isDefaultValueAvailable()) {
            return true;
        }

        return $Vujboxjk2s1seter->isOptional() || $this->isNullable($Vujboxjk2s1seter);
    }

    private function getDefaultValue(ReflectionParameter $Vujboxjk2s1seter)
    {
        if (!$Vujboxjk2s1seter->isDefaultValueAvailable()) {
            return null;
        }

        return $Vujboxjk2s1seter->getDefaultValue();
    }

    private function getTypeHint(ReflectionParameter $Vujboxjk2s1seter)
    {
        if (null !== $Vqmu1sajhgfnName = $this->getParameterClassName($Vujboxjk2s1seter)) {
            return $Vqmu1sajhgfnName;
        }

        if (true === $Vujboxjk2s1seter->isArray()) {
            return 'array';
        }

        if (version_compare(PHP_VERSION, '5.4', '>=') && true === $Vujboxjk2s1seter->isCallable()) {
            return 'callable';
        }

        if (version_compare(PHP_VERSION, '7.0', '>=') && true === $Vujboxjk2s1seter->hasType()) {
            return (string) $Vujboxjk2s1seter->getType();
        }

        return null;
    }

    private function isVariadic(ReflectionParameter $Vujboxjk2s1seter)
    {
        return PHP_VERSION_ID >= 50600 && $Vujboxjk2s1seter->isVariadic();
    }

    private function isNullable(ReflectionParameter $Vujboxjk2s1seter)
    {
        return $Vujboxjk2s1seter->allowsNull() && null !== $this->getTypeHint($Vujboxjk2s1seter);
    }

    private function getParameterClassName(ReflectionParameter $Vujboxjk2s1seter)
    {
        try {
            return $Vujboxjk2s1seter->getClass() ? $Vujboxjk2s1seter->getClass()->getName() : null;
        } catch (\ReflectionException $Vpt32vvhspnv) {
            preg_match('/\[\s\<\w+?>\s([\w,\\\]+)/s', $Vujboxjk2s1seter, $Virbphhh55ue);

            return isset($Virbphhh55ue[1]) ? $Virbphhh55ue[1] : null;
        }
    }
}
