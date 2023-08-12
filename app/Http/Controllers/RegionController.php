<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyword = request('keyword');

        $regions = Region::where('nama_region', 'like', '%' . $keyword . '%')
                    ->orWhere('alamat', 'like', '%' . $keyword . '%')
                    ->paginate(5);

        return view('dashboard.region.index', [
            'title' => 'Region',
            'regions' => $regions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.region.create', [
            'title' => 'Tambah Region'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi inputan user
        $validatedData = $request->validate([
            'nama_region' => 'required',
            'alamat' => 'required'
        ]);

        // insert data ke database
        Region::create($validatedData);

        // redirect dan set pesan berhasil ditambahkan
        return redirect('/dashboard/regions')->with('success', 'Region baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        return view('dashboard.region.edit', [
            'title' => 'Edit Region',
            'region' => $region
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region)
    {
        // validasi inputan user
        $validatedData = $request->validate([
            'nama_region' => 'required',
            'alamat' => 'required'
        ]);

        // insert data ke database
        Region::where('id', $region->id)->update($validatedData);

        // redirect dan set pesan berhasil ditambahkan
        return redirect('/dashboard/regions')->with('success', 'Region berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        // delete data 
        Region::destroy($region->id);

        // redirect dan set pesan berhasil dihapus
        return redirect('/dashboard/regions')->with('success', 'Region berhasil dihapus!');
    }
}
