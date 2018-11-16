<?php



namespace Pimple\Exception;

use Psr\Container\NotFoundExceptionInterface;


class UnknownIdentifierException extends \InvalidArgumentException implements NotFoundExceptionInterface
{
    
    public function __construct($V4mdxaz2cfcr)
    {
        parent::__construct(\sprintf('Identifier "%s" is not defined.', $V4mdxaz2cfcr));
    }
}
