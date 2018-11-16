<?php



namespace Prophecy\Doubler\Generator\Node;


class ArgumentNode
{
    private $Vgpjmw221p0b;
    private $Vx1vtvnslwrz;
    private $V0ekusmibtbl;
    private $Vvcpazd100lt    = false;
    private $V4dwtr1v4hrr = false;
    private $Vh2ut4ld1v3b  = false;
    private $Vy2doqngymzf  = false;

    
    public function __construct($Vgpjmw221p0b)
    {
        $this->name = $Vgpjmw221p0b;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTypeHint()
    {
        return $this->typeHint;
    }

    public function setTypeHint($Vx1vtvnslwrz = null)
    {
        $this->typeHint = $Vx1vtvnslwrz;
    }

    public function hasDefault()
    {
        return $this->isOptional() && !$this->isVariadic();
    }

    public function getDefault()
    {
        return $this->default;
    }

    public function setDefault($V0ekusmibtbl = null)
    {
        $this->optional = true;
        $this->default  = $V0ekusmibtbl;
    }

    public function isOptional()
    {
        return $this->optional;
    }

    public function setAsPassedByReference($V4dwtr1v4hrr = true)
    {
        $this->byReference = $V4dwtr1v4hrr;
    }

    public function isPassedByReference()
    {
        return $this->byReference;
    }

    public function setAsVariadic($Vh2ut4ld1v3b = true)
    {
        $this->isVariadic = $Vh2ut4ld1v3b;
    }

    public function isVariadic()
    {
        return $this->isVariadic;
    }

    public function isNullable()
    {
        return $this->isNullable;
    }

    public function setAsNullable($Vy2doqngymzf = true)
    {
        $this->isNullable = $Vy2doqngymzf;
    }
}
