<?php

namespace App\helper;

use App\Models\Category;

class ShowModels
{
    /**
     *
     *
     * @return \Illuminate\Support\Collection
     */
    public static function categoryHeaderMegaMenu()
    {
        return Category::with(['children.children'])
            ->where('parent_id', 0)
            ->get();
    }
}
