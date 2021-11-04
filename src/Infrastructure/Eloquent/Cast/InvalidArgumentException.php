<?php

namespace Moneybatch\LaravelMinimalist\Infrastructure\Eloquent\Cast;

use Exception;

class InvalidArgumentException extends Exception
{

    public function __construct($key)
    {
        parent::__construct(sprintf(
            '%s can only be Money or Integer type.',
            $key
        ));
    }

}