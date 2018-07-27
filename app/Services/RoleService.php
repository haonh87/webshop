<?php

namespace App\Services;

use App\Models\Role;

class RoleService
{
    private $roleModel;

    /**
     * RoleService constructor.
     * @param Role $roleModel
     */
    public function __construct(Role $roleModel)
    {
        $this->roleModel = $roleModel;
    }
}