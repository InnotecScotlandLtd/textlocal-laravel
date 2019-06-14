<?php

namespace InnotecScotlandLtd\TextLocal;

use Closure;
use InvalidArgumentException;
use JsonSerializable;
use ReflectionException;

interface TextLocalInterface extends JsonSerializable
{
    public function jsonSerialize();
}
