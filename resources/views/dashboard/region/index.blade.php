@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h4 mb-3 text-gray-800">Region</h1>

        <div class="row">
            <div class="col-lg-12">
                <!-- Default Card Example -->
                <div class="card border-primary">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa-city"></i> Daftar Regions</h6>
                        <div class="card-tools">
                            <a href="/dashboard/regions/create" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-plus"></i> Tambah Region</a>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="row mb-2">
                            <div class="col-md-5">
                                <form class="navbar-search" action="/dashboard/regions" method="get">
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
                                    <th class="text-dark" width="40%">Region</th>
                                    <th class="text-dark" width="39%">Alamat</th>
                                    <th class="text-dark" width="16%" style="text-align: center;">Aksi</th>
                                </thead>
                                <tbody>
                                    @if ($regions->count() > 0)
                                        @foreach ($regions as $region)
                                            <tr>
                                                <td class="text-center align-middle text-dark">{{ $loop->iteration + ($regions->currentPage() - 1) * $regions->perPage() }}</td>
                                                <td class="align-middle text-dark">{{ $region->nama_region }}</td>
                                                <td class="align-middle text-dark">{{ $region->alamat }}</td>
                                                <td class="align-middle text-center">
                                                    <a href="/dashboard/regions/{{ $region->id }}/edit" class="badge badge-success"><i class="fas fa-fw fa-edit"></i><span> Edit</span></a> | 
                                                    <form action="/dashboard/regions/{{ $region->id }}" method="post" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="badge badge-danger border-0" onclick="return confirm('Anda yakin ingin menghapus data region {{ $region->nama_region; }}?');"><i class="fas fa-fw fa-trash"></i><span> Hapus</span></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else 
                                        <tr>
                                            <td colspan="4" class="text-center">Data tidak ditemukan.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end">
                            {{ $regions->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection