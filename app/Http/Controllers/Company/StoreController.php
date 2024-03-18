<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function __invoke(CompanyRequest $req)
    {
        $company = new Company();
        $company->id = Str::uuid();
        $company->name = $req->input('name');
        $company->save();
        return redirect()->route('company.index')->with('success', "Компания " . $req->input('name') . " была добавлена.");
    }
}


