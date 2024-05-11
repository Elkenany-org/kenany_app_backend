<?php

namespace App\Models;

use App\ModelFilters\TestimonialFilter;
use App\Traits\HandleUploadFile;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
 
class Testimonial extends Model implements HasMedia
{
    use HasFactory , Filterable , SoftDeletes , InteractsWithMedia , HandleUploadFile;

    protected $guarded = [];
    
    public function modelFilter()
    {
        return $this->provideFilter(TestimonialFilter::class);
    }

    public function getAvatar()
    {
        return  $this->getFirstMediaUrl('testimonials') == null ? '' : $this->getFirstMediaUrl('testimonials','webp');
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
            ->performOnCollections('sliders')
            ->nonQueued();
    }
    
}
