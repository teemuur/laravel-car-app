<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Company;


class UpdateController extends Controller
{
    public function __invoke(Property $property)
    {
        $data = request()->validate([
            'name' => 'string',
            'type' => 'integer',
        ]);
        $property->update($data);
        return redirect()->route('property.index')->with('success', "Машина была изменена.");
    }
}


