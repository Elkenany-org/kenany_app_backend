<?php

use App\Models\Setting;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

if (!function_exists('setting')) {
    function setting($value ,  $lang = null)
    {
      
        $lang     =  $lang == null ? app()->getLocale() : $lang;
        $settings = Cache::get('settings') == null ? 
                            Cache::rememberForever('settings', function (){
                                    return Setting::get();
                                })
                             : Cache::get('settings');
      
        if($settings != null){
            foreach($settings as $setting){
                if($setting->option == $value){
                    return $setting->getTranslation('value',$lang);
                }
            }
        }
        return '';
    }
}

if (!function_exists('gender')) {
    function gender()
    {
        return [
            'male'       => 'ذكر',
            'female'     => 'انثى',
        ];
    }
}

if (!function_exists('isStringEnglishLetters')) 
{
    function isStringEnglishLetters(string $string): bool
    {
        return ! preg_match('/[^A-Za-z0-9]/', $string);
    }
}

if (!function_exists('socialMedia')) {
    function socialMedia()
    {
       return [
            'facebook'      =>  setting('facebook','en'),
            'twitter'       =>  setting('twitter','en'),
            'instagram'     =>  setting('instagram','en') ,
            'linkedin'      =>  setting('linkedin','en') ,
            'youtube'       =>  setting('youtube','en') 
        ];
    }
}

if (!function_exists('showLink')) {
    function showLink(string $routeName)
    {
       return  Route::is("{$routeName}.*") ? 'show' : '';
    }
}

if (!function_exists('activeLink')) {
    function activeLink(string $routeName)
    {
       return  Route::is("{$routeName}.*") ? 'active' : '';
    }
}

if (!function_exists('activeSingleLink')) {
    function activeSingleLink(string $routeName)
    {
       return  Route::is("{$routeName}") ? 'active' : '';
    }
}

if (!function_exists('activeSingleLinkRequest')) {
    function activeSingleLinkRequest(string $routeName)
    {
       return  Request::is(app()->getLocale()."/{$routeName}") ? 'active' : '';
    }
}

if (!function_exists('getLastKeyRoute')) {
    function getLastKeyRoute(string $routeName)
    {
       $array = explode('.',$routeName);
       return end($array);
    }
}


