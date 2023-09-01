<?php

namespace App\Http\Controllers;

use App\Models\States;
use Illuminate\Http\Request;

class UfController extends Controller
{
    public function get()
    {
        
        $uf = States::get();
        //dd((json_encode($uf)));
        return response()->json($uf);
    }

    public function name($id)
    {
        
        $uf = States::find($id)->cities()->get();
        dd((json_encode($uf)));
        return $uf->title;
    }

    public function region($id){
        $uf = States::find($id);
        dd($uf->region()->first());

    }
}
