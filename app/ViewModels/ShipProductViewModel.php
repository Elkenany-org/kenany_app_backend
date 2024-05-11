<?php

namespace App\ViewModels;

use App\Models\ShipsProduct;
use Spatie\ViewModels\ViewModel;

class ShipProductViewModel extends ViewModel
{
     
    public function __construct(public ?ShipsProduct $shipsProduct = null)
    {
        $this->shipsProduct = is_null($shipsProduct) ? new ShipsProduct(old()) : $shipsProduct;
    }

    public function action(): string
    {
        return is_null($this->shipsProduct->id)
            ? route('admin.shipsProduct.store')
            : route('admin.shipsProduct.update', ['shipsProduct' => $this->shipsProduct->id]);
    }

    public function method(): string
    {
        return is_null($this->shipsProduct->id) ? 'POST' : 'PUT';
    }
    
}
