<?php

namespace App\Helpers;

class listItemHelper
{
    static function showCategories($categories, $parent_id = 0, $char = '', $cate = null, $field = 'parent_id')
    {
        if (count($categories) > 0) {
            foreach ($categories as $key => $item) {
                if ($item['parent_id'] == $parent_id) {
                    $selected = '';
                    if ($cate != null && is_array($cate)) {
                        $selected = ($item['id'] == $cate[$field]) ? 'selected' : '';
                    }
                    if ($cate != null && !is_array($cate)) {
                        $selected = ($item['id'] == $cate) ? 'selected' : '';
                    }
                    echo "<option " . $selected . " value=" . $item['id'] . ">" . $char . $item['name'] . " </option>";
                    self::showCategories($categories, $item['id'], $char . '-- ', $cate);
                }
            }
        }
    }
}