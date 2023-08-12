@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h4 mb-3 text-gray-800">Kendaraan</h1>

        <div class="row">
            <div class="col-lg-12">
                <!-- Default Card Example -->
                <div class="card">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa-car"></i> Daftar Kendaraan</h6>
                        <div class="card-tools">
                            <a href="/dashboard/kendaraans/create" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-plus"></i> Tambah Kendaraan</a>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="row mb-2">
                            <div class="col-md-5">
                                <form class="navbar-search" action="/dashboard/kendaraans" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-1 small" placeholder="Search for..." name="keyword">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0" style="font-size: 14px;">
                                <thead>
                                    <th class="text-dark" width="5%" style="text-align: center;">No</th>
                                    <th class="text-dark" width="8%" style="text-align: center;">Image</th>
                                    <th class="text-dark" width="20%">Kendaraan</th>
                                    <th class="text-dark" width="15%" style="text-align: center;">Tipe</th>
                                    <th class="text-dark" width="13%" style="text-align: center;">Bahan Bakar</th>
                                    <th class="text-dark" width="15%" style="text-align: center;">Jenis Kendaraan</th>
                                    <th class="text-dark" width="10%" style="text-align: center;">Status</th>
                                    <th class="text-dark" width="14%" style="text-align: center;">Aksi</th>
                                </thead>
                                <tbody>
                                    @if ($kendaraans->count() > 0)
                                        @foreach ($kendaraans as $kendaraan)
                                            <tr>
                                                <td class="text-center align-middle text-dark">{{ $loop->iteration + ($kendaraans->currentPage() - 1) * $kendaraans->perPage() }}</td>
                                                <td>
                                                    @if ($kendaraan->image == null || $kendaraan->image == 'preview.png')
                                                        <img src="{{ asset('/img/preview.png') }}" class="card-img rounded-circle">
                                                    @else
                                                        <img src="{{ asset('storage/' . $kendaraan->image) }}" class="card-img rounded-circle" width="10px">
                                                    @endif
                                                </td>
                                                <td class="align-middle text-dark">{{ $kendaraan->nama_kendaraan }}</td>
                                                <td class="align-middle text-dark text-center"><b>{{ $kendaraan->tipe }}</b></td>
                                                <td class="align-middle text-dark text-center">{{ $kendaraan->bahan_bakar }}</td>
                                                <td class="align-middle text-dark">Kendaraan {{ ucfirst($kendaraan->jenis_kendaraan) }}</td>
                                                <td class="align-middle text-dark text-center">
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
                                                <td class="align-middle text-center">
                                                    <a href="/dashboard/kendaraans/{{ $kendaraan->id }}" class="badge badge-primary"><i class="fas fa-fw fa-regular fa-eye"></i></a> | 
                                                    <a href="/dashboard/kendaraans/{{ $kendaraan->id }}/edit" class="badge badge-success"><i class="fas fa-fw fa-edit"></i></a> | 
                                                    <form action="/dashboard/kendaraans/{{ $kendaraan->id }}" method="post" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="badge badge-danger border-0" onclick="return confirm('Anda yakin ingin menghapus data kendaraan {{ $kendaraan->nama_kendaraan; }}?');"><i class="fas fa-fw fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else 
                                        <tr>
                                            <td colspan="8" class="text-center">Data tidak ditemukan.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end">
                            {{ $kendaraans->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection