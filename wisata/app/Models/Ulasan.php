<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;
    protected $table = 'table_ulasan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'komentar','pengunjung_id', 'wisata_id'
    ];
    
    public function pengunjung() {
        return $this->belongsTo(Pengunjung::class);
    }

    public function wisata(){
        return $this->belongsTo(Wisata::class);
    }
}
