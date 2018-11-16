<?php



class PHPUnit_Framework_Constraint_Count extends PHPUnit_Framework_Constraint
{
    
    protected $V3touerk1rgc = 0;

    
    public function __construct($Vwcb1oykhumm)
    {
        parent::__construct();
        $this->expectedCount = $Vwcb1oykhumm;
    }

    
    protected function matches($Vddxcctrvo5d)
    {
        return $this->expectedCount === $this->getCountOf($Vddxcctrvo5d);
    }

    
    protected function getCountOf($Vddxcctrvo5d)
    {
        if ($Vddxcctrvo5d instanceof Countable || is_array($Vddxcctrvo5d)) {
            return count($Vddxcctrvo5d);
        } elseif ($Vddxcctrvo5d instanceof Traversable) {
            if ($Vddxcctrvo5d instanceof IteratorAggregate) {
                $Vnv250ah4t1q = $Vddxcctrvo5d->getIterator();
            } else {
                $Vnv250ah4t1q = $Vddxcctrvo5d;
            }

            $Vlpbz5aloxqt   = $Vnv250ah4t1q->key();
            $Vdbkece3gnp5 = iterator_count($Vnv250ah4t1q);

            
            
            if ($Vlpbz5aloxqt !== null) {
                $Vnv250ah4t1q->rewind();
                while ($Vnv250ah4t1q->valid() && $Vlpbz5aloxqt !== $Vnv250ah4t1q->key()) {
                    $Vnv250ah4t1q->next();
                }
            }

            return $Vdbkece3gnp5;
        }
    }

    
    protected function failureDescription($Vddxcctrvo5d)
    {
        return sprintf(
            'actual size %d matches expected size %d',
            $this->getCountOf($Vddxcctrvo5d),
            $this->expectedCount
        );
    }

    
    public function toString()
    {
        return sprintf(
            'count matches %d',
            $this->expectedCount
        );
    }
}
