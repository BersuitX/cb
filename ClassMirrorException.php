<?php



namespace Prophecy\Exception\Doubler;

use ReflectionClass;

class ClassMirrorException extends \RuntimeException implements DoublerException
{
    private $Vqmu1sajhgfn;

    public function __construct($Vbl4yrmdan1y, ReflectionClass $Vqmu1sajhgfn)
    {
        parent::__construct($Vbl4yrmdan1y);

        $this->class = $Vqmu1sajhgfn;
    }

    public function getReflectedClass()
    {
        return $this->class;
    }
}
