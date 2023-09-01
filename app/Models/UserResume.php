<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class UserResume extends Model
{
    use HasFactory;

    public static function rules($id = null)
    {
        return [
        'username' => ['required', 'string', 'max:150', Rule::unique('user_resumes')->ignore($id)],
        'viagem' => ['string'],
        'mudanca' => ['string'],
        'photo' => ['required', 'file'],
        'nome' => ['required', 'string', 'max:150'],
        'email' => ['required', 'email', 'max:150'],
        'objetivo' => ['required', 'string', 'max:350'],
        'telefone' => ['required', 'string', 'min:10'],
        'skills' => ['required', 'array'],
        'nascimento' => ['required', 'date'],
        'state_id' => ['required', 'string', 'max:150'],
        'city_id' => ['required', 'string', 'max:150'],
            // outras regras de validação
        ];
    }

    protected $fillable = [
        'username',
        'viagem',
        'mudanca',
        'user_id',
        'nome',
        'objetivo',
        'skills',
        'nascimento',
        'telefone',
        'email',
        'state_id',
        'city_id',
        'photo',
        'cursos_complementares',
        'formacao'
    ];

    protected $casts = [
        'nascimento' => 'datetime:Y-m-d H:i:s',
        'skills' => 'array'
    ];

    public function cities()
    {
        return UserResume::select('title')->get();
    }
    public function state()
    {
        return $this->belongsTo(States::class);
    }

    public function getCampos() {
    
        return $this->fillable;
    }

    public function works()
    {
        return $this->belongsTo(UserWork::class);
    }

    public function getuser()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
