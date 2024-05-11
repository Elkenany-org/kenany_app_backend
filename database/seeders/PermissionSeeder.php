<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        DB::table('model_has_roles')->delete();
        DB::table('model_has_permissions')->delete();
        
        app()['cache']->forget('spatie.permission.cache');
        
        $adminRole  =  Role::create(['guard_name' => 'admin','name' => 'admin']);
        $countryRole  =  Role::create(['guard_name' => 'admin','name' => 'admin_country']);
        
        $adminPermissions = [
            
            // admins
            'admins.read',
            'admins.create',
            'admins.edit',
            'admins.delete',
            
            // roles
            'roles.read',
            'roles.create',
            'roles.edit',
            'roles.delete',

            //guides
            'guides.read',
            'guides.create',
            'guides.edit',
            'guides.delete',
            
            //ports
            'ports.read',
            'ports.create',
            'ports.edit',
            'ports.delete',

            //product_ships
            'product_ships.read',
            'product_ships.create',
            'product_ships.edit',
            'product_ships.delete',

            //ship_movements
            'ship_movements.read',
            'ship_movements.create',
            'ship_movements.edit',
            'ship_movements.delete',

            //packages
            'notifications.read',
            'notifications.create',
            'notifications.delete',

            //contact
            'contact.read',
            'contact.delete',

            //settings
            'setting.edit',
           
        ];

        $adminCountryPermission = [
            //admin-country
            'admin_country.create',
            'admin_country.edit',
            'admin_country.edit',
            'admin_country.delete',
        ];

        foreach (\array_merge($adminPermissions , $adminCountryPermission) as $permission) {
            Permission::firstOrCreate(['guard_name' => 'admin','name' => $permission]);
        }
        
        $adminRole->givePermissionTo($adminPermissions);
        $countryRole->givePermissionTo($adminCountryPermission);
        
        $admin = Admin::find(1);
        if($admin){   
            $admin->assignRole('admin');    
        }
        
        $adminCountry = Admin::find(2);
        if($adminCountry){   
            $adminCountry->assignRole('admin_country');    
        }
        
    }
    
}
