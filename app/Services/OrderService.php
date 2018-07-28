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

    public function getAllOrders()
    {
    	return $this->orderModel->with('orderItem')->with('customer')->paginate(PAGINATE);
    }

    public function updateOrder($data, $id)
    {
    	try {
    		$order = $this->orderModel->find($id);
    		$order->update($data);
    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

    public function findShowOrderById($id) 
    {
    	return $this->orderModel->with('orderItem.product.category')->with('orderItem.color')->with('orderItem.size')->with('customer')->find($id);
    }

    public function findOrderById($id) 
    {
    	return $this->orderModel->with('orderItem')->with('customer')->find($id);
    }

    public function deleteOrderById($id)
    {
    	$this->orderModel->find($id)->delete();
    }
}