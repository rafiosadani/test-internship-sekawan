<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_peminjamans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->enum('status', ['pinjam', 'sewa']);
            $table->enum('verifikasi', ['tidak terkonfirmasi', 'menunggu konfirmasi', 'terkonfirmasi']);
            $table->unsignedBigInteger('kendaraan_id');
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('perusahaan_persewaan_id')->nullable();
            $table->unsignedBigInteger('petugas_user_id');
            $table->unsignedBigInteger('peminjam_user_id');
            $table->string('nama_petugas');
            $table->unsignedBigInteger('approve_user_id');
            $table->string('nama_approve');
            $table->timestamps();

            $table->foreign('kendaraan_id')->references('id')->on('kendaraans');
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('perusahaan_persewaan_id')->references('id')->on('perusahaan_persewaans');
            $table->foreign('petugas_user_id')->references('id')->on('users');
            $table->foreign('peminjam_user_id')->references('id')->on('users');
            $table->foreign('approve_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_peminjaman');
    }
};
