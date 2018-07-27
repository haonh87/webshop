<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    private $categoryModel;

    /**
     * CategoryService constructor.
     * @param Category $categoryModel
     */
    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }
}
