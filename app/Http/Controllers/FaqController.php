<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('faqs.index',compact('faqs'));
    }

    /**
     * Display a listing of the resource.
     */

    public function dashboard_index()
    {
        $faqs = Faq::all();
        return view('dashboard.faqs.index',compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFaqRequest $request)
    {
        $faq = Faq::create($request->all());
        activity('FAQ added')
                ->performedOn($faq)
                ->log(Auth::user()->name . ' added new FAQ.');
        return redirect(route('dashboardfaqs.index'))->with('alert','FAQ published successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFaqRequest $request, Faq $faq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        activity('FAQ deleted')
            ->performedOn($faq)
            ->log(Auth::user()->name . ' deleted a FAQ.');
        return redirect(route('dashboardfaqs.index'))->with('alert','FAQ deleted successfully');

    }
}
