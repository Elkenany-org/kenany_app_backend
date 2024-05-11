<?php

namespace App\ViewModels;

use App\Models\Category;
use Spatie\ViewModels\ViewModel;

class CategoryViewModel extends ViewModel
{
     
    public function __construct(public ?Category $category = null)
    {
        $this->category = is_null($category) ? new Category(old()) : $category;
    }

    public function action(): string
    {
        return is_null($this->category->id)
            ? route('admin.category.store')
            : route('admin.category.update', ['category' => $this->category->id]);
    }

    public function method(): string
    {
        return is_null($this->category->id) ? 'POST' : 'PUT';
    }
    
}
