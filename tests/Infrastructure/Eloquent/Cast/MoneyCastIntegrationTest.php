<?php

namespace Moneybatch\LaravelMinimalist\Tests\Infrastructure\Eloquent\Cast;

use Moneybatch\LaravelMinimalist\Domain\Money;
use Moneybatch\LaravelMinimalist\Infrastructure\Eloquent\Cast\InvalidArgumentException;
use Moneybatch\LaravelMinimalist\Tests\TestCase;

class MoneyCastIntegrationTest extends TestCase
{
    /**
     * @covers \Moneybatch\LaravelMinimalist\Infrastructure\Eloquent\Cast\MoneyCast::set
     */
    public function test_it_sets_money_attribute_in_integration(): void
    {
        $model = new EloquentTestModel();
        $model->money = new Money(1000);

        $this->assertSame(1000, $model->getAttributes()['money']);
    }

    /**
     * @covers \Moneybatch\LaravelMinimalist\Infrastructure\Eloquent\Cast\MoneyCast::get
     */
    public function test_it_gets_money_attribute_in_integration(): void
    {
        $model = new EloquentTestModel([
            'money' => 1000
        ]);

        $this->assertInstanceOf(Money::class, $model->money);
        $this->assertSame(1000, $model->money->inSubunits());
    }

    /**
     * @covers \Moneybatch\LaravelMinimalist\Infrastructure\Eloquent\Cast\MoneyCast::set
     */
    public function test_it_des_not_set_wrong_money_attribute_in_integration(): void
    {
        $model = new EloquentTestModel();
        try {
            $model->money = 'string';
        }
        catch (InvalidArgumentException $exception) {
            $this->assertSame('money can only be Money or Integer type.', $exception->getMessage());
            return;
        }

        $this->fail('Wrong! String was used to set money.');

    }

}
