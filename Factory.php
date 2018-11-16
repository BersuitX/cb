<?php



namespace Prophecy\Comparator;

use SebastianBergmann\Comparator\Factory as BaseFactory;


final class Factory extends BaseFactory
{
    
    private static $Vbikgxmsfl21;

    public function __construct()
    {
        parent::__construct();

        $this->register(new ClosureComparator());
        $this->register(new ProphecyComparator());
    }

    
    public static function getInstance()
    {
        if (self::$Vbikgxmsfl21 === null) {
            self::$Vbikgxmsfl21 = new Factory;
        }

        return self::$Vbikgxmsfl21;
    }
}
