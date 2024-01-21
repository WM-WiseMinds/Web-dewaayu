<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// ini adalah model untuk sekretarisdesa
class Sekretarisdesa extends Model
{
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan tabel sekretarisdesa
    use HasFactory;
    // line baris dibawah ini adalah untuk menentukan nama tabelnya
    protected $table = 'sekretarisdesa';
    // line baris dibawah ini adalah untuk menentukan kolom yang bisa diisi atau di edit
    protected $fillable = [
        'id_user',
        'nama_lengkap',
        'jabatan',
        'no_hp',
        'alamat',
    ];
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan model user
    public function user()
    {
        // line baris dibawah ini adalah tujuan dari relasi one to many menggunakan belongsto yang dimana menghubungkan model ini dengan model user
        return $this->belongsTo(User::class);
    }
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan model penjadwalan
    public function penjadwalan()
    {
        // line baris dibawah ini adalah relasi one to many menggunakan hasMany yang dimana menghubungkan model ini dengan model penjadwalan
        return $this->hasMany(Penjadwalan::class);
    }
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan model surat
    public function surat()
    {   
        // line baris dibawah ini adalah  relasi one to many menggunakan hasMany yang dimana  menghubungkan model ini dengan model surat
        return $this->hasMany(Surat::class);
    }
}
