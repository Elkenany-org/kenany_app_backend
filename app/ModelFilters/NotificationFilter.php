<?php 

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Support\Str;

class NotificationFilter extends ModelFilter
{
    
    public function stringUpperToLower(string $value): string
    {
        return Str::lower($value);
    }

    public function title($search)
    {
        //  if (isStringEnglishLetters($search)) {
        //     return  $this->whereRaw("LOWER(username) LIKE ?", ["%{$this->stringUpperToLower($search)}%"]);
        // }
        return  $this->whereRaw("data LIKE ?", ["%{$search}%"]);
    }

    public function createdAt($date){
        return $this->whereDate('created_at' , $date); 
    }

}
