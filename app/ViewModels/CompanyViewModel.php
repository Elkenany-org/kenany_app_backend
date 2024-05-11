<?php

namespace App\ViewModels;

use App\Models\Company;
use Spatie\ViewModels\ViewModel;

class CompanyViewModel extends ViewModel
{
     
    public function __construct(public ?Company $company = null)
    {
        $this->company = is_null($company) ? new Company(old()) : $company;
    }

    public function action(): string
    {
        return is_null($this->company->id)
            ? route('admin.company.store')
            : route('admin.company.update', ['company' => $this->company->id]);
    }

    public function method(): string
    {
        return is_null($this->company->id) ? 'POST' : 'PUT';
    }
    
}
