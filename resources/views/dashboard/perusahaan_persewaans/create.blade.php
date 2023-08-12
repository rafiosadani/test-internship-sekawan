@extends('dashboard.layouts.main')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Tambah Perusahaan Persewaan</h1>

    <div class="row">
        <div class="col-lg-8">
            <!-- Default Card Example -->
            <div class="card shadow mb-4 border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Tambah Perusahaan Persewaan</h6>
                    <div class="card-tools">
                        <a href="/dashboard/perusahaan-persewaans" class="btn btn-primary btn-sm float-right"><i class="fas fa-solid fa-arrow-left mr-1"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card mb-4 shadow border-primary">
                        <div class="card-body">
                            <form action="/dashboard/perusahaan-persewaans" method="post">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="nama_perusahaan" class="form-label text-dark">Perusahaan Persewaan</label>
                                            <input type="text" class="form-control text-dark @error('nama_perusahaan') is-invalid @enderror" id="nama_perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" autocomplete="off">
                                            @error('nama_perusahaan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label text-dark">Alamat</label>
                                            <input type="text" class="form-control text-dark @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}" autocomplete="off">
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm float-right" name="submit">Tambah Perusahaan Persewaan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection