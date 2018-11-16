<?php



class PHPUnit_Framework_Constraint_Callback extends PHPUnit_Framework_Constraint
{
    private $Vbbxwjhhenxj;

    
    public function __construct($Vbbxwjhhenxj)
    {
        if (!is_callable($Vbbxwjhhenxj)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                1,
                'callable'
            );
        }

        parent::__construct();

        $this->callback = $Vbbxwjhhenxj;
    }

    
    protected function matches($Vddxcctrvo5d)
    {
        return call_user_func($this->callback, $Vddxcctrvo5d);
    }

    
    public function toString()
    {
        return 'is accepted by specified callback';
    }
}
