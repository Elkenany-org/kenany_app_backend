<?php

namespace App\ViewModels;

use App\Models\Company;
use App\Models\GuideSection;
use Spatie\ViewModels\ViewModel;

class CompanyViewModel extends ViewModel
{
    public $guideSections;
    public function __construct(public ?Company $company = null)
    {
        $this->company = is_null($company) ? new Company(old()) : $company;
        $this->guideSections = GuideSection::get();
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
