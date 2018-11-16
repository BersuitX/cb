<?php



namespace Prophecy\Doubler;

use Prophecy\Exception\Doubler\DoubleException;
use Prophecy\Exception\Doubler\ClassNotFoundException;
use Prophecy\Exception\Doubler\InterfaceNotFoundException;
use ReflectionClass;


class LazyDouble
{
    private $Vkogfwai13gg;
    private $Vqmu1sajhgfn;
    private $Voahpkaubtr3 = array();
    private $Vj23lbel2xn0  = null;
    private $Vyikircvzioe;

    
    public function __construct(Doubler $Vkogfwai13gg)
    {
        $this->doubler = $Vkogfwai13gg;
    }

    
    public function setParentClass($Vqmu1sajhgfn)
    {
        if (null !== $this->double) {
            throw new DoubleException('Can not extend class with already instantiated double.');
        }

        if (!$Vqmu1sajhgfn instanceof ReflectionClass) {
            if (!class_exists($Vqmu1sajhgfn)) {
                throw new ClassNotFoundException(sprintf('Class %s not found.', $Vqmu1sajhgfn), $Vqmu1sajhgfn);
            }

            $Vqmu1sajhgfn = new ReflectionClass($Vqmu1sajhgfn);
        }

        $this->class = $Vqmu1sajhgfn;
    }

    
    public function addInterface($Vblpzgjj4s3y)
    {
        if (null !== $this->double) {
            throw new DoubleException(
                'Can not implement interface with already instantiated double.'
            );
        }

        if (!$Vblpzgjj4s3y instanceof ReflectionClass) {
            if (!interface_exists($Vblpzgjj4s3y)) {
                throw new InterfaceNotFoundException(
                    sprintf('Interface %s not found.', $Vblpzgjj4s3y),
                    $Vblpzgjj4s3y
                );
            }

            $Vblpzgjj4s3y = new ReflectionClass($Vblpzgjj4s3y);
        }

        $this->interfaces[] = $Vblpzgjj4s3y;
    }

    
    public function setArguments(array $Vj23lbel2xn0 = null)
    {
        $this->arguments = $Vj23lbel2xn0;
    }

    
    public function getInstance()
    {
        if (null === $this->double) {
            if (null !== $this->arguments) {
                return $this->double = $this->doubler->double(
                    $this->class, $this->interfaces, $this->arguments
                );
            }

            $this->double = $this->doubler->double($this->class, $this->interfaces);
        }

        return $this->double;
    }
}
