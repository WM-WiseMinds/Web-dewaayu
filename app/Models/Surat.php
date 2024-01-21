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
        'id_user',
        'id_sekretarisdesa',
        'perihal',
        'tanggal_kegiatan',
        'hari',
        'jam_kegiatan',
        'lokasi_kegiatan',
    ];
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan model user
    public function user()
    {
        // line baris dibawah ini adalah untuk menghubungkan model ini dengan model user
        return $this->belongsTo(User::class);
    }
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan model sekretarisdesa
    public function sekretarisdesa()
    {   
        // line baris dibawah ini adalah untuk menghubungkan model ini dengan model sekretarisdesa
        return $this->belongsTo(Sekretarisdesa::class);
    }
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan model penjadwalan
    public function penjadwalan()
    {
        // line baris dibawah ini adalah untuk menghubungkan model ini dengan model penjadwalan
        return $this->hasMany(Penjadwalan::class);
    }
}
