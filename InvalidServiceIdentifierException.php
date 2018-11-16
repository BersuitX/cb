<?php



namespace Pimple\Exception;

use Psr\Container\NotFoundExceptionInterface;


class InvalidServiceIdentifierException extends \InvalidArgumentException implements NotFoundExceptionInterface
{
    
    public function __construct($V4mdxaz2cfcr)
    {
        parent::__construct(\sprintf('Identifier "%s" does not contain an object definition.', $V4mdxaz2cfcr));
    }
}
