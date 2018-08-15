<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService
{
    private $customerModel;

    /**
     * CustomerService constructor.
     * @param Customer $customerModel
     */
    public function __construct(Customer $customerModel)
    {
        $this->customerModel = $customerModel;
    }

    public function createCustomer($dataCustomer)
    {
        $this->customerModel->fill($dataCustomer)->save();
        return $this->customerModel->id;
    }

    public function udpateCustomer($data, $id)
    {
        try {
            $customer = $this->customerModel->find($id);
            $customer->update($data);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function findCustomerByUser($userId)
    {
        return $this->customerModel->where('user_id', $userId)->first();
    }
}