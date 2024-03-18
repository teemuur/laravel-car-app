<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Property;
use App\Models\Company;


class EditController extends Controller
{
    public function __invoke(Property $property)
    {
        $cars = Car::all();
        return view('property.edit', compact('property', 'cars'));
    }
}


