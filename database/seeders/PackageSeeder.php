<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Package::create([
            'name'   => ['en' => 'one month' , 'ar' => 'شهر'] ,
            'period' => 1,
            'price'  => 1200 , 
        ]);
        Package::create([
            'name'   => ['en' => 'two month' , 'ar' => 'شهرين'] ,
            'period' => 2,
            'price'  => 2200 , 
        ]);
        Package::create([
            'name'   => ['en' => 'three month' , 'ar' => 'ثلاثة اشهر'] ,
            'period' => 3,
            'price'  => 3000 , 
        ]);
    }
    
}
