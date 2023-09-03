<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Specification;
use App\Http\Requests\StoreSpecificationRequest;
use App\Http\Requests\UpdateSpecificationRequest;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;

class SpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
//        $this->middleware('permission:specification-list|specification-create|specification-edit|specification-delete', ['only' => ['index']]);
//        $this->middleware('permission:specification-create', ['only' => ['create','store']]);
//        $this->middleware('permission:specification-edit', ['only' => ['edit','update']]);
//        $this->middleware('permission:specification-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('dashboard.specifications.create',compact('suppliers','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSpecificationRequest $request)
    {
        $specification = Specification::create($request->all());
        activity('Specification added')
            ->performedOn($specification)
            ->log(Auth::user()->name . ' added new Specification.');
        return redirect()->back()->with('success','Specification added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Specification $specification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specification $specification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpecificationRequest $request, Specification $specification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specification $specification)
    {
        //
    }
}
