<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name'=>'admin']);
        $employee = Role::create(['name'=>'employee']);
        $marketer = Role::create(['name'=>'marketer']);

        $adminPermissions = ['approve-marketers','create-coupon','delete-coupon','create-blog','edit-blog','delete-blog'];
        $employeePermissions =['create-blog','edit-blog','delete-blog'];
        $marketerPermissions = ['create-coupon'];

        $permissions = ['approve-marketers','create-coupon','delete-coupon','create-blog','edit-blog','delete-blog'];

        foreach($permissions as $permission){
            Permission::create(['name'=>$permission]);
        }

        foreach($adminPermissions as $permission){
            $admin->givePermissionTo($permission);
        }

        foreach($employeePermissions as $permission){
            $employee->givePermissionTo($permission);
        }

        foreach($marketerPermissions as $permission){
            $marketer->givePermissionTo($permission);
        }
    }
}
