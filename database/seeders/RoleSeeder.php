<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'name' => "admin",
            'guard_name' => "web"
        ]);

        DB::table('roles')->insert([
            'name' => "employee",
            'guard_name' => "web"
        ]);

        DB::table('roles')->insert([
            'name' => "supervisor",
            'guard_name' => "web"
        ]);

        DB::table('roles')->insert([
            'name' => "trainer",
            'guard_name' => "web"
        ]);

        DB::table('roles')->insert([
            'name' => "hr",
            'guard_name' => "web"
        ]);
    }
}
