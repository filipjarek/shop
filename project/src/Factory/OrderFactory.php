<?php

namespace App\Factory;

use App\Entity\Product;
use App\Entity\Order;
use App\Entity\OrderItem;

class OrderFactory
{
    public function create(): Order
    {
        $order = new Order();
        $order->setStatus(Order::STATUS_CART)
            ->setCreatedAt(new \DateTimeImmutable())
            ->setUpdatedAt(new \DateTimeImmutable());

        return $order;
    }

    public function createItem(Product $product): OrderItem
    {
        $item = new OrderItem();
        $item->setProduct($product);
        $item->setQuantity(1);

        return $item;
    }
}