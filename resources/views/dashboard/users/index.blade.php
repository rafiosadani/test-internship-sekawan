@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h4 mb-3 text-gray-800">Pengaturan Users</h1>

        <div class="row">
            <div class="col-lg-12">
                <!-- Default Card Example -->
                <div class="card">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa fa-users"></i> Daftar Users</h6>
                        <div class="card-tools">
                            <a href="/dashboard/users/create" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-plus"></i> Tambah Users</a>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="row mb-2">
                            <div class="col-md-5">
                                <form class="navbar-search" action="/dashboard/users" method="get">
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
                                    <th class="text-dark" width="20%">Nama</th>
                                    <th class="text-dark" width="15%">Jenis Kelamin</th>
                                    <th class="text-dark" width="21%">Alamat</th>
                                    <th class="text-dark" width="15%" style="text-align: center;">Email</th>
                                    <th class="text-dark" width="10%" style="text-align: center;">Role</th>
                                    <th class="text-dark" width="14%" style="text-align: center;">Aksi</th>
                                </thead>
                                <tbody>
                                    @if ($users->count() > 0)
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="text-center align-middle text-dark">{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                                                <td class="align-middle text-dark">{{ $user->nama_lengkap }}</td>
                                                <?php if($user->jenis_kelamin == "L") : ?>
                                                    <td class="align-middle text-dark">Laki-laki</td>
                                                <?php else : ?>
                                                    <td class="align-middle text-dark">Perempuan</td>
                                                <?php endif; ?>
                                                <td class="align-middle text-dark">{{ $user->alamat }}</td>
                                                <td class="align-middle text-dark">{{ $user->email }}</td>
                                                <td class="align-middle text-dark text-center">{{ $user->role->nama_role }}</td>
                                                <td class="align-middle text-center">
                                                <a href="/dashboard/users/{{ $user->id }}" class="badge badge-primary"><i class="fas fa-fw fa-regular fa-eye"></i></a> | 
                                                <a href="/dashboard/users/{{ $user->id }}/edit" class="badge badge-success"><i class="fas fa-fw fa-edit"></i></a> | 
                                                <form action="/dashboard/users/{{ $user->id }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="badge badge-danger border-0" onclick="return confirm('Anda yakin ingin menghapus data user {{ $user->nama_lengkap; }}?');"><i class="fas fa-fw fa-trash"></i></button>
                                                </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else 
                                        <tr>
                                            <td colspan="7" class="text-center">Data tidak ditemukan.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end">
                            {{ $users->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection