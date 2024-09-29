<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'home'])->name('home');
 
route::get('/dashboard', [HomeController::class,'login_home'])->middleware(['auth', 'verified'])->name('dashboard');;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
route::get('admin/dashboard',[HomeController::class,'index'])->middleware('auth','admin');
route::get('view_category',[AdminController::class,'view_category'])->middleware('auth','admin');
route::post('add_category',[AdminController::class,'add_category'])->middleware('auth','admin');
route::get('delete_category/{id}',[AdminController::class,'delete_category'])->middleware('auth','admin');
route::get('edit_category/{id}',[AdminController::class,'edit_category'])->middleware('auth','admin');
route::post('update_category/{id}',[AdminController::class,'update_category'])->middleware('auth','admin');
route::get('add_product',[AdminController::class,'add_product'])->middleware('auth','admin');
route::post('add_product',[AdminController::class,'upload_product'])->middleware('auth','admin');
route::get('view_product',[AdminController::class,'view_product'])->middleware('auth','admin');
route::get('delete_product/{id}',[AdminController::class,'delete_product'])->middleware('auth','admin');
route::get('edit_product/{id}',[AdminController::class,'edit_product'])->middleware('auth','admin');
route::post('update_product/{id}',[AdminController::class,'update_product'])->middleware('auth','admin');
route::get('product_search',[AdminController::class,'product_search'])->middleware('auth','admin');
route::get('product_details/{id}', [HomeController::class, 'product_details'])->name('product_details');
route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->middleware(['auth', 'verified'])->name('add_cart');
route::get('myCart', [HomeController::class, 'myCart'])->middleware(['auth', 'verified'])->name('myCart');
Route::post('/cart/remove/{id}', [HomeController::class, 'remove'])->middleware(['auth', 'verified'])->name('cart.remove');
Route::post('confirm_order', [HomeController::class, 'confirm_order'])->middleware(['auth', 'verified'])->name('confirm_order');
route::get('view_order',[AdminController::class,'view_order'])->middleware('auth','admin');
route::get('on_the_way/{id}',[AdminController::class,'on_the_way'])->middleware('auth','admin');
route::get('delivered/{id}',[AdminController::class,'delivered'])->middleware('auth','admin');
route::get('print_pdf/{id}',[AdminController::class,'print_pdf'])->middleware('auth','admin');
Route::get('/my_order', [HomeController::class, 'my_order'])->middleware('auth');
  
Route::controller(HomeController::class)->group(function(){
    Route::get('stripe/{value}', 'stripe');
    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');
});
Route::post('/subscribe', [HomeController::class, 'subscribe'])->name('subscribe');
Route::get('/subscribers', [AdminController::class, 'subscribers'])->name('subscribers');

Route::get('/contact', [HomeController::class, 'showContactForm'])->name('contact');

// Route to handle the contact form submission
Route::post('/contact/submit', [HomeController::class, 'submit'])->name('contact.submit');
Route::get('/contact_us', [AdminController::class, 'showContactMessages'])->name('admin.contact_us');
Route::get('/all_products', [HomeController::class, 'all_products'])->middleware(['auth', 'verified'])->name('all_products');
Route::get('/about', [HomeController::class, 'about'])->name('about');

