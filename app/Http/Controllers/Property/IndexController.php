<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use App\Models\Property;


class IndexController extends Controller
{
    public function __invoke()
    {
        $properties = Property::all();
        return view("property.index", compact('properties'));
    }
}


