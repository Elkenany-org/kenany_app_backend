<?php

namespace App\Models;

use App\ModelFilters\ShipsProductFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class ShipsProduct extends Model
{
    use HasFactory , HasTranslations , Filterable , SoftDeletes;
    protected $guarded = [];
    protected $table = 'ships_products';
    public $translatable = ['name'];

    public function modelFilter()
    {
        return $this->provideFilter(ShipsProductFilter::class);
    }
    
    public function getCreatedAt(): string
    {
        return $this->created_at->format('Y-m-d');
    }
    
}
