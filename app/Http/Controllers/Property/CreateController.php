<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use App\Models\Car;

class CreateController extends Controller
{
    public function __invoke()
    {
        $cars = Car::all();
        return view('property.create', compact('cars'));
    }
}


