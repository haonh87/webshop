<?php

namespace App\Services;

use App\Models\OrderItem;

class OrderItemService
{
    private $orderItemModel;

    /**
     * OrderItemService constructor.
     * @param OrderItem $orderItemModel
     */
    public function __construct(OrderItem $orderItemModel)
    {
        $this->orderItemModel = $orderItemModel;
    }
}