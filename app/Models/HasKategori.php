<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class HasKategori extends Model
{
    use HasFactory;
    protected $table ='haskategori';
    protected $fillable = [
        'kategori_id',
        'ulos_id',
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
}
