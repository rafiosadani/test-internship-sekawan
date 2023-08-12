@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h4 mb-3 text-gray-800">Detail User</h1>

        <div class="row">
            <div class="col-lg-12">
                <!-- Default Card Example -->
                <div class="card shadow border-primary">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-dark card-title">Form Detail User</h6>
                        <div class="card-tools">
                            <a href="/dashboard/users" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left mr-1"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered shadow">
                                    <tr>
                                        <td class="align-middle" width="35%" rowspan="7">
                                            @if ($user->photo == null || $user->photo == 'default.jpg')
                                                <img src="{{ asset('/img/profile/default.jpg') }}" class="img-fluid shadow" width="100%">
                                            @else
                                                <img src="{{ asset('storage/' . $user->photo) }}" class="img-fluid shadow" width="100%">
                                            @endif
                                        </td>
                                        <td class="align-middle text-dark judul-buku" colspan="2">
                                            <b>Biodata User</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-dark" width="17%">Nama</td>
                                        <td class="align-middle text-dark" width="48%">{{ $user->nama_lengkap }}</td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-dark">Jenis Kelamin</td>
                                        @if ($user->jenis_kelamin == "L")
                                            <td class="align-middle text-dark">Laki-laki</td>
                                        @else
                                            <td class="align-middle text-dark">Perempuan</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-dark">Alamat</td>
                                        <td class="align-middle text-dark">{{ $user->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-dark">No Telepon</td>
                                        <td class="align-middle text-dark">{{ $user->no_telp }}</td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-dark">Email</td>
                                        <td class="align-middle text-dark">{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-dark">Role</td>
                                        <td class="align-middle text-dark">{{ $user->role->nama_role }}</td>
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