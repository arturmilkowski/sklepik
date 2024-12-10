<?php

namespace Tests\Unit\Cart;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\Cart;
use App\Models\Product\{Brand, Category, Concentration, Product, Size, Type};
use App\Models\Order\Item;

class CartTest extends TestCase
{
    use RefreshDatabase;

    protected $product;
    protected $size;
    protected $type1;
    protected $type2;

    public function setUp(): void
    {
        parent::setUp();

        $this->product = Product::factory()
            ->for(Brand::factory())
            ->for(Category::factory())
            ->for(Concentration::factory())
            ->create();

        $this->size = Size::factory();

        $this->type1 = Type::factory()
            ->for($this->product)
            ->for($this->size)
            ->create();
        $this->type2 = Type::factory()
            ->for($this->product)
            ->for($this->size)
            ->create();
    }

    public function testMakeCart(): void
    {
        $this->withoutExceptionHandling();
        $cart = new Cart();

        $this->assertInstanceOf(Cart::class, $cart);
    }

    public function testAdd(): void
    {
        $this->withoutExceptionHandling();
        $cart = new Cart();
        $orderItem = $cart->add($this->type1);
        $this->assertInstanceOf(Item::class, $orderItem);
        $this->assertEquals($this->type1->price, $cart->totalPrice());
        $this->assertEquals(1, $cart->uniqueItemsCount());
        $this->assertIsArray($cart->getItems());

        $orderItem = $cart->add($this->type2);
        $orderItem = $cart->add($this->type2);
        $this->assertEquals(2, $cart->uniqueItemsCount());
        $this->assertEquals(2, $orderItem->quantity);
        $this->assertEquals(3, $cart->itemsCount());
    }

    public function testRemove(): void
    {
        $this->withoutExceptionHandling();
        $cart = new Cart();
        $orderItem = $cart->add($this->type1);
        $success = $cart->remove($this->type1);
        $this->assertEquals(0, $orderItem->quantity);
        $this->assertTrue($success);
        $this->assertEquals(0, $cart->uniqueItemsCount());
        $this->assertEquals(0, $cart->itemsCount());
        $this->assertTrue($cart->isEmpty());

        $success = $cart->remove($this->type1);
        $this->assertFalse($success);
    }

    public function testRemoveAll(): void
    {
        $this->withoutExceptionHandling();
        $cart = new Cart();
        $cart->add($this->type1);
        $cart->add($this->type2);
        $success = $cart->removeAll();
        $this->assertTrue($success);
        $this->assertEquals(0, $cart->uniqueItemsCount());
        $this->assertEquals(0, $cart->itemsCount());
    }

    public function testTotalPrice(): void
    {
        $cart = new Cart();
        $this->assertEquals(0, $cart->totalPrice());
        $cart->add($this->type1);
        $cart->add($this->type2);
        $this->assertEquals(
            $this->type1->price + $this->type2->price,
            $cart->totalPrice()
        );

        $cart->removeAll();
        $this->assertEquals(0, $cart->totalPrice());
        $cart->add($this->type1);
        $cart->add($this->type1);
        $this->assertEquals(
            2 * $this->type1->price,
            $cart->totalPrice()
        );

        $cart->remove($this->type1);
        $this->assertEquals(
            1 * $this->type1->price,
            $cart->totalPrice()
        );
    }

    public function testTotalPriceAndDeliveryCoast(): void
    {
        $cart = new Cart();
        $cart->add($this->type1);
        $deliveryCost = 15;

        $this->assertEquals(
            $cart->totalPrice() + $deliveryCost,
            $cart->totalPriceAndDeliveryCost($deliveryCost)
        );
    }

    public function testItemsCount(): void
    {
        $cart = new Cart();
        $this->assertEquals(0, $cart->itemsCount());
    }

    public function testIsEmpty(): void
    {
        $cart = new Cart();
        $this->assertTrue($cart->isEmpty());

        $cart->add($this->type1);
        $this->assertFalse($cart->isEmpty());
    }

    public function testClear(): void
    {
        $this->withoutExceptionHandling();
        $cart = new Cart();
        $cart->add($this->type1);
        $cart->add($this->type2);
        $success = $cart->clear();
        $this->assertTrue($success);
        $this->assertEquals(0, $cart->itemsCount());
    }
}
