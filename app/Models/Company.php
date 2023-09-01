<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;


    public static function rules($id = null)
        {
            return [
                'nome' => ['required', 'string', 'max:150'],
                'sobre' => ['nullable', 'string', 'max:5000'],
                'logo' => ['nullable', 'file'],
                'banner' => ['nullable', 'file'],
        ];
}

    protected $fillable = [
        'user_id',
        'nome',
        'sobre',
        'logo',
        'banner',
    ];

    public function jobs()
    {
        return $this->hasMany(CompanyJob::class);
    }

    public function getCampos() {
    
        return $this->fillable;
    }
}
