<?php

namespace App\ViewModels;

use App\Models\Faq;
use Spatie\ViewModels\ViewModel;

class FaqViewModel extends ViewModel
{
     
    public function __construct(public ?Faq $faq = null)
    {
        $this->faq = is_null($faq) ? new Faq(old()) : $faq;
    }

    public function action(): string
    {
        return is_null($this->faq->id)
            ? route('admin.faq.store')
            : route('admin.faq.update', ['faq' => $this->faq->id]);
    }

    public function method(): string
    {
        return is_null($this->faq->id) ? 'POST' : 'PUT';
    }
    
}
