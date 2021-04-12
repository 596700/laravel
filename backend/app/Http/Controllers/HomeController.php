<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVersion;
use App\Models\Version;
use App\Models\Vulnerability;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $products = Product::latest()->take(5)->get();
        $versions = Version::latest()->take(5)->get();
        $product_versions = ProductVersion::with(['product', 'version'])->latest()->take(10)->get();
        $vulnerabilities = Vulnerability::latest()->take(20)->get();


        return view('user.home', compact('products', 'versions', 'product_versions', 'vulnerabilities'));
    }
}
