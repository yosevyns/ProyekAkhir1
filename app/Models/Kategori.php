<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HasKategori;

class Kategori extends Model
{
    use HasFactory;
    protected $table ="kategori";
    protected $fillable=[
        'nama_kategori',
        'cover_kategori',
        'deskripsi_kategori',
    ];

    public function haskategori(){
        return $this->hasMany(HasKategori::class);
    }
}
