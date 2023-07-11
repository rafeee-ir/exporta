<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $posts = Post::latest()->take(3)->get();
    return view('index', compact('posts'));
//    return view('index');
});

Auth::routes();


Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
//Route::get('/blog', [App\Http\Controllers\PostController::class, 'index'])->name('blog');
Route::get('/pricing', function () {
    return view('pricing');
});
Route::get('/services', function () {
    return view('services');
});

Route::resource('posts',PostController::class);
//Route::get('/post', function () {
//    return redirect('/blog');
//});
Route::resource('products',ProductController::class);
Route::resource('suppliers',SupplierController::class);





Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/home', function () {
    return redirect('/dashboard');
});
Route::name('dashboard')->prefix('dashboard')->middleware('auth')->group(function() {

    Route::resource('users',UserController::class);
    Route::get('products', [ProductController::class, 'dashboard_index']);
    Route::get('notifications', [HomeController::class, 'dashboard_notifications']);
    Route::get('profile', [HomeController::class, 'profile']);
    Route::get('posts', [PostController::class, 'dashboard_index']);
    Route::get('brands', [SupplierController::class, 'dashboard_index']);
});
