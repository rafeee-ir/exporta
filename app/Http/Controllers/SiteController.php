<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function homepage(){
        $set = $this->setting();
        $posts = Post::where('published',true)->latest()->take(3)->get();
        $products = Product::where('published',true)->latest()->take(4)->get();
        $products_count = Product::all()->where('published',true)->count();
        $categoriesInMenus = $this->categoriesInMenus();
        return view('index',
            compact('posts',
                'products_count','products','set','categoriesInMenus'));
    }

    public function about(){
        $categoriesInMenus = $this->categoriesInMenus();

        return view('about',compact('categoriesInMenus'));
    }

    Public function search(){
        // Check for search input
        if (request('s')) {
            $products = Product::where('title', 'like', '%' . request('s') . '%')->get();
        } else {
            $products = Product::all();
        }
        $categoriesInMenus = $this->categoriesInMenus();

        return view('search',compact('products','categoriesInMenus'));
    }
}
