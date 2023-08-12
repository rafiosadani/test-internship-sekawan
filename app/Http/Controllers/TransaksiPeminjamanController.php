<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\User;
use App\Models\Region;
use App\Models\PerusahaanPersewaan;
use App\Models\TransaksiPeminjaman;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class TransaksiPeminjamanController extends Controller
{
    public function index() 
    {
        $peminjamans = DB::table('transaksi_peminjamans')
                        ->join('kendaraans', 'kendaraans.id', '=', 'transaksi_peminjamans.kendaraan_id')
                        ->join('regions', 'regions.id', '=', 'transaksi_peminjamans.region_id')
                        ->join('users', 'users.id', '=', 'transaksi_peminjamans.peminjam_user_id')
                        ->select([
                            'transaksi_peminjamans.id as id_peminjaman',
                            'transaksi_peminjamans.tanggal_pinjam as tanggal_pinjam',
                            'transaksi_peminjamans.tanggal_kembali as tanggal_kembali',
                            'transaksi_peminjamans.status as status',
                            'transaksi_peminjamans.verifikasi as verifikasi',
                            'transaksi_peminjamans.nama_petugas as nama_petugas',
                            'transaksi_peminjamans.nama_approve as nama_approve',
                            'kendaraans.nama_kendaraan as nama_kendaraan',
                            'kendaraans.tipe as tipe_kendaraan',
                            'regions.nama_region as nama_region',
                            'regions.alamat as alamat_region',
                            'users.nama_lengkap as nama_peminjam',
                            'transaksi_peminjamans.petugas_user_id as petugas_user_id',
                            'transaksi_peminjamans.approve_user_id as approve_user_id',
                        ])->where('transaksi_peminjamans.perusahaan_persewaan_id', '=', null)
                        ->paginate(5);

        $peminjamans_sewa = DB::table('transaksi_peminjamans')
                        ->join('kendaraans', 'kendaraans.id', '=', 'transaksi_peminjamans.kendaraan_id')
                        ->join('regions', 'regions.id', '=', 'transaksi_peminjamans.region_id')
                        ->join('perusahaan_persewaans', 'perusahaan_persewaans.id', '=', 'transaksi_peminjamans.perusahaan_persewaan_id')
                        ->join('users', 'users.id', '=', 'transaksi_peminjamans.peminjam_user_id')
                        ->select([
                            'transaksi_peminjamans.id as id_peminjaman',
                            'transaksi_peminjamans.tanggal_pinjam as tanggal_pinjam',
                            'transaksi_peminjamans.tanggal_kembali as tanggal_kembali',
                            'transaksi_peminjamans.status as status',
                            'transaksi_peminjamans.verifikasi as verifikasi',
                            'transaksi_peminjamans.nama_petugas as nama_petugas',
                            'transaksi_peminjamans.nama_approve as nama_approve',
                            'kendaraans.nama_kendaraan as nama_kendaraan',
                            'kendaraans.tipe as tipe_kendaraan',
                            'regions.nama_region as nama_region',
                            'regions.alamat as alamat_region',
                            'perusahaan_persewaans.nama_perusahaan as nama_perusahaan',
                            'users.nama_lengkap as nama_peminjam',
                            'transaksi_peminjamans.petugas_user_id as petugas_user_id',
                            'transaksi_peminjamans.approve_user_id as approve_user_id',
                        ])
                        ->paginate(5);

        return view('dashboard.transaksi_peminjamans.index', [
            'title' => 'Peminjaman Kendaraan',
            'peminjamans' => $peminjamans,
            'peminjamans_sewa' => $peminjamans_sewa
        ]);
    }

    public function transaksiPeminjaman() 
    {
        // get data kendaraan yg tersedia (milik sendiri)
        $kendaraans = Kendaraan::where('status', '=', 'tersedia')->get();

        // get data kendaraan yang berstatus sewa
        $kendaraans_sewa = Kendaraan::where('status', '=', 'sewa')->get();

        // get data region
        $regions = Region::all();

        // get data perusahaan persewaan
        $perusahaan_persewaan = PerusahaanPersewaan::all();

        // get data peminjam
        $peminjams = User::where('role_id', '=', 3)->get();

        // get data approve
        $approves = User::where('role_id', '=', 2)->get();

        // dd($peminjams);

        return view('dashboard.transaksi_peminjamans.create', [
            'title' => 'Transaksi Peminjaman Kendaraan',
            'kendaraans' => $kendaraans,
            'kendaraans_sewa' => $kendaraans_sewa,
            'regions' => $regions,
            'perusahaans' => $perusahaan_persewaan,
            'peminjams' => $peminjams,
            'approves' => $approves,
        ]);
    }

    public function store(Request $request) 
    {
        $validatedData = $request->validate([
            'peminjam_user_id' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'region_id' => 'required',
            'approve_user_id' => 'required',
        ]);

        $validatedData['perusahaan_persewaan_id'] = $request->perusahaan_persewaan_id;
        $validatedData['kendaraan'] = $request->kendaraan;
        $validatedData['kendaraan_sewa'] = $request->kendaraan_sewa;

        if($validatedData['perusahaan_persewaan_id'] != null) {
            $validatedData['kendaraan_id'] = $validatedData['kendaraan_sewa'];
            $validatedData['perusahaan_persewaan_id'] = $validatedData['perusahaan_persewaan_id'];
            $validatedData['status'] = 'sewa';
        } else {
            $validatedData['kendaraan_id'] = $validatedData['kendaraan'];
            $validatedData['perusahaan_persewaan_id'] = null;
            $validatedData['status'] = 'pinjam';
        }

        $validatedData['verifikasi'] = 'menunggu konfirmasi';
        $validatedData['petugas_user_id'] = auth()->user()->id;
        $validatedData['nama_petugas'] = auth()->user()->nama_lengkap;

        $nama_approve = User::where('id', $validatedData['approve_user_id'])->get()->pluck('nama_lengkap');

        $validatedData['nama_approve'] = json_encode($nama_approve);

        TransaksiPeminjaman::create($validatedData);

        if($validatedData['status'] != 'sewa') {
            // Mengubah status kendaraan menjadi "dipesan"
            $statusKendaraan = 'dipesan';
            Kendaraan::where('id', $validatedData['kendaraan_id'])->update(['status' => $statusKendaraan]);
        }

        return redirect('/dashboard/transaksi-peminjamans')->with('success', 'Peminjaman Kendaraan berhasil dilakukan, tunggu konfirmasi dari pusat!');
    }

    public function destroy($id_peminjaman) {
        if($id_peminjaman) {
            $verifikasi = 'tidak terkonfirmasi';
            $statusKendaraan = 'tersedia';

            $kendaraan_id = TransaksiPeminjaman::where('id', $id_peminjaman)->pluck('kendaraan_id')->toArray();
            $kendaraanStatus = Kendaraan::where('id', $kendaraan_id)->pluck('status')->toArray();
            
            if($kendaraanStatus != 'sewa') {
                Kendaraan::where('id', $kendaraan_id)->update(['status' => $statusKendaraan]);
            }

            TransaksiPeminjaman::where('id', $id_peminjaman)->update(['verifikasi' => $verifikasi]);

            return redirect('/dashboard/transaksi-peminjamans')->with('success', 'Peminjaman Kendaraan gagal dilakukan!');
        }
    }
}
