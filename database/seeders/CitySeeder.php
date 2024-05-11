<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::create([
            'name' => ['en' => 'city 1' , 'ar' => 'مدينة 1']
        ]);

        City::create([
            'name' => ['en' => 'city 2' , 'ar' => 'مدينة 2']
        ]);

        City::create([
            'name' => ['en' => 'city 3' , 'ar' => 'مدينة 3']
        ]);
    }
    
}
