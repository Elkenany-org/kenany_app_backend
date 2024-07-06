<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuideSubSection extends Model
{
    use HasFactory; 

    protected $guarded = [];
    protected $table = 'guide_sub_sections';
}
