<?php

namespace App\ViewModels;

use App\Models\Category;
use App\Models\Product;
use Spatie\ViewModels\ViewModel;

class ProductViewModel extends ViewModel
{
    public $categories;
    public function __construct(public ?Product $product = null)
    {
        $this->product = is_null($product) ? new Product(old()) : $product;
        $this->categories = Category::get();
    }

    public function action(): string
    {
        return is_null($this->product->id)
            ? route('admin.product.store')
            : route('admin.product.update', ['product' => $this->product->id]);
    }

    public function method(): string
    {
        return is_null($this->product->id) ? 'POST' : 'PUT';
    }
    
}
