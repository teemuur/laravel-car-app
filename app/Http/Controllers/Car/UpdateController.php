<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Models\Car;


class UpdateController extends Controller
{
    public function __invoke(Car $car, CarRequest $req)
    {
        $data = $req->validate([
            'car_name' => 'string',
            'company_id' => '',
            'property_value' => 'array',
            'property_id' => 'array',
        ]);

        $car->update([
            'name' => $data['car_name'],
            'company_id' => $data['company_id'],
        ]);

        $car->properties()->detach();

        $properties = array_filter($data['property_value']);
        $propertyIds = array_filter($data['property_id']);

        foreach ($properties as $key => $value) {
            if (!empty($value)) {
                $car->properties()->attach($propertyIds[$key], ['property_value' => $value]);
            }
        }

        return redirect()->route('car.index')->with('success', "Машина была изменена.");
    }

}


