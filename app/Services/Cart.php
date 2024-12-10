<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Product\Type;
use App\Models\Order\Item;

class Cart
{
    public function add(Type $type): Item
    {
        if (session()->has("cart.items.{$type->id}")) {
            $productInCart = session()->get("cart.items.{$type->id}");
            $isEnough = $this->isEnoughType($type, $productInCart);
            if ($isEnough) {
                $productInCart->quantity += 1;
                $productInCart->subtotal_price = $productInCart->quantity * $productInCart->price;
                $this->setTotalPrice();
            }

            return $productInCart;
        } else {
            $productInCart = $this->addProductToCart($type, $quantity = 1);
            $this->setTotalPrice();

            return $productInCart;
        }
    }

    public function remove(Type $type): bool
    {
        if (session()->has("cart.items.{$type->id}")) {
            $productInCart = session()->get("cart.items.{$type->id}");
            $productInCart->quantity -= 1;
            if ($productInCart->quantity == 0) {
                session()->forget("cart.items.{$type->id}");
            }
            $productInCart->subtotal_price = $productInCart->quantity * $productInCart->price;

            $this->setTotalPrice();

            return true;
        }

        return false;
    }

    public function removeAll(): bool
    {
        session()->flush();

        return true;
    }

    public function getItems(): array
    {
        return session()->get('cart.items');
    }

    public function itemsCount(): int
    {
        if (session()->get('cart.items') == null) {
            return 0;
        }

        $count = array_reduce(session('cart.items'), [$this, 'count']);

        return $count;
    }

    public function uniqueItemsCount(): int
    {
        if (session()->get('cart.items') == null) {
            return 0;
        }

        return count(session()->get('cart.items'));
    }

    public function isEmpty(): bool
    {
        if (session()->get('cart.items') == null) {
            return true;
        }

        if (count(session()->get('cart.items')) > 0) {
            return false;
        }

        return true;
    }

    public function totalPrice(): float
    {
        if (session('cart.totalPrice') == null) {
            return 0;
        }

        return session('cart.totalPrice');
    }

    public function totalPriceAndDeliveryCost(float $deliveryCost): float
    {
        return $this->totalPrice() + $deliveryCost;
    }

    private function count(?int $carry, object $item): int
    {
        $carry += $item->quantity;

        return $carry;
    }

    public function clear(): bool
    {
        session()->forget('cart');

        return true;
    }

    public function decreaseProductTypeQuantity(array $items): void
    {
        foreach ($items as $productInCart) {
            $type = Type::find($productInCart->type_id);
            $type->decrement('quantity', $productInCart->quantity);
        }
    }

    // -------------------------------------------------------

    private function setTotalPrice(): void
    {
        $totalPrice = array_reduce(session('cart.items'), [$this, 'sum']);

        session(['cart.totalPrice' => $totalPrice]);
    }

    private function sum(?float $carry, object $item): float
    {
        $carry += $item->subtotal_price;

        return $carry;
    }

    private function addProductToCart(Type $type, int $quantity): Item
    {
        $item = $this->createOrderItem($type, $quantity);
        $item->subtotal_price = $item->quantity * $item->price;
        session()->put("cart.items.{$type->id}", $item);

        return $item;
    }

    private function createOrderItem(Type $type, int $quantity): Item
    {
        $item = new Item();
        $item->type_id = $type->id;
        $item->type_name = $type->name;
        $item->type_size_id = $type->size_id;
        $item->name = $type->product->name;
        $item->concentration = $type->product->concentration->name;
        $item->category = $type->product->category->name;
        $item->price = $type->price;
        $item->quantity = $quantity;
        // $item->subtotal_price = $type->price;

        return $item;
    }

    /**
     * Check if there is enough product of a given type in the database.
     *
     * @param Type $type      Type
     * @param Item $orderItem Order Item
     *
     * @return boolean
     */
    private function isEnoughType(Type $type, Item $orderItem): bool
    {
        return $type->quantity > $orderItem->quantity;
    }
}
