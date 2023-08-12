@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h4 mb-3 text-gray-800">Approval Peminjaman Kendaraan</h1>

        <div class="row">
            <div class="col-lg-12">
                <!-- Default Card Example -->
                <div class="card border-primary">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa-book"></i> Daftar Approve Peminjaman Kendaraan</h6>
                    </div>
                    <div class="card-body p-3">
                        @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <h6>Kendaraan Milik Perusahaan</h6>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
                            <thead>
                                <th class="text-dark" width="10%" style="text-align: center;">Tanggal Pinjam</th>
                                <th class="text-dark" width="10%" style="text-align: center;">Tanggal Kembali</th>
                                <th class="text-dark align-middle" width="15%" style="text-align: center;">Kendaraan</th>
                                <th class="text-dark align-middle" width="10%" style="text-align: center;">Status</th>
                                <th class="text-dark align-middle" width="5%" style="text-align: center;">Verifikasi</th>
                                <th class="text-dark align-middle" width="15%" style="text-align: center;">Peminjam</th>
                                <th class="text-dark align-middle" width="15%" style="text-align: center;">Approve</th>
                                <th class="text-dark align-middle" width="10%" style="text-align: center;">Region</th>
                                <th class="text-dark align-middle" width="15%" style="text-align: center;">Aksi</th>
                            </thead>
                            <tbody>
                                @if ($peminjamans->count() > 0)
                                    @foreach ($peminjamans as $peminjaman)
                                        <tr>
                                            <td class="align-middle text-dark text-center">{{ date('d F Y', strtotime($peminjaman->tanggal_pinjam)) }}</td>
                                            <td class="align-middle text-dark text-center">{{ date('d F Y', strtotime($peminjaman->tanggal_kembali)) }}</td>
                                            <td class="align-middle text-dark text-center">
                                                {{ $peminjaman->nama_kendaraan }} <br>
                                                <span class="badge rounded-pill text-white bg-secondary">{{ $peminjaman->tipe_kendaraan }}</span>
                                            </td>
                                            <td class="align-middle text-dark text-center">
                                                <span class="badge rounded-pill text-white bg-info">{{ ucwords($peminjaman->status) }}</span>
                                            </td>
                                            <td class="align-middle text-dark text-center">
                                                @if ($peminjaman->verifikasi == 'tidak terkonfirmasi')
                                                    <span class="badge rounded-pill text-white bg-danger">{{ ucwords($peminjaman->verifikasi) }}</span>
                                                @elseif ($peminjaman->verifikasi == 'menunggu konfirmasi')
                                                    <span class="badge rounded-pill text-white bg-warning">{{ ucwords($peminjaman->verifikasi) }}</span>
                                                @else 
                                                    <span class="badge rounded-pill text-white bg-success">{{ ucwords($peminjaman->verifikasi) }}</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-dark text-center">{{ $peminjaman->nama_peminjam }}</td>
                                            <td class="align-middle text-dark text-center">{{ substr($peminjaman->nama_approve, 2, -2)  }}</td>
                                            <td class="align-middle text-dark text-center">{{ $peminjaman->nama_region }} - {{ $peminjaman->alamat_region }}</td>
                                            <td class="align-middle text-center">
                                                <form action="/dashboard/approve-peminjamans/edit/{{ $peminjaman->id_peminjaman }}" method="post" class="d-inline">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="badge badge-success border-0" onclick="return confirm('Anda yakin ingin mengkonfirmasi data peminjaman kendaraan ini?');"><i class="fas fa-fw fa-check"></i> Konfirmasi</button>
                                                </form>
                                                <form action="/dashboard/approve-peminjamans/destroy/{{ $peminjaman->id_peminjaman }}" method="post" class="d-inline">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="badge badge-danger border-0" onclick="return confirm('Anda yakin ingin mereject data peminjaman kendaraan ini?');"><i class="fas fa-fw fa-ban"></i> Reject</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9" class="text-center">Data tidak ditemukan.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-end">
                            {{ $peminjamans->withQueryString()->links() }}
                        </div>
                        <hr>
                        <h6>Kendaraan Sewa</h6>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
                            <thead>
                                {{-- <th class="text-dark align-middle" width="5%" style="text-align: center;">No</th> --}}
                                <th class="text-dark align-middle" width="10%" style="text-align: center;">Tanggal Pinjam</th>
                                <th class="text-dark align-middle" width="10%" style="text-align: center;">Tanggal Kembali</th>
                                <th class="text-dark align-middle" width="15%" style="text-align: center;">Kendaraan</th>
                                <th class="text-dark align-middle" width="10%" style="text-align: center;">Status</th>
                                <th class="text-dark align-middle" width="5%" style="text-align: center;">Verifikasi</th>
                                <th class="text-dark align-middle" width="15%" style="text-align: center;">Peminjam</th>
                                <th class="text-dark align-middle" width="15%" style="text-align: center;">Approve</th>
                                <th class="text-dark align-middle" width="10%" style="text-align: center;">Region</th>
                                <th class="text-dark align-middle" width="15%" style="text-align: center;">Aksi</th>
                            </thead>
                            <tbody>
                                @if ($peminjamans_sewa->count() > 0)
                                    @foreach ($peminjamans_sewa as $peminjaman_sewa)
                                        <tr>
                                            {{-- <td class="text-center align-middle text-dark">{{ $loop->iteration + ($peminjaman_sewas->currentPage() - 1) * $peminjaman_sewas->perPage() }}</td> --}}
                                            <td class="align-middle text-dark text-center">{{ date('d F Y', strtotime($peminjaman_sewa->tanggal_pinjam)) }}</td>
                                            <td class="align-middle text-dark text-center">{{ date('d F Y', strtotime($peminjaman_sewa->tanggal_kembali)) }}</td>
                                            <td class="align-middle text-dark text-center">
                                                {{ $peminjaman_sewa->nama_kendaraan }} <br>
                                                <span class="badge rounded-pill text-white bg-secondary">{{ $peminjaman_sewa->tipe_kendaraan }}</span>
                                            </td>
                                            <td class="align-middle text-dark text-center">
                                                <span class="badge rounded-pill text-white bg-primary">{{ ucwords($peminjaman_sewa->status) }}</span><br>
                                                <span class="badge rounded-pill text-white bg-success">{{ ucwords($peminjaman_sewa->nama_perusahaan) }}</span>
                                            </td>
                                            <td class="align-middle text-dark text-center">
                                                @if ($peminjaman_sewa->verifikasi == 'tidak terkonfirmasi')
                                                    <span class="badge rounded-pill text-white bg-danger">{{ ucwords($peminjaman_sewa->verifikasi) }}</span>
                                                @elseif ($peminjaman_sewa->verifikasi == 'menunggu konfirmasi')
                                                    <span class="badge rounded-pill text-white bg-warning">{{ ucwords($peminjaman_sewa->verifikasi) }}</span>
                                                @else 
                                                    <span class="badge rounded-pill text-white bg-success">{{ ucwords($peminjaman_sewa->verifikasi) }}</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-dark text-center">{{ $peminjaman_sewa->nama_peminjam }}</td>
                                            <td class="align-middle text-dark text-center">{{ substr($peminjaman_sewa->nama_approve, 2, -2) }}</td>
                                            <td class="align-middle text-dark text-center">{{ $peminjaman_sewa->nama_region }} - {{ $peminjaman_sewa->alamat_region }}</td>
                                            <td class="align-middle text-center">
                                                <form action="/dashboard/approve-peminjamans/edit/{{ $peminjaman_sewa->id_peminjaman }}" method="post" class="d-inline">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="badge badge-success border-0" onclick="return confirm('Anda yakin ingin mengkonfirmasi data peminjaman kendaraan ini?');"><i class="fas fa-fw fa-check"></i> Konfirmasi</button>
                                                </form>
                                                <form action="/dashboard/approve-peminjamans/destroy/{{ $peminjaman_sewa->id_peminjaman }}" method="post" class="d-inline">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="badge badge-danger border-0" onclick="return confirm('Anda yakin ingin mereject data peminjaman kendaraan ini?');"><i class="fas fa-fw fa-ban"></i> Reject</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9" class="text-center">Data tidak ditemukan.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $peminjamans_sewa->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection