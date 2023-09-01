<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodePremium extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'seller',
        'token',
        'active',
        'validity'
    ];
}
