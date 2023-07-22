<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function homepage(){
        $set = $this->setting();
        $posts = Post::where('published',true)->latest()->take(3)->get();
        $products = Product::where('published',true)->latest()->take(4)->get();
        $products_count = Product::all()->where('published',true)->count();
        return view('index',
            compact('posts',
                'products_count','products','set'));
    }

    public function about(){
        return view('about');
    }

    Public function search(){
        // Check for search input
        if (request('s')) {
            $products = Product::where('title', 'like', '%' . request('s') . '%')->get();
        } else {
            $products = Product::all();
        }

        return view('search')->with('products', $products);
    }
}
