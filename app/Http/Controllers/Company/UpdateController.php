<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;


class UpdateController extends Controller
{
    public function __invoke(Company $company)
    {
        $data = request()->validate([
            'name' => 'string'
        ]);
        $company->update($data);
        return redirect()->route('company.index')->with('success', "Компания была изменена.");
    }
}


