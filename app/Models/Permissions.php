<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// ini adalah model untuk berita
class Permissions extends Model
{
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan tabel berita
    use HasFactory;
    // line baris dibawah ini adalah untuk menentukan nama tabelnya
    protected $table ='permissions';
    // line baris dibawah ini adalah untuk menentukan kolom yang bisa diisi atau di edit
    protected $fillable = [
        'name',
    ];
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan model operator
    public function roles()
    {  
        // line baris dibawah ini adalah tujuan dari relasi one to many menggunakan belongsto yang dimana  menghubungkan model ini dengan model operator
        return $this->belongsToMany(Roles::class);
    }

    
}
