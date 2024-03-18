<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function __invoke(CarRequest $req)
    {
        $car = new Car();
        $car->id = Str::uuid();
        $car->name = $req->input('car_name');
        $car->company_id = $req->input('company_id');
        $car->save();

        $properties = $req->input('property_value', []);
        $propertyIds = $req->input('property_id', []);

        foreach ($properties as $key => $value) {
            if (!empty($value)) {
                $car->properties()->attach($propertyIds[$key], ['property_value' => $value]);
            }
        }

        return redirect()->route('car.index')->with('success', "Машина " . $req->input('car_name') . " была добавлена.");
    }
}


