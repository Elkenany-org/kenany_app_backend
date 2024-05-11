<?php

namespace App\Models;

use App\ModelFilters\CountryFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;


class Country extends Model
{
    use HasFactory , SoftDeletes , Filterable , HasTranslations;
    protected $guarded = [];
    protected $table = 'countries';
    public $translatable = ['name'];

    public function modelFilter()
    {
        return $this->provideFilter(CountryFilter::class);
    }

    public function getCreatedAt(): string
    {
        return $this->created_at->format('Y-m-d');
    }

    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this->addMediaConversion('webp')
    //         ->format('webp') // Set the format to WebP
    //         ->quality(80)
    //         ->optimize() // Optional: Perform image optimization during conversion
    //         ->performOnCollections('countries')
    //         ->nonQueued();
    // }
    
}
