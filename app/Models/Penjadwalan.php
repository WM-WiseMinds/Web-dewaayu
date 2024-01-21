<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// ini adalah model untuk penjadwalan
class Penjadwalan extends Model
{
    // line ini adalah untuk menghubungkan model ini dengan tabel penjadwalan
    use HasFactory;
    // line ini adalah untuk menentukan nama tabelnya
    protected $table = 'penjadwalan';
    // line ini adalah untuk menentukan kolom yang bisa diisi atau di edit
    protected $fillable = [
        'id_operator',
        'id_tenagaahli',
        'id_sekretarisdesa',
        'id_surat',
        'tanggal_kegiatan',
        'waktu_kegiatan',
        'detail_kegiatan',
        'lokasi_kegiatan',

    ];
    //kolom di bawah ini adalah untuk menghubungkan model ini dengan model lain
    public function operator()
    {
        // line ini adalah tujuan dari relasi one to many menggunakan belongsto yang dimana  menghubungkan model ini dengan model operator
        return $this->belongsTo(Operator::class);
    }
    //kolom di bawah ini adalah untuk menghubungkan model ini dengan model lain
    public function tenagaahli()
    {
        // line ini adalah tujuan dari relasi one to many menggunakan belongsto yang dimana  menghubungkan model ini dengan model tenagaahli
        return $this->belongsTo(Tenagaahli::class);
    }
    //kolom di bawah ini adalah untuk menghubungkan model ini dengan model lain
    public function sekretarisdesa()
    {
        // line ini adalah tujuan dari relasi one to many menggunakan belongsto yang dimana  menghubungkan model ini dengan model sekretarisdesa
        return $this->belongsTo(Sekretarisdesa::class);
    }
    //kolom di bawah ini adalah untuk menghubungkan model ini dengan model lain
    public function surat()
    {
        // line ini adalah tujuan dari relasi one to many menggunakan belongsto yang dimana  menghubungkan model ini dengan model surat
        return $this->belongsTo(Surat::class);
    }
    //kolom di bawah ini adalah tujuan dari relasi one to many menggunakan belongsto yang dimana  menghubungkan model ini dengan model lain
    public function berita()
    {

        // line ini adalah tujuan dari relasi one to many menggunakan belongsto yang dimana  menghubungkan model ini dengan model berita
        return $this->belongsTo(Berita::class);
    }
    //kolom di bawah ini adalah untuk menghubungkan model ini dengan model lain
    public function user()
    {
        // line ini adalah tujuan dari relasi one to many menggunakan belongsto yang dimana  menghubungkan model ini dengan model user
        return $this->belongsTo(User::class);
    }
}
