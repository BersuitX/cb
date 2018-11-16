<?php



namespace Prophecy\Doubler\Generator\Node;

use Prophecy\Doubler\Generator\TypeHintReference;
use Prophecy\Exception\InvalidArgumentException;


class MethodNode
{
    private $Vgpjmw221p0b;
    private $V5kll1klco0v;
    private $Vo3cmnhpplip = 'public';
    private $Voyfr0hmk3rl = false;
    private $Vdyiix25oy1c = false;
    private $Vyqhyew5tiwd;
    private $V202rpdqaqki = false;

    
    private $Vj23lbel2xn0 = array();

    
    private $Vztvbz5clo1i;

    
    public function __construct($Vgpjmw221p0b, $V5kll1klco0v = null, TypeHintReference $Vztvbz5clo1i = null)
    {
        $this->name = $Vgpjmw221p0b;
        $this->code = $V5kll1klco0v;
        $this->typeHintReference = $Vztvbz5clo1i ?: new TypeHintReference();
    }

    public function getVisibility()
    {
        return $this->visibility;
    }

    
    public function setVisibility($Vo3cmnhpplip)
    {
        $Vo3cmnhpplip = strtolower($Vo3cmnhpplip);

        if (!in_array($Vo3cmnhpplip, array('public', 'private', 'protected'))) {
            throw new InvalidArgumentException(sprintf(
                '`%s` method visibility is not supported.', $Vo3cmnhpplip
            ));
        }

        $this->visibility = $Vo3cmnhpplip;
    }

    public function isStatic()
    {
        return $this->static;
    }

    public function setStatic($Voyfr0hmk3rl = true)
    {
        $this->static = (bool) $Voyfr0hmk3rl;
    }

    public function returnsReference()
    {
        return $this->returnsReference;
    }

    public function setReturnsReference()
    {
        $this->returnsReference = true;
    }

    public function getName()
    {
        return $this->name;
    }

    public function addArgument(ArgumentNode $Vlf5kwra10uk)
    {
        $this->arguments[] = $Vlf5kwra10uk;
    }

    
    public function getArguments()
    {
        return $this->arguments;
    }

    public function hasReturnType()
    {
        return null !== $this->returnType;
    }

    
    public function setReturnType($V31qrja1w0r2 = null)
    {
        if ($V31qrja1w0r2 === '' || $V31qrja1w0r2 === null) {
            $this->returnType = null;
            return;
        }
        $V31qrja1w0r2Map = array(
            'double' => 'float',
            'real' => 'float',
            'boolean' => 'bool',
            'integer' => 'int',
        );
        if (isset($V31qrja1w0r2Map[$V31qrja1w0r2])) {
            $V31qrja1w0r2 = $V31qrja1w0r2Map[$V31qrja1w0r2];
        }
        $this->returnType = $this->typeHintReference->isBuiltInReturnTypeHint($V31qrja1w0r2) ?
            $V31qrja1w0r2 :
            '\\' . ltrim($V31qrja1w0r2, '\\');
    }

    public function getReturnType()
    {
        return $this->returnType;
    }

    
    public function setNullableReturnType($Viyo1vceetid = true)
    {
        $this->nullableReturnType = (bool) $Viyo1vceetid;
    }

    
    public function hasNullableReturnType()
    {
        return $this->nullableReturnType;
    }

    
    public function setCode($V5kll1klco0v)
    {
        $this->code = $V5kll1klco0v;
    }

    public function getCode()
    {
        if ($this->returnsReference)
        {
            return "throw new \Prophecy\Exception\Doubler\ReturnByReferenceException('Returning by reference not supported', get_class(\$this), '{$this->name}');";
        }

        return (string) $this->code;
    }

    public function useParentCode()
    {
        $this->code = sprintf(
            'return parent::%s(%s);', $this->getName(), implode(', ',
                array_map(array($this, 'generateArgument'), $this->arguments)
            )
        );
    }

    private function generateArgument(ArgumentNode $V5mddzgxir3y)
    {
        $Vlf5kwra10uk = '$'.$V5mddzgxir3y->getName();

        if ($V5mddzgxir3y->isVariadic()) {
            $Vlf5kwra10uk = '...'.$Vlf5kwra10uk;
        }

        return $Vlf5kwra10uk;
    }
}
