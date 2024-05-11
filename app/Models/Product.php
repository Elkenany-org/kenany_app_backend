<?php

namespace App\Models;

use App\ModelFilters\ProductFilter;
use App\Traits\HandleUploadFile;
use Cviebrock\EloquentSluggable\Sluggable;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia , HandleUploadFile , HasTranslations , Filterable , SoftDeletes , Sluggable;
    protected $guarded = [];
    public $translatable = ['title' , 'content'];
    
    public function getAvatar()
    {
        return  $this->getFirstMediaUrl('products-main') == null ? '' : $this->getFirstMediaUrl('products-main','webp');
    }

    public function getImages()
    {
        $images = [];
        
        foreach($this->getMedia('products') as $image){
            if($image->mime_type != 'image/svg+xml'){
                $images[] = [ 'id' => $image->id , 'url' => $image->geturl('webp')]; 
            }else{
                $images[] = [ 'id' => $image->id , 'url' => $image->geturl()]; 
            }
        }
        return  $images;
    }

    public function modelFilter()
    {
        return $this->provideFilter(ProductFilter::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCreatedAt(): string
    {
        return $this->created_at->format('Y-m-d');
    }

    public function getPrice()
    {
        return number_format($this->price);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp') // Set the format to WebP
            ->quality(80)
            ->optimize() // Optional: Perform image optimization during conversion
            ->performOnCollections('products-main')
            ->nonQueued();

        $this->addMediaConversion('webp')
            ->format('webp') // Set the format to WebP
            ->quality(80)
            ->optimize() // Optional: Perform image optimization during conversion
            ->performOnCollections('products')
            ->nonQueued();
    }
}
