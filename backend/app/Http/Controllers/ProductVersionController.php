<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexProductVersion;
use App\Http\Requests\StoreProductVersion;
use App\Http\Requests\UpdateProductVersion;
use App\Models\Product;
use App\Models\ProductVersion;
use App\Models\Version;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class ProductVersionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ProductVersion::class, 'product_version');
        $this->middleware('auth')->only('create');
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

        $products = ProductVersion::with(['product', 'version'])->get();
        $products = $products->sortBy('version.version')->sortBy('product.name')->values();
        
        $product_version = new LengthAwarePaginator(
            $products->forPage($request->page, 5),
            count($products),
            5,
            $request->page,
            array('path' => $request->url())
        );

        $product_versions = [];

        if ($keyword) {
            $products = ProductVersion::whereHas('product', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%");
            })->orWhereHas('version', function ($query) use ($keyword) {
                $query->where('version', 'LIKE', "%{$keyword}%");
            });
            $product_versions = $products->paginate(5);
        } else {
            $product_versions = $product_version;
        }

        if ($request->ajax()) {
            return view('product_version/pagination_data', compact('product_versions', 'keyword'));
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
        $products = Product::orderBy('name', 'asc')->get();
        $versions = Version::orderBy('version', 'asc')->get();

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

        return redirect('product_version')->with('flash_message', '登録が完了しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductVersion  $productVersion
     * @return \Illuminate\Http\Response
     */
    public function show(ProductVersion $productVersion)
    {
        $vulnerabilities = $productVersion->vulnerability;

        // dd($vulnerabilities);

        return view('product_version/show', ['product_version' => $productVersion, 'vulnerabilities' => $vulnerabilities]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductVersion  $productVersion
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductVersion $productVersion)
    {
        $products = Product::orderBy('name', 'asc')->get();
        $versions = Version::orderBy('version', 'asc')->get();
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

        return redirect('product_version')->with('flash_message', '編集が完了しました。');
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

        return redirect('product_version')->with('flash_message', '削除が完了しました。');
    }
}
