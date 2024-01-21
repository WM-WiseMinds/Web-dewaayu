<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penjadwalans', function (Blueprint $table) {
            // Ini adalah kolom 'id' yang akan menjadi primary key tabel.
            $table->id();
            //ini adalah kolom untuk menghubungkan tabel penjadwalan dengan tabel user
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            //ini adalah kolom untuk menghubungkan tabel penjadwalan dengan tabel surat
            $table->foreignId('surat')->constrained('surats')->onDelete('cascade');
            //ini adalah kolom untuk menghubungkan tabel penjadwalan dengan tabel tenaga_ahli
            $table->foreignId('tenaga_ahli_id')->constrained('tenagaahlis')->onDelete('cascade');
            //ini adalah kolom untuk menghubungkan tabel penjadwalan dengan tabel operator
            $table->foreignId('operator_id')->constrained('operators')->onDelete('cascade');
            //ini adalah kolom untuk menghubungkan tabel penjadwalan dengan tabel sekretarisdesa
            $table->foreignId('sekretarisdesa_id')->constrained('sekretarisdesas')->onDelete('cascade');
            //ini adalah kolom tabel untuk menyimpan atribut tanggal kegiatan
            $table->date('tanggal_kegiatan');
            //ini adalah kolom tabel untuk menyimpan atribut waktu kegiatan
            $table->string('waktu_kegiatan');
            //ini adalah kolom tabel untuk menyimpan atribut detail kegiatan
            $table->string('detail_kegiatan');
            //ini adalah kolom tabel untuk menyimpan atribut lokasi kegiatan
            $table->string('lokasi_kegiatan');
            //ini adalah kolom tabel untuk melakukan otomatisasi pencatatan waktu pembuatan dan pembaruan record
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjadwalans');
    }
};
