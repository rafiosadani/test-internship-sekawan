@extends('dashboard.layouts.main')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Edit Profil</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card shadow mb-4 border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Edit Profil</h6>
                    <div class="card-tools">
                        <a href="index.php?include=profil" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card mb-4 shadow border-primary">
                                <div class="card-body">
                                    <form action="index.php?include=konfirmasi-edit-profil" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id_user" value="<?= $id_user; ?>">
                                        <input type="hidden" name="passwordLama" value="<?= $password; ?>">
                                        <input type="hidden" name="fotoLama" value="<?= $foto; ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jk" class="form-label">Jenis Kelamin</label><br>
                                                    <select class="form-control" name="jenis_kelamin">
                                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                                        <option value="L" <?php if($jenis_kelamin == "L") { ?> selected <?php } ?>>Laki-laki</option>
                                                        <option value="P" <?php if($jenis_kelamin == "P") { ?> selected <?php } ?>>Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat; ?>">
                                                </div>
                                                <div class="mb-0">
                                                    <label for="no_telp" class="form-label">No Telepon</label>
                                                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $no_telp; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="username" name="username" value="<?= $username; ?>">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="password" name="password">
                                                    <span class="text-danger" style="font-weight:lighter; font-size:14px">
                                                        *Jangan diisi jika tidak ingin mengubah password
                                                    </span>
                                                </div>
                                                <div class="custom-file mb-5">
                                                    <input type="file" class="custom-file-input" name="foto" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block float-right" name="submit">Edit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-4 shadow border-primary">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                    <h6 class="m-0 font-weight-bold text-dark card-title">Preview Foto</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8 m-auto">
                                            <div class="text-center">
                                                <img src="assets/img/profile/<?= $foto; ?>" class="card-img rounded" id="preview-img">
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
