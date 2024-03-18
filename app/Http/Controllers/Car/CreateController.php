<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Property;

class CreateController extends Controller
{
    public function __invoke()
    {
        $companies = Company::all();
        $properties = Property::all();
        return view('car.create', compact('companies', 'properties'));
    }
}


