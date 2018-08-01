<?php

namespace App\Helpers;

class MenuHelper
{
    static function showCategories($categories, $parent_id = 0, $char = '', $cate = null)
    {
        if (count($categories) > 0) {
            foreach ($categories as $key => $item) {
                if ($item['parent_id'] == $parent_id) {
                    $selected = '';
                    if ($cate != null) {
                        $selected = ($item['id'] === $cate['parent_id']) ? 'selected' : '';
                    }
                    echo "<option " . $selected . " value=" . $item['id'] . ">" . $char . $item['name'] . " </option>";
                    self::showCategories($categories, $item['id'], $char . '-- ', $cate);
                }
            }
        }
    }
}