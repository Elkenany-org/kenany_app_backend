<?php

namespace App\ViewModels;

use App\Models\Testimonial;
use Spatie\ViewModels\ViewModel;

class TestimonialViewModel extends ViewModel
{
     
    public function __construct(public ?Testimonial $testimonial = null)
    {
        $this->testimonial = is_null($testimonial) ? new Testimonial(old()) : $testimonial;
    }

    public function action(): string
    {
        return is_null($this->testimonial->id)
            ? route('admin.testimonial.store')
            : route('admin.testimonial.update', ['testimonial' => $this->testimonial->id]);
    }

    public function method(): string
    {
        return is_null($this->testimonial->id) ? 'POST' : 'PUT';
    }
    
}
