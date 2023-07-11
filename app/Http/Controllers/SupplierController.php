<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

class SupplierController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $s = Supplier::create([
//            'title' => 'Abystone',
//        ]);
        $suppliers = Supplier::latest()->paginate(10);
        return view('suppliers.index', compact('suppliers'));
    }

    public function dashboard_index()
    {
        $suppliers = Supplier::all();
        return view('dashboard.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($supplier)
    {
        $supplier = Supplier::where('slug','=',$supplier)->first();
        $products = Product::where('supplier_id','=',$supplier->id)->get();
        return view('suppliers.show', compact('supplier','products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
