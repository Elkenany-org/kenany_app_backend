<?php 

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Support\Str;

class TestimonialFilter extends ModelFilter
{
    
    public function stringUpperToLower(string $value): string
    {
        return Str::lower($value);
    }

    public function name($search)
    {
        if (isStringEnglishLetters($search)) {
            return  $this->whereRaw("LOWER(name) LIKE ?", ["%{$this->stringUpperToLower($search)}%"])
                    ->orWhere('title' , 'LIKE' ,  $search);
        }
    }

}
