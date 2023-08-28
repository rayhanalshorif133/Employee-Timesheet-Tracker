<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login');
        }
    }
    
    public function dashboard()
    {
        $users = User::all()->count();
        $categories = Category::all()->count();
        $products = Product::all()->count();
        $bids = Bid::all()->count();


        return view('dashboard', compact('users','categories','products','bids'));
    }
}
