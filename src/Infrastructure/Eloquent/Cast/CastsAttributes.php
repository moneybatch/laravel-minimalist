<?php

namespace Moneybatch\LaravelMinimalist\Infrastructure\Eloquent\Cast;

use \Illuminate\Contracts\Database\Eloquent\CastsAttributes as IlluminateCastsAttributes;

interface CastsAttributes extends IlluminateCastsAttributes
{
    public function get($model, string $key, $value, array $attributes);

    public function set($model, string $key, $value, array $attributes);
}

