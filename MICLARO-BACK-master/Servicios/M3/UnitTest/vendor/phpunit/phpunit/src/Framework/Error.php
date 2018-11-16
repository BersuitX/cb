<?php



class PHPUnit_Framework_Error extends PHPUnit_Framework_Exception
{
    
    public function __construct($Vbl4yrmdan1y, $V5kll1klco0v, $Vpu3xl4uhgg5, $Vrwsmtja4f2j, Exception $Vvnhp4yqbunj = null)
    {
        parent::__construct($Vbl4yrmdan1y, $V5kll1klco0v, $Vvnhp4yqbunj);

        $this->file  = $Vpu3xl4uhgg5;
        $this->line  = $Vrwsmtja4f2j;
    }
}
