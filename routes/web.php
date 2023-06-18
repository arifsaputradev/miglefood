<?php

use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\ConsumerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
| init
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// link to "domain/" redirect to login for customer
// Route::view('/', 'auth.login-customer');

Route::get('/', [ConsumerController::class, 'loginForm'])->name('login-customer');
Route::post('/', [ConsumerController::class, 'login'])->name('login-customer-submit');

Route::middleware('auth.consumer')->group(function (){

    Route::get('/home', [ConsumerController::class, 'home'])->name('home');
    Route::view('/all-orders', 'customer.page.all-orders')->name('all-orders');
    Route::view('/cart', 'customer.page.cart')->name('cart');
    Route::view('/your-orders', 'customer.page.your-orders')->name('your-orders');
    Route::view('/all-menu', 'customer.page.all-menu')->name('all-menu');


});

// Route::view('/home',function(){
//     echo "hallo dek";
// })->name('home');

// cuma nyoba tampilan aja
    // Route::get('/home', function(){
    //     return view('customer.home');
    // })->name('home');


    // Route::get('/all-orders', function(){
    //     return view('customer.page.all-orders');
    // })->name('all-orders');

    // Route::get('/cart', function(){
    //     return view('customer.page.cart');
    // })->name('cart');

    // Route::get('/your-orders', function(){
    //     return view('customer.page.your-orders');
    // })->name('your-orders');

    // Route::get('/all-menu', function(){
    //     return view('customer.page.all-menu');
    // })->name('all-menu');

require __DIR__.'/auth.php';
