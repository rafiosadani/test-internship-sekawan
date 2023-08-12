@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h4 mb-3 text-gray-800">Tambah Role</h1>

        <div class="row">
            <div class="col-lg-8">
                <!-- Default Card Example -->
                <div class="card shadow mb-4 border-primary">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-dark card-title">Form Tambah Role</h6>
                        <div class="card-tools">
                            <a href="/dashboard/roles" class="btn btn-primary btn-sm float-right"><i class="fas fa-solid fa-arrow-left mr-1"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card mb-4 shadow border-primary">
                            <div class="card-body">
                                <form action="/dashboard/roles" method="post">
                                    @csrf
                                    @method('post')
                                    <div class="row mb-3 g-3 align-items-start">
                                        <div class="col-md-2">
                                            <label for="nama_role" class="col-form-label text-dark">Role</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" id="role" class="form-control text-dark @error('nama_role') is-invalid @enderror" name="nama_role" value="{{ old('nama_role') }}" autocomplete="off">
                                            @error('nama_role')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Tambah Role</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection