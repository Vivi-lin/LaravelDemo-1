<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\Product;
use App\Models\Website;

class HomeController extends Controller
{

    public function index()
    {
        $home = Home::all();
        return view('welcome', compact('home'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index2()
    {
        return view('home');
    }

    public function index3()
    {
        $this->authorize('admin');
        return view('admin.layouts.master', ['Home' => home::cursor()]);
    }

    public function index4()
    {
        $products = Product::all();
        return view('frontend.men.w_co', compact('products'));
    }

    public function index5()
    {
        $products = Product::all();
        return view('frontend.women.w_co', compact('products'));
    }
}
