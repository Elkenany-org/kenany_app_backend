<?php

namespace App\Models;

use App\ModelFilters\CategoryFilter;
use App\Traits\HandleUploadFile;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;


class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia , HandleUploadFile , HasTranslations , SoftDeletes , Filterable;
    protected $guarded = [];
    public $translatable = ['title'];

    public function modelFilter()
    {
        return $this->provideFilter(CategoryFilter::class);
    }

    public function getAvatar()
    {
        return  $this->getFirstMediaUrl('categories') == null ? '' : $this->getFirstMediaUrl('categories','webp');
    }

    public function getCreatedAt(): string
    {
        return $this->created_at->format('Y-m-d');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp') // Set the format to WebP
            ->quality(80)
            ->optimize() // Optional: Perform image optimization during conversion
            ->performOnCollections('categories')
            ->nonQueued();
    }
    
    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
    
}
