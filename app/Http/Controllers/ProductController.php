<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->where('published',true)->paginate(20);

        return view('products.index',compact('products'));
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
        return view('dashboard.products.create',compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());
        activity('Product added')
            ->performedOn($product)
            ->log(Auth::user()->name . ' added ' . $product->title . ' as a new product.');
        return redirect(route('dashboardproducts.index'))->with('success','Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($product)
    {
        $product = Product::where('slug','=',$product)->first();
        $product->visited++;
        $product->save();
//        $product->incVisit();

        return view('products.show', compact('product'));
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
        $product->delete();
        activity('Brand deleted')
            ->performedOn($product)
            ->log(Auth::user()->name . ' deleted '. $product->title .' product.');
        return redirect(route('dashboardproducts.index'))->with('success','Product deleted successfully');
    }

    public function incVisit(){
        $this->visited++;
        return $this->save();
    }
}
