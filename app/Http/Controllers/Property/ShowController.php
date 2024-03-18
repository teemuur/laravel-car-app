<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use App\Models\Property;


class ShowController extends Controller
{
    public function __invoke(Property $property)
    {
        return view('property.show', compact('property'));
    }
}


