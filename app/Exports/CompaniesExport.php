<?php

namespace App\Exports;

use App\Models\Company;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CompaniesExport implements FromView 
{
    
    // public function collection()
    // {
    //     return Company::get();
    // }
    
    public function view(): View
    {
        return view('admin.pages.companies.exports.excel', [
            'companies' => Company::all()
        ]);
    }

}
