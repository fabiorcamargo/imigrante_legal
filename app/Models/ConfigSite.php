<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigSite extends Model
{
    public static function rules($id = null)
    {
        return [
            'banner1' => ['required', 'file'],
        ];
    }

    use HasFactory;
    protected $fillable =
    [
        'user_id',
        'body'
    ];

    public function getCampos()
    {
        return $this->fillable;
    }
}
