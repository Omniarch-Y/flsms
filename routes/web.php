<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Customer;
use App\Http\Livewire\User;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('customers',Customer::class)->middleware('isLoan_officer');

Route::get('users',User::class)->middleware('isLoan_officer');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::controller(CustomerController::class)->middleware('isAdmin')->group(function(){
    Route::get('customerForm','create');
    Route::post('registerCustomer','store');
    Route::get('editCustomer','edit');
    Route::put('updateUser/{id}','update');
    Route::delete('deleteUser/{id}','destroy');
});

Route::controller(UserController::class)->group(function(){
    Route::get('userForm','create');
    Route::post('registerUser','store');
    Route::get('editUser','edit');
    Route::put('updateUser/{id}','update');
    Route::delete('deleteUser/{id}','destroy');
});

Route::controller(LoanController::class)->middleware('isLoan_officer')->group(function(){
    Route::get('loanForm','create');
    Route::post('issueLoan','store');
    Route::get('editUser','edit');
    Route::put('updateUser/{id}','update');
    Route::delete('deleteUser/{id}','destroy');
});