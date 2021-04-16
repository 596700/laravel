<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexVersion;
use App\Http\Requests\StoreVersion;
use App\Http\Requests\UpdateVersion;
use App\Models\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VersionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Version::class, 'version');
        $this->middleware('verified')->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexVersion $request)
    {
        $keyword = $request->input('keyword', '');

        $query = Version::orderBy('version', 'asc')->paginate(5);

        if ($keyword) {
            $query = Version::where('version', 'LIKE', "%{$keyword}%")
                            ->orderBy('version', 'asc')
                            ->paginate(5);
        }

        $versions = $query;

        return view('version/index', compact('versions', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('version/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVersion $request)
    {
        $validated = $request->validated();
        $version = new Version;
        
        $version->fill($validated);
        $version->user_id = Auth::id();
        $version->save();

        return redirect('version');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Version  $version
     * @return \Illuminate\Http\Response
     */
    public function show(Version $version)
    {
        return view('version/show', ['version' => $version]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Version  $version
     * @return \Illuminate\Http\Response
     */
    public function edit(Version $version)
    {
        return view('version/edit', ['version' => $version]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Version  $version
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVersion $request, Version $version)
    {
        $version->fill($request->all())->save();

        return redirect('version');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Version  $version
     * @return \Illuminate\Http\Response
     */
    public function destroy(Version $version)
    {
        $version->delete();

        return redirect('version');
    }
}
