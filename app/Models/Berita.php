<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// ini adalah model untuk berita
class Berita extends Model
{
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan tabel berita
    use HasFactory;
    protected $table = 'beritas';
    // line baris dibawah ini adalah untuk menentukan nama tabelnya
    protected $fillable = [
        'operator_id',
        'no_berita',
        'judul_berita',
        'deskripsi_berita',
        'foto',
    ];
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan model operator
    public function operator()
    {
        // line baris dibawah ini adalah relasi one to many untuk menghubungkan model ini dengan model operator menggunakan belongsto
        return $this->belongsTo(Operator::class);
    }
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan model user    
    public function user()
    {
        // line baris dibawah ini adalah relasi one to many dengan model user
        return $this->belongsTo(User::class);
    }
}
