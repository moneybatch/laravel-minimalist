<?php

namespace Moneybatch\LaravelMinimalist\Tests\Infrastructure\Eloquent\Cast;

use Moneybatch\LaravelMinimalist\Domain\Price;
use Moneybatch\LaravelMinimalist\Infrastructure\Eloquent\Cast\InvalidArgumentException;
use Moneybatch\LaravelMinimalist\Tests\TestCase;

class PriceCastIntegrationTest extends TestCase
{
    /**
     * @covers \Moneybatch\LaravelMinimalist\Infrastructure\Eloquent\Cast\PriceCast::set
     */
    public function test_it_sets_money_attribute_in_integration(): void
    {
        $model = new EloquentTestModel();
        $model->price = new Price(1000);

        $this->assertSame(1000, $model->getAttributes()['price']);
    }

    /**
     * @covers \Moneybatch\LaravelMinimalist\Infrastructure\Eloquent\Cast\PriceCast::get
     */
    public function test_it_gets_money_attribute_in_integration(): void
    {
        $model = new EloquentTestModel([
            'price' => 1000
        ]);

        $this->assertInstanceOf(Price::class, $model->price);
        $this->assertSame(1000, $model->price->inSubunits());
    }

    /**
     * @covers \Moneybatch\LaravelMinimalist\Infrastructure\Eloquent\Cast\PriceCast::set
     */
    public function test_it_des_not_set_wrong_money_attribute_in_integration(): void
    {
        $model = new EloquentTestModel();
        try {
            $model->price = 'string';
        }
        catch (InvalidArgumentException $exception) {
            $this->assertSame('price can only be Money or Integer type.', $exception->getMessage());
            return;
        }

        $this->fail('Wrong! String was used to set money.');

    }

}
