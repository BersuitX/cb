<?php



class PHPUnit_Framework_MockObject_Stub_ReturnArgument extends PHPUnit_Framework_MockObject_Stub_Return
{
    protected $Vez5gbw2si3p;

    public function __construct($Vez5gbw2si3p)
    {
        $this->argumentIndex = $Vez5gbw2si3p;
    }

    public function invoke(PHPUnit_Framework_MockObject_Invocation $Vplre42uzidm)
    {
        if (isset($Vplre42uzidm->parameters[$this->argumentIndex])) {
            return $Vplre42uzidm->parameters[$this->argumentIndex];
        } else {
            return;
        }
    }

    public function toString()
    {
        return sprintf('return argument #%d', $this->argumentIndex);
    }
}
