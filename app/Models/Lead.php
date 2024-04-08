<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    
    use HasFactory;

    public static function rules($id = null){
        
        return [
            'nome' => ['required', 'string', 'max:150'],
            'telefone' => ['required', 'string', 'min:10', 'max:15'],
            'email' => ['required', 'email', 'max:150'],
            'state_id' => ['required', 'string', 'max:150'],
            'city_id' => ['required', 'string', 'max:150'],
            'pais_interesse' => ['required', 'string', 'max:150'],
    ];
}
    protected $fillable =
    [
            'nome',
            'telefone',
            'email',
            'state_id',
            'city_id',
            'pais_interesse',
    ];

    public function cities()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
    public function state()
    {
        return $this->belongsTo(States::class);
    }

    public function getCampos() {
        return $this->fillable;
    }

    public function Mautic()
    {
        return $this->hasMany(MauticForm::class);
    }
}
