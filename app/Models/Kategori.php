<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable =[
        'kateg',
    ];

    public function berita()
    {
        return $this->hasMany(Berita::class);
    }
}
