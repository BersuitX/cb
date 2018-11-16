<?php


use SebastianBergmann\Exporter\Exporter;


class PHPUnit_Framework_MockObject_Stub_ConsecutiveCalls implements PHPUnit_Framework_MockObject_Stub
{
    protected $V4g2wbm2eqr0;
    protected $Vcptarsq5qe4;

    public function __construct($V4g2wbm2eqr0)
    {
        $this->stack = $V4g2wbm2eqr0;
    }

    public function invoke(PHPUnit_Framework_MockObject_Invocation $Vplre42uzidm)
    {
        $this->value = array_shift($this->stack);

        if ($this->value instanceof PHPUnit_Framework_MockObject_Stub) {
            $this->value = $this->value->invoke($Vplre42uzidm);
        }

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
