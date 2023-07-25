<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['dashboard_index']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->where('published',true)->with('supplier')->get();
        $categoriesInMenus = $this->categoriesInMenus();

        return view('products.index',compact('products','categoriesInMenus'));
    }
    /**
     * Display a listing of the resource.
     */
    public function dashboard_index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $products = Product::all();
        return view('dashboard.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $categories = Category::all();
        return view('dashboard.products.create',compact('suppliers','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
//        $input = $request->all();

        $request->validate([
            'featured_image' => 'mimes:png,jpg,jpeg|max:2048',
//            'slider_images' => 'mimes:png,jpg,jpeg|max:2048',
            'title' => 'required',
            'supplier_id' => 'required|not_in:0',
            'description' => 'required|min:20'
        ]);
//        try {
            if(isset($request->featured_image)){
                $featured_imageName = 'product_image_' . time() . '.' . $request->featured_image->extension();
                $request->featured_image->move(public_path('storage/uploads/products'), $featured_imageName);
            }else{
                $featured_imageName = null;
            }
            $slider_images = array();
            if(isset($request->slider_images)) {

                if ($files = $request->file('slider_images')) {
                    foreach ($files as $file) {
                        $slider_imagesNames = 'product_slider_' . time() . rand(1,10000) . '.' . $file->extension();
                        $file->move(public_path('storage/uploads/products'), $slider_imagesNames);
                        $slider_images[] = $slider_imagesNames;
                    }
                }
            }
//        $input['featured_image'] = $featured_imageName;
//        $input['slider_images'] = implode("|",$slider_images);




        $product = new Product();
        $product->user_id = Auth::id();
        $product->title = $request->title;
        $product->featured_image = $featured_imageName;
        $product->slider_images = implode("|",$slider_images);
        $product->description = $request->description;
        $product->supplier_id = $request->supplier_id;
        $product->minimum_order_qty = $request->minimum_order_qty;
        $product->production_capacity = $request->production_capacity;
        $product->sample = $request->sample;
        $product->price_fob = $request->price_fob;
        $product->price_currency = $request->price_currency;
        $product->published = $request->published ?? 0;
        $product->save();




        $categories  = $request->categories;
        $product->categories()->attach($categories);


            activity('Product added')
                ->performedOn($product)
                ->log(Auth::user()->name . ' added ' . $product->title . ' as a new product.');
            return redirect(route('dashboardproducts.index'))->with('success','Product added successfully');
//        }catch(\Exception $e){
//            return redirect()->back()->with('error','Something goes wrong!');
//        }

    }

    /**
     * Display the specified resource.
     */
    public function show($product)
    {
        $product = Product::where('slug','=',$product)->where('published',true)->with('supplier')->first();
        $slider = array();
//        if (!empty($product->slider_images) && strpos($product->slider_images,"|") !== false){
            $slider = explode('|',$product->slider_images);
//        }else{
//            $slider = $product->slider_images;
//        }
        $categoriesInMenus = $this->categoriesInMenus();

        return view('products.show', compact('product','slider','categoriesInMenus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product)
    {
        $product = Product::find($product);
        $product->categories()->detach();
        $product->delete();
        activity('Brand deleted')
            ->performedOn($product)
            ->log(Auth::user()->name . ' deleted '. $product->title .' product.');
        return redirect(route('dashboardproducts.index'))->with('success','Product deleted successfully');
    }

}
