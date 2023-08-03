<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',[SiteController::class,'homepage'])->name('homepage');
Route::get('/search',[SiteController::class,'search'])->name('search');

Auth::routes();
//Auth::routes([
//    'register' => false, // Registration Routes...
//    'reset' => false, // Password Reset Routes...
//    'verify' => false, // Email Verification Routes...
//]);

Route::get('/about', [SiteController::class, 'about'])->name('about.index');


Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');

Route::get('products',[ProductController::class,'index'])->name('products.index');
Route::get('products/{product}',[ProductController::class,'show'])->name('products.show');

Route::get('brands',[SupplierController::class,'index'])->name('suppliers.index');
Route::get('brands/{product}',[SupplierController::class,'show'])->name('suppliers.show');

Route::get('blog',[PostController::class,'index'])->name('blog.index');
Route::get('blog/{post}',[PostController::class,'show'])->name('blog.show');

Route::get('faq',[FaqController::class, 'index']);


Route::get('cat/{product}',[CategoryController::class,'show'])->name('categories.show');




Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('/home',
    function(){
        return redirect('/dashboard');
    });

Route::name('dashboard')->prefix('dashboard')->middleware('auth')->group(function() {

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);

    Route::get('notifications', [HomeController::class, 'dashboard_notifications']);

    Route::get('profile', [HomeController::class, 'profile']);

    Route::get('posts', [PostController::class, 'dashboard_index']);

    Route::get('brands', [SupplierController::class, 'dashboard_index'])->name('brands.index');
    Route::get('brands/create', [SupplierController::class, 'create'])->name('brands.create');
    Route::post('brands/create', [SupplierController::class, 'store'])->name('brands.store');
    Route::delete('brands/{supplier}', [SupplierController::class, 'destroy'])->name('brands.destroy');

    Route::get('products', [ProductController::class, 'dashboard_index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products/create', [ProductController::class, 'store'])->name('products.store');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('faqs', [FaqController::class, 'dashboard_index'])->name('faqs.index');
    Route::get('faqs/create', [FaqController::class, 'create'])->name('faqs.create');
    Route::post('faqs/create', [FaqController::class, 'store'])->name('faqs.store');
    Route::delete('faqs/{faq}', [FaqController::class, 'destroy'])->name('faqs.destroy');

    Route::get('posts', [PostController::class, 'dashboard_index'])->name('posts.index');
    Route::patch('posts/{id}/edit', [PostController::class, 'update'])->name('posts.update');
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::get('contacts', [ContactController::class, 'dashboard_index'])->name('contacts.index');
    Route::get('contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('contacts', [ContactController::class, 'store'])->name('contacts.store');
    Route::delete('contacts/{post}', [ContactController::class, 'destroy'])->name('contacts.destroy');

//    Route::get('users', [UserController::class, 'dashboard_index'])->name('users.index');
//    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
//    Route::post('users/create', [UserController::class, 'store'])->name('users.store');
//    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

});
