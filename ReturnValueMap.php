<?php



class PHPUnit_Framework_MockObject_Stub_ReturnValueMap implements PHPUnit_Framework_MockObject_Stub
{
    protected $Vfnh0wmpi3ij;

    public function __construct(array $Vfnh0wmpi3ij)
    {
        $this->valueMap = $Vfnh0wmpi3ij;
    }

    public function invoke(PHPUnit_Framework_MockObject_Invocation $Vplre42uzidm)
    {
        $V51ugznzca1o = count($Vplre42uzidm->parameters);

        foreach ($this->valueMap as $Vbdjnzdn3xmh) {
            if (!is_array($Vbdjnzdn3xmh) || $V51ugznzca1o != count($Vbdjnzdn3xmh) - 1) {
                continue;
            }

            $Vrpudtlhfyg0 = array_pop($Vbdjnzdn3xmh);
            if ($Vplre42uzidm->parameters === $Vbdjnzdn3xmh) {
                return $Vrpudtlhfyg0;
            }
        }

        return;
    }

    public function toString()
    {
        return 'return value from a map';
    }
}
