<?php

namespace App\Models;

use App\ModelFilters\CompanyFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;


class Company extends Model 
{
    use HasFactory , HasTranslations , SoftDeletes , Filterable ;
    protected $guarded = [];
    protected $table = 'companies';
    public $translatable = ['name','address','short_desc'];

    public function modelFilter()
    {
        return $this->provideFilter(CompanyFilter::class);
    }

    public function getAvatar()
    {
        return  $this->getFirstMediaUrl('categories') == null ? '' : $this->getFirstMediaUrl('categories','webp');
    }

    public function getCreatedAt(): string
    {
        return $this->created_at->format('Y-m-d');
    }

    public function city()
    {
        return $this->belongsTo(City::class , 'city_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class , 'country_id');
    }

    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this->addMediaConversion('webp')
    //         ->format('webp') // Set the format to WebP
    //         ->quality(80)
    //         ->optimize() // Optional: Perform image optimization during conversion
    //         ->performOnCollections('companies')
    //         ->nonQueued();
    // }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {   
        if(auth('admin')->user()->country_id != null){
            static::addGlobalScope('countryDetect', function (Builder $builder) {
                $builder->where('country_id', auth('admin')->user()->country_id);
            });
        }
    }
    
}
