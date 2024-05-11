<?php

namespace App\Models;

use App\ModelFilters\ContactFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory , Filterable; 
   protected $guarded = [];

    public function modelFilter()
    {
        return $this->provideFilter(ContactFilter::class);
    }

    public function getCreatedAt(): string
    {
        return $this->created_at->format('Y-m-d');
    }
}
