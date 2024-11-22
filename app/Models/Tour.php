<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "nama_wisata", "tempat_wisata", "harga", "deskripsi", "gambar", "category_id"
    ];
    public function user(){
        return $this->hasMany(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}