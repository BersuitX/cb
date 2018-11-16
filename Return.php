<?php


use SebastianBergmann\Exporter\Exporter;


class PHPUnit_Framework_MockObject_Stub_Return implements PHPUnit_Framework_MockObject_Stub
{
    protected $Vcptarsq5qe4;

    public function __construct($Vcptarsq5qe4)
    {
        $this->value = $Vcptarsq5qe4;
    }

    public function invoke(PHPUnit_Framework_MockObject_Invocation $Vplre42uzidm)
    {
        return $this->value;
    }

    public function toString()
    {
        $Vnqoiikqsyp5 = new Exporter;

        return sprintf(
            'return user-specified value %s',
            $Vnqoiikqsyp5->export($this->value)
        );
    }
}
