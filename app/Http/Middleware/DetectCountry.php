<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;
use Symfony\Component\HttpFoundation\Response;


class DetectCountry
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        // EG  = 41.33.216.4; مصر
        // KW  = 37.36.146.76; الكويت
        // SA  = 94.97.188.129; السعودية
        // AE  = 86.96.201.134; الامارات

        $user = Auth::guard('admin')->user(); 
        $ip = $request->ip() == '127.0.0.1'  ? '41.33.216.4' : $request->ip() ;
        if ($position = Location::get($ip)) {
           return  'Your Country Code is : ' .$position->countryCode;
        } else {
            return response()->json('Sorry Country Not Detected Plz Reload Page Again');
        }
        
        return $next($request);
    }
}
