<?php


namespace SebastianBergmann\Comparator;


class Factory
{
    
    private $Vrfkit15dxq3 = array();

    
    private static $Vbikgxmsfl21;

    
    public function __construct()
    {
        $this->register(new TypeComparator);
        $this->register(new ScalarComparator);
        $this->register(new NumericComparator);
        $this->register(new DoubleComparator);
        $this->register(new ArrayComparator);
        $this->register(new ResourceComparator);
        $this->register(new ObjectComparator);
        $this->register(new ExceptionComparator);
        $this->register(new SplObjectStorageComparator);
        $this->register(new DOMNodeComparator);
        $this->register(new MockObjectComparator);
        $this->register(new DateTimeComparator);
    }

    
    public static function getInstance()
    {
        if (self::$Vbikgxmsfl21 === null) {
            self::$Vbikgxmsfl21 = new self;
        }

        return self::$Vbikgxmsfl21;
    }

    
    public function getComparatorFor($Vwcb1oykhumm, $Vs4nw03sqcam)
    {
        foreach ($this->comparators as $V23fl2cvtaex) {
            if ($V23fl2cvtaex->accepts($Vwcb1oykhumm, $Vs4nw03sqcam)) {
                return $V23fl2cvtaex;
            }
        }
    }

    
    public function register(Comparator $V23fl2cvtaex)
    {
        array_unshift($this->comparators, $V23fl2cvtaex);

        $V23fl2cvtaex->setFactory($this);
    }

    
    public function unregister(Comparator $V23fl2cvtaex)
    {
        foreach ($this->comparators as $Vlpbz5aloxqt => $Vga52peb1ygk) {
            if ($V23fl2cvtaex === $Vga52peb1ygk) {
                unset($this->comparators[$Vlpbz5aloxqt]);
            }
        }
    }
}
