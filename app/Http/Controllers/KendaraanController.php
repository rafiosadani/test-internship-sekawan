<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyword = request('keyword');

        $kendaraans = Kendaraan::where('nama_kendaraan', 'like', '%' . $keyword . '%')
                    ->orWhere('tipe', 'like', '%' . $keyword . '%')
                    ->orWhere('bahan_bakar', 'like', '%' . $keyword . '%')
                    ->orWhere('jenis_kendaraan', 'like', '%' . $keyword . '%')
                    ->orWhere('status', 'like', '%' . $keyword . '%')
                    ->paginate(5);

        return view('dashboard.kendaraans.index', [
            'title' => 'Kendaraan',
            'kendaraans' => $kendaraans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kendaraans.create', [
            'title' => 'Tambah Kendaraan'
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
        $validatedData = $request->validate([
            'nama_kendaraan' => 'required|max:255',
            'tipe' => 'required',
            'bahan_bakar' => 'required',
            'jenis_kendaraan' => 'required',
            'image' => 'image|file|max:2048'
        ]);

        $validatedData['status'] = 'tersedia';

        // apakah ada upload image
        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('kendaraan-images');
        } else {
            $validatedData['image'] = 'preview.png';
        }

        Kendaraan::create($validatedData);

        return redirect('/dashboard/kendaraans')->with('success', 'Data Kendaraan baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(Kendaraan $kendaraan)
    {
        return view('dashboard.kendaraans.show', [
            'title' => 'Detail Kendaraan',
            'kendaraan' => $kendaraan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kendaraan $kendaraan)
    {
        return view('dashboard.kendaraans.edit', [
            'title' => 'Edit Kendaraan',
            'kendaraan' => $kendaraan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kendaraan $kendaraan)
    {
        $validatedData = $request->validate([
            'nama_kendaraan' => 'required|max:255',
            'tipe' => 'required',
            'bahan_bakar' => 'required',
            'jenis_kendaraan' => 'required',
            'status' => 'required',
            'image' => 'image|file|max:2048'
        ]);

        // apakah ada upload image
        if($request->file('image')) {

            // delete old image
            if($request->oldImage) {
                if($request->oldImage != 'preview.png') {
                    Storage::delete($request->oldImage);
                }
            }

            $validatedData['image'] = $request->file('image')->store('kendaraan-images');
        }

        Kendaraan::where('id', $kendaraan->id)->update($validatedData);

        return redirect('/dashboard/kendaraans')->with('success', 'Data kendaraan berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kendaraan $kendaraan)
    {
        if($kendaraan->image) {
            if($kendaraan->image != 'preview.png') {
                Storage::delete($kendaraan->image);
            }
        }
        
        Kendaraan::destroy($kendaraan->id);

        return redirect('/dashboard/kendaraans')->with('success', 'Data kendaraan berhasil dihapus!');
    }
}
