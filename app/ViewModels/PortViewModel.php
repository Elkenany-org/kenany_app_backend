<?php

namespace App\ViewModels;

use App\Models\Port;
use Spatie\ViewModels\ViewModel;

class PortViewModel extends ViewModel
{
     
    public function __construct(public ?Port $port = null)
    {
        $this->port = is_null($port) ? new Port(old()) : $port;
    }

    public function action(): string
    {
        return is_null($this->port->id)
            ? route('admin.port.store')
            : route('admin.port.update', ['port' => $this->port->id]);
    }

    public function method(): string
    {
        return is_null($this->port->id) ? 'POST' : 'PUT';
    }
    
}
