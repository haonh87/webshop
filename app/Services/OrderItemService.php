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

    public function findOrderItemById($id)
    {
    	$this->orderItemModel->with('product')->with('color')->with('size')->find($id);
    }

    public function createOrderItem($data)
    {
        $this->orderItemModel->insert($data);
    }
}