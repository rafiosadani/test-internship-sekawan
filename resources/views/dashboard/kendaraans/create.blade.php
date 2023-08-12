@extends('dashboard.layouts.main')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Tambah Kendaraan</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card shadow border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Tambah Kendaraan</h6>
                    <div class="card-tools">
                        <a href="/dashboard/kendaraans" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left mr-1"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4 shadow border-primary">
                                <div class="card-body">
                                    <form action="/dashboard/kendaraans" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('post')
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="nama_kendaraan" class="form-label text-dark">Kendaraan</label>
                                                    <input type="text" class="form-control text-dark @error('nama_kendaraan') is-invalid @enderror" id="nama_kendaraan" name="nama_kendaraan" value="{{ old('nama_kendaraan') }}" autocomplete="off">
                                                    @error('nama_kendaraan')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="tipe" class="form-label text-dark">Tipe</label>
                                                            <input type="text" class="form-control text-dark @error('tipe') is-invalid @enderror" id="tipe" name="tipe" value="{{ old('tipe') }}" autocomplete="off">
                                                            @error('tipe')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="bahan_bakar" class="form-label text-dark">Bahan Bakar</label>
                                                            <input type="text" class="form-control text-dark @error('bahan_bakar') is-invalid @enderror" id="bahan_bakar" name="bahan_bakar"  value="{{ old('bahan_bakar') }}" autocomplete="off">
                                                            @error('bahan_bakar')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="jenis_kendaraan" class="form-label text-dark">Jenis Kendaraan</label>
                                                            <select class="form-control selectpicker" name="jenis_kendaraan" id="jenis_kendaraan">
                                                                @if (old('jenis_kendaraan') == 'barang')
                                                                    <option value="barang" selected>Barang</option>
                                                                    <option value="penumpang">Penumpang</option>
                                                                @elseif(old('jenis_kendaraan') == 'penumpang')
                                                                    <option value="barang">Barang</option>
                                                                    <option value="penumpang" selected>Penumpang</option>
                                                                @else
                                                                    <option value="barang">Barang</option>
                                                                    <option value="penumpang">Penumpang</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="kategori_buku" class="form-label text-dark">Image</label>
                                                            <div class="custom-file mb-3">
                                                                <input type="file" class="custom-file-input" name="image" id="customFile">
                                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card mb-2 border-primary">
                                                    <div class="card-header py-2 d-flex justify-content-between align-items-center">
                                                        <h6 class="m-0 font-weight-bold text-dark card-title">Preview Foto</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-8 m-auto">
                                                                <div class="text-center">
                                                                    <img src="{{ asset('/img/preview.png') }}" class="card-img rounded" id="preview-img">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block" name="submit"><i class="fas fa-fw fa-plus"></i> Tambah Kendaraan</button>
                                    </form>
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