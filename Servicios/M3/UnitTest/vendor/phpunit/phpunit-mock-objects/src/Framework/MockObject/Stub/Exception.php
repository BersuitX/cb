<?php


use SebastianBergmann\Exporter\Exporter;


class PHPUnit_Framework_MockObject_Stub_Exception implements PHPUnit_Framework_MockObject_Stub
{
    protected $Vzzme31ixifp;

    public function __construct(Exception $Vzzme31ixifp)
    {
        $this->exception = $Vzzme31ixifp;
    }

    public function invoke(PHPUnit_Framework_MockObject_Invocation $Vplre42uzidm)
    {
        throw $this->exception;
    }

    public function toString()
    {
        $Vnqoiikqsyp5 = new Exporter;

        return sprintf(
            'raise user-specified exception %s',
            $Vnqoiikqsyp5->export($this->exception)
        );
    }
}
