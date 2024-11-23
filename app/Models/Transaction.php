<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tour;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tour(){
        return $this->belongsTo(Tour::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
