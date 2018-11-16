<?php



namespace Prophecy\Call;

use Exception;


class Call
{
    private $Vc1exo5hbki5;
    private $Vj23lbel2xn0;
    private $Vvsvqhpcr3ye;
    private $Vzzme31ixifp;
    private $Vpu3xl4uhgg5;
    private $Vrwsmtja4f2j;

    
    public function __construct($Vc1exo5hbki5, array $Vj23lbel2xn0, $Vvsvqhpcr3ye,
                                Exception $Vzzme31ixifp = null, $Vpu3xl4uhgg5, $Vrwsmtja4f2j)
    {
        $this->methodName  = $Vc1exo5hbki5;
        $this->arguments   = $Vj23lbel2xn0;
        $this->returnValue = $Vvsvqhpcr3ye;
        $this->exception   = $Vzzme31ixifp;

        if ($Vpu3xl4uhgg5) {
            $this->file = $Vpu3xl4uhgg5;
            $this->line = intval($Vrwsmtja4f2j);
        }
    }

    
    public function getMethodName()
    {
        return $this->methodName;
    }

    
    public function getArguments()
    {
        return $this->arguments;
    }

    
    public function getReturnValue()
    {
        return $this->returnValue;
    }

    
    public function getException()
    {
        return $this->exception;
    }

    
    public function getFile()
    {
        return $this->file;
    }

    
    public function getLine()
    {
        return $this->line;
    }

    
    public function getCallPlace()
    {
        if (null === $this->file) {
            return 'unknown';
        }

        return sprintf('%s:%d', $this->file, $this->line);
    }
}
