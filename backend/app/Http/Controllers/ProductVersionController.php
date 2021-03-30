<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexProductVersion;
use App\Http\Requests\StoreProductVersion;
use App\Http\Requests\UpdateProductVersion;
use App\Models\Product;
use App\Models\ProductVersion;
use App\Models\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductVersionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ProductVersion::class, 'product_version');
        $this->middleware('verified')->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexProductVersion $request)
    {
        $keyword = $request->input('keyword', '');

        $products = ProductVersion::simplePaginate(20);

        $product_versions = [];

        if ($keyword) {
            $products = ProductVersion::whereHas('product', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%");
            });
            $product_versions = $products->simplePaginate(20);
        } else {
            $product_versions = $products;
        }

        return view('product_version/index', compact('product_versions', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $versions = Version::all();

        return view('product_version/create', compact('products', 'versions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductVersion $request)
    {
        $validated = $request->validated();
        $product_version = new ProductVersion;

        $product_version->fill($validated);
        $product_version->user_id = Auth::id();
        $product_version->save();

        return redirect('product_version');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductVersion  $productVersion
     * @return \Illuminate\Http\Response
     */
    public function show(ProductVersion $productVersion)
    {
        return view('product_version/show', ['product_version' => $productVersion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductVersion  $productVersion
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductVersion $productVersion)
    {
        $products = Product::all();
        $versions = Version::all();
        return view('product_version/edit', ['product_version' => $productVersion, 'products' => $products, 'versions' => $versions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductVersion  $productVersion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductVersion $request, ProductVersion $productVersion)
    {
        $productVersion->fill($request->all())->save();

        return redirect('product_version')->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductVersion  $productVersion
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductVersion $productVersion)
    {
        $productVersion->delete();

        return redirect('product_version');
    }
}
