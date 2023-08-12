<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\TransaksiPeminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApprovePeminjamanController extends Controller
{
    public function index() 
    {
        if(auth()->user()->role_id == 1) {
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
                        ->where('transaksi_peminjamans.verifikasi', '=', 'menunggu konfirmasi')
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
            ])->where('transaksi_peminjamans.verifikasi', '=', 'menunggu konfirmasi')
            ->paginate(5);
        } else {
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
                            ->where('transaksi_peminjamans.approve_user_id', '=', auth()->user()->id)
                            ->where('transaksi_peminjamans.verifikasi', '=', 'menunggu konfirmasi')
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
                            ])->where('transaksi_peminjamans.verifikasi', '=', 'menunggu konfirmasi')
                            ->where('transaksi_peminjamans.approve_user_id', '=', auth()->user()->id)
                            ->paginate(5);
        }

        return view('dashboard.approve_peminjamans.index', [
            'title' => 'Peminjaman Kendaraan',
            'peminjamans' => $peminjamans,
            'peminjamans_sewa' => $peminjamans_sewa
        ]);
    }

    public function edit($id_peminjaman) {
        if($id_peminjaman) {
            $verifikasi = 'terkonfirmasi';
            $statusKendaraan = 'dipinjam';

            $kendaraan_id = TransaksiPeminjaman::where('id', $id_peminjaman)->pluck('kendaraan_id')->toArray();
            $kendaraanStatus = Kendaraan::where('id', $kendaraan_id)->pluck('status')->toArray();
            
            if($kendaraanStatus != 'sewa') {
                Kendaraan::where('id', $kendaraan_id)->update(['status' => $statusKendaraan]);
            }

            TransaksiPeminjaman::where('id', $id_peminjaman)->update(['verifikasi' => $verifikasi]);

            return redirect('/dashboard/approve-peminjamans')->with('success', 'Approve Peminjaman Kendaraan berhasil dilakukan!');
        }
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

            return redirect('/dashboard/approve-peminjamans')->with('success', 'Reject Peminjaman Kendaraan berhasil dilakukan!');
        }
    }
}
