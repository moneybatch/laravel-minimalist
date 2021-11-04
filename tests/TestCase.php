<?php

namespace Moneybatch\LaravelMinimalist\Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function markTestSucceeded(): void
    {
        $this->assertTrue(true);
    }
}
