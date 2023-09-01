<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTraining extends Model
{
    use HasFactory;

    public static function rules($id = null)
        {
            return [
            'nome' => ['required', 'string', 'max:150'],
            'instituicao' => ['required', 'string', 'max:150'],
            'ano' => ['required', 'numeric', 'min:1960'],
            'descricao' => ['required', 'string', 'max:350'],
        ];

    }
        

    protected $fillable = [
        'user_id',
        'nome',
        'instituicao',
        'ano',
        'descricao',
];

public function getCampos() {
    return $this->fillable;
}
}
