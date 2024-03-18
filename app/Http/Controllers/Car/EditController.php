<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarProperty;
use App\Models\Company;
use App\Models\Property;


class EditController extends Controller
{
    public function __invoke(Car $car)
    {
        $properties = Property::all();
        $companies = Company::all();
        $car_properties = CarProperty::all();
        return view('car.edit', compact(['car', 'companies', 'properties', 'car_properties']));
    }
}


