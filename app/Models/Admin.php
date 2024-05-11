<?php

namespace App\Models;

use App\ModelFilters\AdminFilter;
use App\Traits\HandleUploadFile;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable implements HasMedia
{
    use HasFactory , HasRoles , Filterable , InteractsWithMedia , HandleUploadFile;
    protected $guarded = [];

    public function getAvatar()
    {
        return  $this->getFirstMediaUrl('admins') == null ? asset('dashboard/assets/img/profile-l.png') : $this->getFirstMediaUrl('admins','webp');
    }

    public function modelFilter()
    {
        return $this->provideFilter(AdminFilter::class);
    }
    
    public function getCreatedAt(): string
    {
        return $this->created_at->format('Y-m-d');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
    
}
