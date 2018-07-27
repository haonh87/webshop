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
}