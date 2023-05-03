<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array();
        $permissions = DB::table('permissions')->get();

        foreach($permissions as $key => $item){
            $data['role_id'] = 1;
            $data['permission_id'] = $item->id;

            DB::table('role_has_permissions')->insert($data);

            $role = Role::findById(1);
            //$role->givePermissionTo('category.menu');
            $role->givePermissionTo(Permission::findById($item->id));
        }
    }
}
