<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWatchList;
use App\Models\Product;
use App\Models\ProductVersion;
use App\Models\User;
use App\Models\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchListController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $watch_lists = $user->watch_list;
        $product_versions = [];

        if (!empty($watch_lists)) {
            foreach ($watch_lists as $watch_list) {
                $product = Product::find($watch_list->product_id)->name;
                $version = Version::find($watch_list->version_id)->version;
                $product_versions[$watch_list->id] = $product.'/'.$version;
            }
            asort($product_versions);
        }


        return view('watch_list/index', ['product_versions' => $product_versions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_versions = ProductVersion::all();

        return view('watch_list/create', ['product_versions' => $product_versions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWatchList $request)
    {
        $user = User::find(Auth::id());
        $user->watch_list()->attach($request->product_version_id, ['user_id' => Auth::id(), 'created_at' => now(), 'updated_at' => now()]);
        $user->save();

        return redirect('watch_list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find(Auth::id());
        $user->watch_list()->detach($id);

        return back();
    }
}
