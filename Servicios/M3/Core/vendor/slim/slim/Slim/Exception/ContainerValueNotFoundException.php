<?php

namespace Slim\Exception;

use RuntimeException;
use Interop\Container\Exception\NotFoundException as InteropNotFoundException;


class ContainerValueNotFoundException extends RuntimeException implements InteropNotFoundException
{

}
