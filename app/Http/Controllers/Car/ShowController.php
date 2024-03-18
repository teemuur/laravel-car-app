<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Models\Car;

class ShowController extends Controller
{

    public function __invoke(Car $car)
    {
        return view('car.show', compact('car'));
    }
}

