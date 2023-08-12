@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h4 mb-3 text-gray-800">Transaksi Peminjaman Kendaraan</h1>

        <div class="row">
            <div class="col-md-12">
                <!-- Default Card Example -->
                <div class="card shadow mb-4 border-primary">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-dark card-title">Form Tambah Peminjaman Kendaraan</h6>
                        <div class="card-tools">
                            <a href="/dashboard/transaksi-peminjamans" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card mb-4 shadow border-primary">
                            <div class="card-body">
                                <form action="/dashboard/transaksi-peminjamans/store" method="post">
                                    @csrf
                                    @method('post')
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="row mb-3 g-3 align-items-center">
                                                <div class="col-md-5">
                                                    <label for="peminjam_user_id" class="col-form-label text-dark">Peminjam</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <select class="form-control text-dark selectpicker" name="peminjam_user_id" id="peminjam_user_id" data-live-search="true" required>
                                                        <option value="">-- Pilih Peminjam --</option>
                                                        @foreach ($peminjams as $peminjam)
                                                            <option value="{{ $peminjam->id }}">{{ $peminjam->nama_lengkap }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('peminjam_user_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3 g-3 align-items-center">
                                                <div class="col-md-5">
                                                    <label for="kendaraan" class="col-form-label text-dark">Merek Kendaraan</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <select class="form-control selectpicker" name="kendaraan" id="kendaraan" data-live-search="true">
                                                        <option value="">-- Pilih Kendaaran--</option>
                                                        @foreach ($kendaraans as $kendaraan)
                                                            <option value="{{ $kendaraan->id }}">{{ $kendaraan->nama_kendaraan }} - {{ $kendaraan->tipe }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3 g-3 align-items-center">
                                                <div class="col-md-5">
                                                    <label for="perusahaan_persewaan_id" class="col-form-label text-dark">Perusahaan Persewaan</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <select class="form-control selectpicker" name="perusahaan_persewaan_id" id="perusahaan_persewaan_id" data-live-search="true">
                                                        <option value="">-- Pilih Perusahaan--</option>
                                                        @foreach ($perusahaans as $perusahaan)
                                                            <option value="{{ $perusahaan->id }}">{{ $perusahaan->nama_perusahaan }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('perusahaan_persewaan_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3 g-3 align-items-center">
                                                <div class="col-md-5">
                                                    <label for="kendaraan_sewa" class="col-form-label text-dark">Merek Kendaraan (Sewa)</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <select class="form-control selectpicker" name="kendaraan_sewa" id="kendaraan_sewa" data-live-search="true">
                                                        <option value="">-- Pilih Kendaaran (Sewa)--</option>
                                                        @foreach ($kendaraans_sewa as $kendaraan_sewa)
                                                            <option value="{{ $kendaraan_sewa->id }}">{{ $kendaraan_sewa->nama_kendaraan }} - {{ $kendaraan->tipe }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row mb-3 align-items-center">
                                                <div class="col-md-5">
                                                    <label for="tanggal_pinjam" class="col-form-label text-dark">Tanggal Pinjam</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="input-group">
                                                        <input type="date" class="form-control" name="tanggal_pinjam" id="tanggal_pinjam" autocomplete="off" value="<?= date('Y-m-d'); ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-5">
                                                    <label for="tanggal_kembali" class="col-form-label text-dark">Tanggal Kembali</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="input-group">
                                                        <input type="date" class="form-control" name="tanggal_kembali" id="tanggal_kembali" autocomplete="off" required>
                                                    </div>
                                                    @error('tanggal_kembali')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3 g-3 align-items-center">
                                                <div class="col-md-5">
                                                    <label for="region_id" class="col-form-label text-dark">Region</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <select class="form-control selectpicker" name="region_id" id="region_id" data-live-search="true" required>
                                                        <option value="">-- Pilih Region--</option>
                                                        @foreach ($regions as $region)
                                                            <option value="{{ $region->id }}">{{ $region->nama_region }} - {{ $region->alamat }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('region_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3 g-3 align-items-center">
                                                <div class="col-md-5">
                                                    <label for="approve_user_id" class="col-form-label text-dark">Approve</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <select class="form-control selectpicker" name="approve_user_id" id="approve_user_id" data-live-search="true" required>
                                                        <option value="">-- Pilih Approve --</option>
                                                        @foreach ($approves as $approve)
                                                            <option value="{{ $approve->id }}">{{ $approve->nama_lengkap }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('approve_user_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    {{-- <a href="/transaksi-peminjamans" class="btn btn-danger btn-block"><i class="fas fa-fw fa-times"></i> Batalkan</a> --}}
                                    <button type="submit" class="btn btn-primary btn-block" id="btn-simpan"><i class="fas fa-fw fa-save"></i> Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection