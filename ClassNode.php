<?php



namespace Prophecy\Doubler\Generator\Node;

use Prophecy\Exception\Doubler\MethodNotExtendableException;
use Prophecy\Exception\InvalidArgumentException;


class ClassNode
{
    private $Vn2ytwd2xrfv = 'stdClass';
    private $Voahpkaubtr3  = array();
    private $Vr5bjxtnldcv  = array();
    private $Vgkwlonippsi = array();

    
    private $V0yfl5ulns0o     = array();

    public function getParentClass()
    {
        return $this->parentClass;
    }

    
    public function setParentClass($Vqmu1sajhgfn)
    {
        $this->parentClass = $Vqmu1sajhgfn ?: 'stdClass';
    }

    
    public function getInterfaces()
    {
        return $this->interfaces;
    }

    
    public function addInterface($Vblpzgjj4s3y)
    {
        if ($this->hasInterface($Vblpzgjj4s3y)) {
            return;
        }

        array_unshift($this->interfaces, $Vblpzgjj4s3y);
    }

    
    public function hasInterface($Vblpzgjj4s3y)
    {
        return in_array($Vblpzgjj4s3y, $this->interfaces);
    }

    public function getProperties()
    {
        return $this->properties;
    }

    public function addProperty($Vgpjmw221p0b, $Vo3cmnhpplip = 'public')
    {
        $Vo3cmnhpplip = strtolower($Vo3cmnhpplip);

        if (!in_array($Vo3cmnhpplip, array('public', 'private', 'protected'))) {
            throw new InvalidArgumentException(sprintf(
                '`%s` property visibility is not supported.', $Vo3cmnhpplip
            ));
        }

        $this->properties[$Vgpjmw221p0b] = $Vo3cmnhpplip;
    }

    
    public function getMethods()
    {
        return $this->methods;
    }

    public function addMethod(MethodNode $Vtlfvdwskdge)
    {
        if (!$this->isExtendable($Vtlfvdwskdge->getName())){
            $Vbl4yrmdan1y = sprintf(
                'Method `%s` is not extendable, so can not be added.', $Vtlfvdwskdge->getName()
            );
            throw new MethodNotExtendableException($Vbl4yrmdan1y, $this->getParentClass(), $Vtlfvdwskdge->getName());
        }
        $this->methods[$Vtlfvdwskdge->getName()] = $Vtlfvdwskdge;
    }

    public function removeMethod($Vgpjmw221p0b)
    {
        unset($this->methods[$Vgpjmw221p0b]);
    }

    
    public function getMethod($Vgpjmw221p0b)
    {
        return $this->hasMethod($Vgpjmw221p0b) ? $this->methods[$Vgpjmw221p0b] : null;
    }

    
    public function hasMethod($Vgpjmw221p0b)
    {
        return isset($this->methods[$Vgpjmw221p0b]);
    }

    
    public function getUnextendableMethods()
    {
        return $this->unextendableMethods;
    }

    
    public function addUnextendableMethod($Vkifartfp1bi)
    {
        if (!$this->isExtendable($Vkifartfp1bi)){
            return;
        }
        $this->unextendableMethods[] = $Vkifartfp1bi;
    }

    
    public function isExtendable($Vtlfvdwskdge)
    {
        return !in_array($Vtlfvdwskdge, $this->unextendableMethods);
    }
}
