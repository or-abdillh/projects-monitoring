<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $superAdminRole = Role::create(['name' => 'superadmin']);
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);
        
        // Permission 
        $adminPermissions = [
            'view project', 'edit project', 'create project', 
            'view task', 'edit task', 'create task'
        ];
        
        foreach($adminPermissions as $permission ) {
            $adminRole->givePermissionTo($permission);
        }

        $superAdminPermissions = [
            'view project', 'edit project', 'create project', 'delete project',
            'view task', 'edit task', 'create task', 'delete task'
        ];

        foreach($superAdminPermissions as $permission ) {
            $superAdminRole->givePermissionTo($permission);
        }

        $userRole->givePermissionTo('view project');
    }
}
