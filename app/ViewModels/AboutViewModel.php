<?php

namespace App\ViewModels;

use App\Models\About;
use Spatie\ViewModels\ViewModel;

class AboutViewModel extends ViewModel
{
     
    public function __construct(public ?About $about = null)
    {
        $this->about = is_null($about) ? new About(old()) : $about;
    }

    public function action(): string
    {
        return is_null($this->about->id)
            ? route('admin.about.store')
            : route('admin.about.update', ['about' => $this->about->id]);
    }

    public function method(): string
    {
        return is_null($this->about->id) ? 'POST' : 'PUT';
    }
    
}
