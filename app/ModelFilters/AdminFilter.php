<?php 

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Support\Str;

class AdminFilter extends ModelFilter
{
    
    public function stringUpperToLower(string $value): string
    {
        return Str::lower($value);
    }

    public function title($search)
    {
        if (isStringEnglishLetters($search)) {
            return  $this->whereRaw("LOWER(name) LIKE ?", ["%{$this->stringUpperToLower($search)}%"])
                    ->orWhere('email' , 'LIKE' , $search);
        }
        return  $this->whereRaw("name LIKE ?", ["%{$search}%"]);
    }

}
