<?php 

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Support\Str;

class ContactFilter extends ModelFilter
{
    
    public function stringUpperToLower(string $value): string
    {
        return Str::lower($value);
    }

    public function name($search)
    {
        if (isStringEnglishLetters($search)) {
            return  $this->whereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(title, '$.en'))) LIKE ?", ["%{$this->stringUpperToLower($search)}%"])
                    ->orWhere('phone' , $search)
                    ->orWhere('email' , $search);
        }
    }

}
