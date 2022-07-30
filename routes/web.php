<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Customer;
use App\Http\Livewire\User;
use App\Http\Livewire\Loan;
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

// Route::get('/withdrawal', function() {
//     Session::get('data');
//     return view('livewire.loan.withdrawal_receipt');
// })->name('withdrawal');

Route::controller(HomeController::class)->group( function (){
    Route::get('home','index');
});

Route::controller(LoanController::class)->group( function (){
    Route::get('withdrawal/{id}','showWithdrawal');
});

// Route::get('home', [HomeController::class, 'index'])->name('home');

Route::get('customers', Customer::class)->middleware('isLoan_officer');

Route::get('loans', Loan::class)->middleware('isEncoder');

Route::get('users', User::class)->middleware('isAdmin');

Auth::routes();