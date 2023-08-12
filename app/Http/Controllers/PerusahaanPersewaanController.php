<?php

namespace App\Http\Controllers;

use App\Models\PerusahaanPersewaan;
use Illuminate\Http\Request;

class PerusahaanPersewaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyword = request('keyword');

        $companies = PerusahaanPersewaan::where('nama_perusahaan', 'like', '%' . $keyword . '%')
                    ->orWhere('alamat', 'like', '%' . $keyword . '%')
                    ->paginate(4);

        return view('dashboard.perusahaan_persewaans.index', [
            'title' => 'Perusahaan Persewaan',
            'companies' => $companies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.perusahaan_persewaans.create', [
            'title' => 'Tambah Perusahaan Persewaan'
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
            'nama_perusahaan' => 'required',
            'alamat' => 'required'
        ]);

        // insert data ke database
        PerusahaanPersewaan::create($validatedData);

        // redirect dan set pesan berhasil ditambahkan
        return redirect('/dashboard/perusahaan-persewaans')->with('success', 'Data Perusahaan Persewaan baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerusahaanPersewaan  $perusahaanPersewaan
     * @return \Illuminate\Http\Response
     */
    public function show(PerusahaanPersewaan $perusahaanPersewaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerusahaanPersewaan  $perusahaanPersewaan
     * @return \Illuminate\Http\Response
     */
    public function edit(PerusahaanPersewaan $perusahaanPersewaan)
    {
        return view('dashboard.perusahaan_persewaans.edit', [
            'title' => 'Edit Perusahaan Persewaan',
            'company' => $perusahaanPersewaan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PerusahaanPersewaan  $perusahaanPersewaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PerusahaanPersewaan $perusahaanPersewaan)
    {
        // validasi inputan user
        $validatedData = $request->validate([
            'nama_perusahaan' => 'required',
            'alamat' => 'required'
        ]);

        // insert data ke database
        PerusahaanPersewaan::where('id', $perusahaanPersewaan->id)->update($validatedData);

        // redirect dan set pesan berhasil ditambahkan
        return redirect('/dashboard/perusahaan-persewaans')->with('success', 'Data Perusahaan Persewaan berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerusahaanPersewaan  $perusahaanPersewaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerusahaanPersewaan $perusahaanPersewaan)
    {
        // delete data 
        PerusahaanPersewaan::destroy($perusahaanPersewaan->id);

        // redirect dan set pesan berhasil dihapus
        return redirect('/dashboard/perusahaan-persewaans')->with('success', 'Data Perusahaan Persewaan berhasil dihapus!');
    }
}
