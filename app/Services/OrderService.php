<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{
    private $orderModel;

    /**
     * OrderService constructor.
     * @param Order $orderModel
     */
    public function __construct(Order $orderModel)
    {
        $this->orderModel = $orderModel;
    }
}