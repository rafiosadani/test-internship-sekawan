@extends('dashboard.layouts.main')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Role</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa-cog"></i> Daftar Role</h6>
                    <div class="card-tools">
                        <a href="/dashboard/roles/create" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-plus"></i> Tambah Role</a>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <form class="navbar-search" action="/dashboard/roles" method="get">
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
                                <th class="text-dark" width="79%">Role</th>
                                <th class="text-dark" width="16%" style="text-align: center;">Aksi</th>
                            </thead>
                            <tbody>
                                @if ($roles->count() > 0)
                                    @foreach ($roles as $role)    
                                        <tr>
                                            <td class="text-center align-middle text-dark">{{ $loop->iteration + ($roles->currentPage() - 1) * $roles->perPage() }}</td>
                                            <td class="align-middle text-dark">{{ $role->nama_role }}</td>
                                            <td class="align-middle text-center">
                                                <a href="/dashboard/roles/{{ $role->id }}/edit" class="badge badge-success"><i class="fas fa-fw fa-edit"></i><span> Edit</span></a> | 
                                                <form action="/dashboard/roles/{{ $role->id }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="badge badge-danger border-0" onclick="return confirm('Anda yakin ingin menghapus data role {{ $role->nama_role; }}?');"><i class="fas fa-fw fa-trash"></i><span> Hapus</span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">Data tidak ditemukan.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection