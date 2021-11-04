<?php

namespace Moneybatch\LaravelMinimalist\Infrastructure\Eloquent\Cast;

use Moneybatch\LaravelMinimalist\Domain\Money;
use Moneybatch\LaravelMinimalist\Domain\Price;

class PriceCast implements CastsAttributes
{
    public function get($model, $key, $value, $attributes): Price
    {
        return new Price((int) $value);
    }

    public function set($model, $key, $value, $attributes): int
    {
        if (!($value instanceof Money || $value instanceof Price) && !is_int($value)) {
            throw new InvalidArgumentException($key);
        }

        return ($value instanceof Money || $value instanceof Price) ? $value->inSubunits() : $value;
    }
}
