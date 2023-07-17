<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
        $suppliers = Supplier::latest()->where('published',true)->with('products')->paginate(10);
        return view('suppliers.index', compact('suppliers'));
    }

    public function dashboard_index()
    {
        $suppliers = Supplier::all();
        foreach ($suppliers as $supplier){
            $date = new Carbon($supplier->created_at);
            $supplier->diff = $date->diffForHumans(Carbon::now());
        }
        return view('dashboard.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
        $request->validate([
            'logo' => 'mimes:png,jpg,jpeg|max:2048|dimensions:ratio=1/1',
            'banner' => 'mimes:png,jpg,jpeg|max:2048|dimensions:width=700,height=500',
            'title' => 'required',
            'about' => 'required|min:50',
            'slogan' => 'min:10'
        ]);

        try {
            if(isset($request->logo)){
                $logoImageName = time() . $request->title . '-logo.' . $request->logo->extension();
                $request->logo->move(public_path('storage/uploads/suppliers'), $logoImageName);
            }else{
                $logoImageName = null;
            }
            if(isset($request->banner)){
                $bannerImageName = time() . $request->title . '-banner.' . $request->banner->extension();
                $request->banner->move(public_path('storage/uploads/suppliers'), $bannerImageName);
            }else{
                $bannerImageName = null;
            }

            if (isset($request->supplying)){
                $supplying = $request->input('supplying');
                $supplying = implode(',', $supplying);
                $request['supplying'] = $supplying;
            }

            $supplier = Supplier::create($request->all());


            $supplier->logo = $logoImageName;
            $supplier->banner = $bannerImageName;
            $supplier->save();

            activity('Brand added')
                ->performedOn($supplier)
                ->log(Auth::user()->name . ' added ' . $supplier->title . ' as a new brand.');
            return redirect(route('dashboardbrands.index'))->with('success', 'Brand added successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Something goes wrong!');
        }
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
    public function destroy($supplier)
    {
        $supplier = Supplier::find($supplier);
        $supplier->delete();
        activity('Brand deleted')
            ->performedOn($supplier)
            ->log(Auth::user()->name . ' deleted '. $supplier->title .' brand.');
        return redirect(route('dashboardbrands.index'))->with('success','Brand deleted successfully');
    }
}
