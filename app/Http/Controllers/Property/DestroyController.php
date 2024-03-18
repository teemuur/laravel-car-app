<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Company;


class DestroyController extends Controller
{
    public function __invoke(Property $property)
    {
        $property->delete();
        return redirect()->route('property.index')->with('success', "Свойство было удалено.");
    }


}
