@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h4 mb-3 text-gray-800">Edit Region</h1>

        <div class="row">
            <div class="col-lg-8">
                <!-- Default Card Example -->
                <div class="card shadow mb-4 border-primary">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-dark card-title">Form Edit Region</h6>
                        <div class="card-tools">
                            <a href="/dashboard/regions" class="btn btn-primary btn-sm float-right"><i class="fas fa-solid fa-arrow-left mr-1"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card mb-4 shadow border-primary">
                            <div class="card-body">
                                <form action="/dashboard/regions/{{ $region->id }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="nama_region" class="form-label text-dark">Region</label>
                                                <input type="text" class="form-control text-dark @error('nama_region') is-invalid @enderror" id="nama_region" name="nama_region" value="{{ old('nama_region', $region->nama_region) }}" autocomplete="off">
                                                @error('nama_region')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat" class="form-label text-dark">Alamat</label>
                                                <input type="text" class="form-control text-dark @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $region->alamat) }}" autocomplete="off">
                                                @error('alamat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm float-right" name="submit">Edit Region</button>
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