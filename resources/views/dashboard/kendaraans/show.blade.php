@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h4 mb-3 text-gray-800">Detail Kendaraan</h1>

        <div class="row">
            <div class="col-lg-12">
                <!-- Default Card Example -->
                <div class="card shadow border-primary">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-dark card-title">Form Detail Kendaraan</h6>
                        <div class="card-tools">
                            <a href="/dashboard/kendaraans" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left mr-1"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered shadow">
                                    <tr>
                                        <td class="align-middle" width="35%" rowspan="6">
                                            @if ($kendaraan->image == null || $kendaraan->image == 'preview.png')
                                                <img src="{{ asset('/img/preview.png') }}" class="img-fluid shadow" width="100%">
                                            @else
                                                <img src="{{ asset('storage/' . $kendaraan->image) }}" class="img-fluid shadow" width="100%">
                                            @endif
                                        </td>
                                        <td class="align-middle text-dark judul-buku" colspan="2">
                                            <b>Informasi Kendaraan</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-dark" width="17%">Merek Kendaraan</td>
                                        <td class="align-middle text-dark" width="48%">{{ $kendaraan->nama_kendaraan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-dark">Tipe</td>
                                        <td class="align-middle text-dark">{{ $kendaraan->tipe }}</td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-dark">Bahan Bakar</td>
                                        <td class="align-middle text-dark">{{ $kendaraan->bahan_bakar }}</td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-dark">Jenis Kendaraan</td>
                                        @if ($kendaraan->jenis_kendaraan == "barang")
                                            <td class="align-middle text-dark">Kendaraan Barang }}</td>
                                        @else
                                            <td class="align-middle text-dark">Kendaraan Penumpang</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-dark">Status</td>
                                        <td class="align-middle text-dark">
                                            @if ($kendaraan->status == 'tersedia')
                                                <span class="badge badge-primary">{{ ucfirst($kendaraan->status) }}</span>
                                            @elseif ($kendaraan->status == 'dipesan')
                                                <span class="badge badge-warning">{{ ucfirst($kendaraan->status) }}</span>
                                            @elseif ($kendaraan->status == 'dipinjam')
                                                <span class="badge badge-success">{{ ucfirst($kendaraan->status) }}</span>
                                            @elseif ($kendaraan->status == 'servis')
                                                <span class="badge badge-danger">{{ ucfirst($kendaraan->status) }}</span>
                                            @else
                                                <span class="badge badge-info">{{ ucfirst($kendaraan->status) }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection