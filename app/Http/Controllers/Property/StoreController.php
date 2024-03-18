<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Property;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function __invoke(CompanyRequest $req)
    {
        $property = new Property();
        $property->id = Str::uuid();
        $property->type = $req->input('type');
        $property->name = $req->input("name");
        $property->save();
        return redirect()->route('property.index')->with('success', "Свойство " . $req->input('name') . " было добавлено.");

    }
}


