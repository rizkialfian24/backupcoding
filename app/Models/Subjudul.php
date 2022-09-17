<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjudul extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function deskripsi(){
        return $this-> belongsTo(Deskripsi::class);
    }
}
