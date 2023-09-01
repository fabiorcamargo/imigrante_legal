<?php

namespace App\Http\Controllers;

use App\Tables\Users;

class UserController extends Controller
{
    public function list(){

        return view('user.list', [    
            'users' => Users::class,      
        ]);
    }
}
