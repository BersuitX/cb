<?php

namespace Slim\Exception;

use InvalidArgumentException;
use Interop\Container\Exception\ContainerException as InteropContainerException;


class ContainerException extends InvalidArgumentException implements InteropContainerException
{

}
