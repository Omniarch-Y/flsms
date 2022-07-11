<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        if (auth()->user()->role == 'loan_officer'){
            return redirect('/customers');
        }
        else if (auth()->user()->role == 'encoder'){
            return view('home');
        }
        else if (auth()->user()->role == 'manager'){
            return redirect('/users');
        }
        else return redirect('/users');
    }
}
