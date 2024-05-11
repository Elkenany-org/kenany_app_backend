<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
    */
    public function run(): void
    {
        DB::table('admins')->delete();
        
        Admin::firstOrCreate([
            'email'    => 'kenany@admin.com',
        ],[
            'name'      => 'kenany',
            'email'     => 'kenany@admin.com',
            'country_id' => 1,
            'password'  => '12345678',
        ]);

        Admin::firstOrCreate([
             'email'    => 'country@admin.com',
        ],[
            'name'     => 'country admin',
            'email'    => 'country@admin.com',
            'password' => '12345678',
        ]);
    }

}
