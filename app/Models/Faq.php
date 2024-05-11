<?php

namespace App\Models;

use App\ModelFilters\FaqFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Faq extends Model
{
    use HasFactory  , HasTranslations , SoftDeletes , Filterable;
    protected $guarded = [];
    public $translatable = ['question' , 'answer'];

    public function modelFilter()
    {
        return $this->provideFilter(FaqFilter::class);
    }

    public function getCreatedAt(): string
    {
        return $this->created_at->format('Y-m-d');
    }
    
}
