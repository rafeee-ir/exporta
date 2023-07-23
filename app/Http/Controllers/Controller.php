<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;



    public function setting()
    {
        $setting = Setting::find(1)->first();
        return $setting;
    }


    function categoriesInMenus()
    {
        $category_supplier = DB::table('category_supplier')->pluck('category_id');
        $categories_in_menus = Category::whereIn('id', $category_supplier)->orderBy('id')->get();
        return $categories_in_menus;

    }

}
