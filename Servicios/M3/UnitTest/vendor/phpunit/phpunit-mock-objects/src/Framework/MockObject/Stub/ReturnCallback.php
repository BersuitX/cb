<?php



class PHPUnit_Framework_MockObject_Stub_ReturnCallback implements PHPUnit_Framework_MockObject_Stub
{
    protected $Vbbxwjhhenxj;

    public function __construct($Vbbxwjhhenxj)
    {
        $this->callback = $Vbbxwjhhenxj;
    }

    public function invoke(PHPUnit_Framework_MockObject_Invocation $Vplre42uzidm)
    {
        return call_user_func_array($this->callback, $Vplre42uzidm->parameters);
    }

    public function toString()
    {
        if (is_array($this->callback)) {
            if (is_object($this->callback[0])) {
                $Vqmu1sajhgfn = get_class($this->callback[0]);
                $V31qrja1w0r2  = '->';
            } else {
                $Vqmu1sajhgfn = $this->callback[0];
                $V31qrja1w0r2  = '::';
            }

            return sprintf(
                'return result of user defined callback %s%s%s() with the ' .
                'passed arguments',
                $Vqmu1sajhgfn,
                $V31qrja1w0r2,
                $this->callback[1]
            );
        } else {
            return 'return result of user defined callback ' . $this->callback .
                   ' with the passed arguments';
        }
    }
}
