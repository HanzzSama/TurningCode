<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminContribution extends Model
{
    /** @use HasFactory<\Database\Factories\AdminContributionFactory> */
    use HasFactory;

    protected $fillable = [
        'admin_email',
        'contribution',
        'date',
        'check_in',
        'check_out'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'admin_email','email');
    }
}
