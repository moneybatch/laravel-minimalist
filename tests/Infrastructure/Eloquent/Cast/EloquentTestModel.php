<?php

namespace Moneybatch\LaravelMinimalist\Tests\Infrastructure\Eloquent\Cast;

use Illuminate\Database\Eloquent\Model;
use Moneybatch\LaravelMinimalist\Infrastructure\Eloquent\Cast\MoneyCast;
use Moneybatch\LaravelMinimalist\Infrastructure\Eloquent\Cast\PriceCast;

class EloquentTestModel extends Model
{

    protected $guarded = [];

    protected $casts = [
        'money' => MoneyCast::class,
        'price' => PriceCast::class,
    ];

}