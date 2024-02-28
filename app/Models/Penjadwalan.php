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
        'user_id',
        'tanggal_kegiatan',
        'waktu_kegiatan',
        'detail_kegiatan',
        'lokasi_kegiatan',

    ];
    public function user()
    {
        // line ini adalah tujuan dari relasi one to many menggunakan belongsto yang dimana  menghubungkan model ini dengan model user
        return $this->belongsTo(User::class);
    }
}
