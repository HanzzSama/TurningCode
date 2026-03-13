<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminCode extends Model
{
    /** @use HasFactory<\Database\Factories\AdminCodeFactory> */
    use HasFactory;

    protected $table = 'admin_codes';
    protected $fillable = ['email', 'code', 'expired_at'];
    public $timestamps = true;
}
