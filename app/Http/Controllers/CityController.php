<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function get($city)
    {
        //dd($city);
        $cities = City::where('state_id', $city)->orderBy('title')->get();
        (json_encode($cities));
        return $cities;
    }
    public function all()
    {
        $cities = City::pluck('title', 'id');
        //dd($cities);
        
        
        return ($cities);
    }
}
