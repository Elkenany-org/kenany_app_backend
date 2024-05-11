<?php

namespace App\ViewModels;

use App\Models\Company;
use App\Models\Port;
use App\Models\Ship;
use App\Models\ShipsProduct;
use Spatie\ViewModels\ViewModel;

class ShipViewModel extends ViewModel
{
    public $ports;
    public $products;
    public $companies;
    
    public function __construct(public ?Ship $ship = null)
    {
        $this->ship      = is_null($ship) ? new Ship(old()) : $ship;
        $this->ports     = Port::get();
        $this->products  = ShipsProduct::get();
        $this->companies = Company::get();
    }

    public function action(): string
    {
        return is_null($this->ship->id)
            ? route('admin.ship.store')
            : route('admin.ship.update', ['ship' => $this->ship->id]);
    }

    public function method(): string
    {
        return is_null($this->ship->id) ? 'POST' : 'PUT';
    }
    
}
