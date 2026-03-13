<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    /** @use HasFactory<\Database\Factories\MateriFactory> */
    use HasFactory;

    protected $fillable = ['mainmateri_id','title','description'];

    public function mainmateri()
    {
        return $this->belongsTo(MainMateri::class);
    }
    public function subMateris()
    {
        return $this->hasMany(SubMateri::class);
    }
}
