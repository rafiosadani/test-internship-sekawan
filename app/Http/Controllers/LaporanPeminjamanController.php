<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanPeminjamanController extends Controller
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
                            ])->paginate(8);
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
                            ])->where('transaksi_peminjamans.approve_user_id', '=', auth()->user()->id)
                            ->paginate(8);
        }

        return view('dashboard.laporan_peminjamans.index', [
            'title' => 'Laporan Peminjaman Kendaraan',
            'peminjamans' => $peminjamans,
        ]);
    }

    // public function exportExcel() {
    //     return Excel::download(new LaporanPen($filter['idCustomer'], $filter['month'], $filter['year']), 'laporan-penjualan-customer.xlsx');
    // }
}
