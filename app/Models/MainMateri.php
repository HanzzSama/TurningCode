<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainMateri extends Model
{
    /** @use HasFactory<\Database\Factories\MainMateriFactory> */
    use HasFactory;

    protected $fillable = ['title','icon'];

    public function materis()
    {
        return $this->hasMany(Materi::class,'mainmateri_id');
    }
}
