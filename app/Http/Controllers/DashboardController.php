<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\PerusahaanPersewaan;
use App\Models\Region;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::groupBy('status')
            ->selectRaw('status, count(*) as count')
            ->pluck('count', 'status')
            ->toArray();

        $jumlahKendaraan = Kendaraan::selectRaw('count(*) as count')
            ->pluck('count');

        $jumlahPegawai = User::selectRaw('count(*) as count')
            ->where('role_id', '=', 3)
            ->pluck('count');

        $jumlahPerusahaan = PerusahaanPersewaan::selectRaw('count(*) as count')
            ->pluck('count');

        $jumlahRegion = Region::selectRaw('count(*) as count')
            ->pluck('count');
        
        $statusLabels = ['tersedia', 'dipesan', 'dipinjam', 'servis', 'sewa'];

        $kendaraans = array_replace(array_fill_keys($statusLabels, 0), $kendaraans);

        // dd($kendaraans);

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'jumlahKendaraan' => $jumlahKendaraan,
            'jumlahPegawai' => $jumlahPegawai,
            'jumlahPerusahaan' => $jumlahPerusahaan,
            'jumlahRegion' => $jumlahRegion,
            'status' => $statusLabels,
            'kendaraans' => $kendaraans
        ]);
    }
}
