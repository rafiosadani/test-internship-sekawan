@extends('dashboard.layouts.main')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Edit User</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card shadow mb-4 border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Edit User</h6>
                    <div class="card-tools">
                        <a href="/dashboard/users" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left mr-1"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card mb-4 border-primary">
                                <div class="card-body">
                                    <form action="/dashboard/users/{{ $user->id }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $user->nama_lengkap) }}" autocomplete="off">
                                                    @error('nama_lengkap')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                    <select class="form-control selectpicker" id="jenis_kelamin" name="jenis_kelamin">
                                                        @if (old('jenis_kelamin', $user->jenis_kelamin) == 'L')
                                                            <option value="L" selected>Laki-laki</option>
                                                        @elseif(old('jenis_kelamin', $user->jenis_kelamin) == 'P')
                                                            <option value="P" selected>Perempuan</option>
                                                        @else
                                                            <option value="L">Laki-laki</option>
                                                            <option value="P">Perempuan</option>
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $user->alamat) }}" autocomplete="off">
                                                    @error('alamat')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="no_telp" class="form-label">No Telepon</label>
                                                    <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ old('no_telp', $user->no_telp) }}" autocomplete="off">
                                                    @error('no_telp')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" autocomplete="off">
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-0">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                                    <span class="text-danger" style="font-weight:lighter; font-size:14px">
                                                        *Jangan diisi jika tidak ingin mengubah password
                                                    </span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="role_id" class="form-label">Role</label>
                                                    <select class="form-control selectpicker" name="role_id" id="role_id" data-live-search="true">
                                                        @foreach ($roles as $role)
                                                            @if (old('role_id', $user->role_id) == $role->id)
                                                                <option value="{{ $role->id }}" selected>{{ $role->nama_role }}</option>
                                                            @else
                                                                <option value="{{ $role->id }}">{{ $role->nama_role }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="customFile" class="form-label">Photo</label>
                                                    <input type="hidden" name="oldPhoto" value="{{ $user->photo }}">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="photo" id="customFile">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                        @error('photo')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block" name="submit"><i class="fas fa-fw fa-edit"></i> Edit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-4 border-primary">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                    <h6 class="m-0 font-weight-bold text-dark card-title">Preview Foto</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8 m-auto">
                                            <div class="text-center">
                                                @if ($user->photo == null || $user->photo == 'default.jpg')
                                                    <img src="{{ asset('/img/profile/default.jpg') }}" class="card-img rounded" id="preview-img">
                                                @else
                                                    <img src="{{ asset('storage/' . $user->photo) }}" class="card-img rounded" id="preview-img">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection