<?php



namespace Pimple\Exception;

use Psr\Container\ContainerExceptionInterface;


class FrozenServiceException extends \RuntimeException implements ContainerExceptionInterface
{
    
    public function __construct($V4mdxaz2cfcr)
    {
        parent::__construct(\sprintf('Cannot override frozen service "%s".', $V4mdxaz2cfcr));
    }
}
