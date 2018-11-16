<?php



namespace Prophecy\Exception\Doubler;

use Prophecy\Doubler\Generator\Node\ClassNode;

class ClassCreatorException extends \RuntimeException implements DoublerException
{
    private $Vpbrymo1kvdk;

    public function __construct($Vbl4yrmdan1y, ClassNode $Vpbrymo1kvdk)
    {
        parent::__construct($Vbl4yrmdan1y);

        $this->node = $Vpbrymo1kvdk;
    }

    public function getClassNode()
    {
        return $this->node;
    }
}
