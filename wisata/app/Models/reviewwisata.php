<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reviewwisata extends Model
{
    use HasFactory;
    protected $table = 'table_review_wisata';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama', 'wisata_id', 'komentar'

    ];
    public function wisata(){
        return $this->belongsTo(Wisata::class);
    } 
    
}
