<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:supplier-list|supplier-create|supplier-edit|supplier-delete', ['only' => ['dashboard_index']]);
        $this->middleware('permission:supplier-create', ['only' => ['create','store']]);
        $this->middleware('permission:supplier-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:supplier-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::latest()->where('published',true)->with('products')->paginate(10);
        $categoriesInMenus = $this->categoriesInMenus();

        return view('suppliers.index', compact('suppliers','categoriesInMenus'));
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
        $categories = Category::all();

        return view('dashboard.suppliers.create', compact('categories'));
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
                $logoImageName = time() . 'supplier-logo' . time() . '.' . $request->logo->extension();
                $request->logo->move(public_path('storage/uploads/suppliers'), $logoImageName);
            }else{
                $logoImageName = null;
            }
            if(isset($request->banner)){
                $bannerImageName = time() . 'supplier-banner' . time() . '.' . $request->banner->extension();
                $request->banner->move(public_path('storage/uploads/suppliers'), $bannerImageName);
            }else{
                $bannerImageName = null;
            }

            if (isset($request->supplying)){
                $supplying = $request->input('supplying');
                $supplying = implode(',', $supplying);
                $request['supplying'] = $supplying;
            }

            $supplier = Supplier::create([
                'user_id' => Auth::id(),
                'title' => $request->title,
                'slogan' => $request->slogan,
                'about' => $request->about,
                'funded_at' => $request->funded_at,
                'logo' => $logoImageName,
                'banner' => $bannerImageName,
                'published' => $request->published ?? 0,
            ]);


//            $supplier->logo = $logoImageName;
//            $supplier->banner = $bannerImageName;
//            $supplier->save();

            $categories  = $request->categories;
            $supplier->categories()->attach($categories);

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

        $supplier = Supplier::where('slug',$supplier)->with('products')->first();
        $categoriesInMenus = $this->categoriesInMenus();

        if ($supplier->published == true){
            return view('suppliers.show', compact('supplier','categoriesInMenus'));
        }else{
            return back();
        }
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
        $supplier->categories()->detach();
        $supplier->delete();
        activity('Brand deleted')
            ->performedOn($supplier)
            ->log(Auth::user()->name . ' deleted '. $supplier->title .' brand.');
        return redirect(route('dashboardbrands.index'))->with('success','Brand deleted successfully');
    }
}
