<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//            activity('Visit')
//                ->performedOn(Product::all()->get())
//                ->causedBy(Auth::user())
//                ->log('Visit Dashboard');
        $activities = Activity::where('causer_id',Auth::id())->latest()->limit(10)->get();
        return view('dashboard.dashboard',compact('activities'));
    }

    public function dashboard_notifications()
    {
        return view('dashboard.notifications');
    }
    public function profile()
    {
        $user = Auth::user();
        return view('dashboard.profile',compact('user'));
    }
}
