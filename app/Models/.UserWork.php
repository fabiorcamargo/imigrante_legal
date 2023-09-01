<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWork extends Model
{
    use HasFactory;

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
