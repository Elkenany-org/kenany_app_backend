<?php 

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Support\Str;

class SliderFilter extends ModelFilter
{
    
    public function stringUpperToLower(string $value): string
    {
        return Str::lower($value);
    }

    public function title($search)
    {
        if (isStringEnglishLetters($search)) {
            return  $this->whereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(title, '$.en'))) LIKE ?", ["%{$this->stringUpperToLower($search)}%"]);
        }
    }

    public function createdAt($date){
        return $this->whereDate('created_at' , $date); 
    }

}
