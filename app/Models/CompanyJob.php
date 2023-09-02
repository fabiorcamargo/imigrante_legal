<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyJob extends Model
{
    use HasFactory;

    public static function rules($id = null){
        
            return [
            'post_img' => ['required', 'file'],
            'company_id' => ['required', 'string'],
            'nome' => ['required', 'string', 'max:150'],
            'sobre' => ['nullable', 'string', 'max:1000000'],
            'descricao' => ['nullable', 'string', 'max:200'],
            'status' => ['nullable', 'string'],
           
        ];
}

    protected $fillable =
        [
            'post_img',
            'user_id',
            'company_id',
            'nome',
            'sobre',
            'descricao',
            'status',
        ];

        public function getCampos() {
            return $this->fillable;
        }

        public function getcompany()
        {
            return $this->hasMany(Company::class, 'id', 'company_id');
        }
}
