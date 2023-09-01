<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nome',
        'instituicao',
        'horas',
        'ano',
];

public function getCampos() {
    return $this->fillable;
}
}