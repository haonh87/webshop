<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    private $userModel;

    /**
     * UserService constructor.
     * @param User $userModel
     */
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }
}