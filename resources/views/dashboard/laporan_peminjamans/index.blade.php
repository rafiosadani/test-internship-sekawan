@extends('dashboard.layouts.main')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Laporan Peminjaman Kendaraan</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa-book"></i> Daftar Peminjaman Kendaraan</h6>
                    <div class="card-tools">
                        <a href="#" class="btn btn-success btn-sm float-right"><i class="fas fa-fw fa-file-excel"></i> Export Excel</a>
                    </div>
                </div>
                <div class="card-body p-3">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
                        <thead>
                            <th class="text-dark align-middle" width="12%" style="text-align: center;">Tanggal Pinjam</th>
                            <th class="text-dark align-middle" width="12%" style="text-align: center;">Tanggal Kembali</th>
                            <th class="text-dark align-middle" width="15%" style="text-align: center;">Kendaraan</th>
                            <th class="text-dark align-middle" width="8%" style="text-align: center;">Status</th>
                            <th class="text-dark align-middle" width="10%" style="text-align: center;">Verifikasi</th>
                            <th class="text-dark align-middle" width="15%" style="text-align: center;">Peminjam</th>
                            <th class="text-dark align-middle" width="15%" style="text-align: center;">Approve</th>
                            <th class="text-dark align-middle" width="10%" style="text-align: center;">Region</th>
                            <th class="text-dark align-middle" width="10%" style="text-align: center;">Petugas</th>
                        </thead>
                        <tbody>
                            @if ($peminjamans->count() > 0)
                                @foreach ($peminjamans as $peminjaman)
                                    <tr>
                                        <td class="align-middle text-dark text-center">{{ date('d F Y', strtotime($peminjaman->tanggal_pinjam)) }}</td>
                                        <td class="align-middle text-dark text-center">{{ date('d F Y', strtotime($peminjaman->tanggal_kembali)) }}</td>
                                        <td class="align-middle text-dark text-center">{{ $peminjaman->nama_kendaraan }} <br> <span class="badge rounded-pill text-white bg-secondary">{{ $peminjaman->tipe_kendaraan }}</span></td>
                                        <td class="align-middle text-dark text-center">
                                            <span class="badge rounded-pill text-white bg-info">{{ ucwords($peminjaman->status) }}</span>
                                        </td>
                                        <td class="align-middle text-dark text-center">
                                            @if ($peminjaman->verifikasi == 'tidak terkonfirmasi')
                                                <span class="badge rounded-pill text-white bg-danger">{{ ucwords($peminjaman->verifikasi) }}</span>
                                            @elseif ($peminjaman->verifikasi == 'menunggu konfirmasi')
                                                <span class="badge rounded-pill text-white bg-warning">{{ ucwords($peminjaman->verifikasi) }}</span>
                                            @else 
                                                <span class="badge rounded-pill text-white bg-success">{{ ucwords($peminjaman->verifikasi) }}</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-dark text-center">{{ $peminjaman->nama_peminjam }}</td>
                                        <td class="align-middle text-dark text-center">{{ substr($peminjaman->nama_approve, 2, -2);  }}</td>
                                        <td class="align-middle text-dark text-center">{{ $peminjaman->nama_region }} - {{ $peminjaman->alamat_region }}</td>
                                        <td class="align-middle text-dark text-center">{{ $peminjaman->nama_petugas }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9" class="text-center">Data tidak ditemukan.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {{ $peminjamans->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection