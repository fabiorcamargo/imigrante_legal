<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWork extends Model
{
    use HasFactory;

    public static function rules($id = null)
        {
            return [
                
               
                    'empresa' => ['required', 'string', 'max:150'],
                    'cargo' => ['required', 'string', 'max:150'],
                    'inicio' => ['required', 'date'],
                    'fim' => ['date'],
                    'state_id' => ['required', 'string', 'max:150'],
                    'city_id' => ['required', 'string', 'max:150'],
                    'responsabiliade' => ['required', 'string', 'max:1000'],
                    'conquista' => ['string', 'max:1000'],
              
               
        ];

    }

    protected $fillable = [
        'user_id',
        'cargo',
        'empresa',
        'responsabiliade',
        'conquista',
        'inicio',
        'fim',
        'state_id',
        'city_id',
];

protected $casts = [
    'inicio' => 'datetime:Y-m-d H:i:s',
    'fim' => 'datetime:Y-m-d H:i:s',
];

public function getCampos() {
    
    return $this->fillable;
}

}
