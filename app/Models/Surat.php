<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// ini adalah model untuk surat
class Surat extends Model
{
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan tabel surat
    use HasFactory;
    // line baris dibawah ini adalah untuk menentukan nama tabelnya
    protected $table = 'surat';
    // line baris dibawah ini adalah untuk menentukan kolom yang bisa diisi atau di edit
    protected $fillable = [
        'user_id',
        'perihal',
        'tanggal_kegiatan',
        'hari',
        'jam_kegiatan',
        'lokasi_kegiatan',
    ];
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan model user
    public function user()
    {
        // line baris dibawah ini adalah tujuan dari relasi one to many menggunakan belongsto yang dimana menghubungkan model ini dengan model user
        return $this->belongsTo(User::class);
    }

}
