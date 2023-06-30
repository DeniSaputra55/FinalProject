<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penginapan extends Model
{
    use HasFactory;
    protected $table = 'table_penginapan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama','fasilitas', 'alamat', 'harga','kelas','foto'
    ];

    public function ulasan_penginapan(){
        return $this->hasMany(UlasanPenginapan::class);
    }

    public function ulasan_wisata(){
        return $this->hasMany(UlasanWisata::class);
    }
}
