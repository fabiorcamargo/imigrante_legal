<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    use HasFactory;

    public static function rules($id = null)
        {
            return [
                
                    'nome' => ['required', 'string', 'max:150'],
                    'instituicao' => ['required', 'string', 'max:150'],
                    'horas' => ['required', 'numeric'],
                    'ano' => ['required', 'numeric'],
               
        ];

    }

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
