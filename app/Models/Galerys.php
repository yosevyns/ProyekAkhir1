<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galerys extends Model
{
    use HasFactory;
    protected $table = 'galeris';
    protected $fillable = [
        'user_id','ulos_id','gambar','status'
    ];
}
