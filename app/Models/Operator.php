<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// ini adalah model untuk operator
class Operator extends Model
{
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan tabel operator
    use HasFactory;

    // line baris dibawah ini adalah untuk menentukan nama tabelnya
    protected $table = 'operator';
    // line baris dibawah ini adalah untuk menentukan kolom yang bisa diisi atau di edit
    protected $fillable = [
        'id_user',
        'nama_lengkap',
        'no_hp',
        'alamat',
    ];
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan model user
    public function user()
    {
        // line baris dibawah ini adalah relasi one to many yaitu tujuannya maka dari itu menggunakan belongsto untuk menghubungkan model ini dengan model user
        return $this->belongsTo(User::class);
    }
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan model penjadwalan
    public function berita()
    {
        // line baris dibawah ini adalah relasi one to many untuk menghubungkan model ini dengan model berita
        return $this->hasMany(Berita::class);
    }
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan model penjadwalan
    public function penjadwalan()
    {
        // line baris dibawah ini adalah Relasi one to many untuk menghubungkan model ini dengan model penjadwalan
        return $this->hasMany(Penjadwalan::class);
    }
}
