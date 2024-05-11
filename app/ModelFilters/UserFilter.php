<?php 

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Support\Str;

class UserFilter extends ModelFilter
{
    
    public function stringUpperToLower(string $value): string
    {
        return Str::lower($value);
    }

    public function name($search)
    {
        if (isStringEnglishLetters($search)) {
            return  $this->whereRaw("LOWER(name) LIKE ?", ["%{$this->stringUpperToLower($search)}%"])
                    ->orWhere('phone' , 'LIKE' ,  $search)
                    ->orWhere('email' , 'LIKE' , $search);
        }
    }

}
