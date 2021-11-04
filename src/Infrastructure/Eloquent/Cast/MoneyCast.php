<?php

namespace Moneybatch\LaravelMinimalist\Infrastructure\Eloquent\Cast;

use Moneybatch\LaravelMinimalist\Domain\Money;

class MoneyCast implements CastsAttributes
{
    public function get($model, $key, $value, $attributes): Money
    {
        return new Money((int)$value);
    }

    public function set($model, $key, $value, $attributes): int
    {
        if (!$value instanceof Money && !is_int($value)) {
            throw new InvalidArgumentException($key);
        }

        return $value instanceof Money ? $value->inSubunits() : $value;
    }
}
