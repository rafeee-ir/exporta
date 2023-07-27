<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Post;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Carbon\Carbon;
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
        $activities = Activity::where('causer_id',Auth::id())->latest()->limit(10)->get();
        foreach ($activities as $activity){
            $date = new Carbon($activity->created_at);
            $activity->diff = $date->diffForHumans(Carbon::now());
        }
        $users_count = User::all()->count();
        $suppliers_count = Supplier::all()->where('published',true)->where('user_id',Auth::id())->count();
        $products_count = Product::all()->where('published',true)->where('user_id',Auth::id())->count();
        $posts_count = Post::all()->where('published',true)->where('user_id',Auth::id())->count();
        $contacts_count = Contact::all()->count();
        return view('dashboard.dashboard',compact('activities','posts_count','products_count','users_count','suppliers_count','contacts_count'));
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
