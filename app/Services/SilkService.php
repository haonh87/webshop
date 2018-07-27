<?php

namespace App\Services;

use App\Models\Silk;

class SilkService
{
    private $silkModel;

    /**
     * SilkService constructor.
     * @param Silk $silkModel
     */
    public function __construct(Silk $silkModel)
    {
        $this->silkModel = $silkModel;
    }
}