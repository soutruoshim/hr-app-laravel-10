<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // company group
        DB::table('permissions')->insert([
            'name' => "company.setup",
            'group_name' => "company-setup",
            'guard_name' => "web"
        ]);

        DB::table('permissions')->insert([
            'name' => "company",
            'group_name' => "company-setup",
            'guard_name' => "web"
        ]);

        DB::table('permissions')->insert([
            'name' => "branch",
            'group_name' => "company-setup",
            'guard_name' => "web"
        ]);

        DB::table('permissions')->insert([
            'name' => "department",
            'group_name' => "company-setup",
            'guard_name' => "web"
        ]);

        DB::table('permissions')->insert([
            'name' => "position",
            'group_name' => "company-setup",
            'guard_name' => "web"
        ]);


        // shifttime group
        DB::table('permissions')->insert([
            'name' => "shifttime.management",
            'group_name' => "shifttime.management",
            'guard_name' => "web"
        ]);

        DB::table('permissions')->insert([
            'name' => "shifttime",
            'group_name' => "shifttime.management",
            'guard_name' => "web"
        ]);


        // employee group
        DB::table('permissions')->insert([
            'name' => "employee.management",
            'group_name' => "employee-management",
            'guard_name' => "web"
        ]);

        DB::table('permissions')->insert([
            'name' => "employees",
            'group_name' => "employee-management",
            'guard_name' => "web"
        ]);


        // leave group
        DB::table('permissions')->insert([
            'name' => "leave-management",
            'group_name' => "leave-management",
            'guard_name' => "web"
        ]);

        DB::table('permissions')->insert([
            'name' => "leave.type",
            'group_name' => "leave-management",
            'guard_name' => "web"
        ]);
        DB::table('permissions')->insert([
            'name' => "leave.request",
            'group_name' => "leave-management",
            'guard_name' => "web"
        ]);

        // attendance-management group
        DB::table('permissions')->insert([
            'name' => "attendance.management",
            'group_name' => "attendance-management",
            'guard_name' => "web"
        ]);
        DB::table('permissions')->insert([
            'name' => "attendance",
            'group_name' => "attendance-management",
            'guard_name' => "web"
        ]);

        // team-meeting group
        DB::table('permissions')->insert([
            'name' => "team-meeting.management",
            'group_name' => "team-meeting-management",
            'guard_name' => "web"
        ]);
        DB::table('permissions')->insert([
            'name' => "team.meeting",
            'group_name' => "team-meeting-management",
            'guard_name' => "web"
        ]);


        // holiday-management group
        DB::table('permissions')->insert([
            'name' => "holiday.management",
            'group_name' => "holiday-management",
            'guard_name' => "web"
        ]);

        DB::table('permissions')->insert([
            'name' => "holiday",
            'group_name' => "holiday-management",
            'guard_name' => "web"
        ]);

        // notice-management group
        DB::table('permissions')->insert([
            'name' => "notice.management",
            'group_name' => "notice-management",
            'guard_name' => "web"
        ]);

        DB::table('permissions')->insert([
            'name' => "notice",
            'group_name' => "notice-management",
            'guard_name' => "web"
        ]);

        // content-management group
        DB::table('permissions')->insert([
            'name' => "content.management",
            'group_name' => "content-management",
            'guard_name' => "web"
        ]);

        DB::table('permissions')->insert([
            'name' => "content",
            'group_name' => "content-management",
            'guard_name' => "web"
        ]);

         // role-management group
        DB::table('permissions')->insert([
            'name' => "role.management",
            'group_name' => "role-management",
            'guard_name' => "web"
        ]);

        DB::table('permissions')->insert([
            'name' => "all.permission",
            'group_name' => "role-management",
            'guard_name' => "web"
        ]);
        DB::table('permissions')->insert([
            'name' => "all.roles",
            'group_name' => "role-management",
            'guard_name' => "web"
        ]);
        DB::table('permissions')->insert([
            'name' => "role.in.permission",
            'group_name' => "role-management",
            'guard_name' => "web"
        ]);
        DB::table('permissions')->insert([
            'name' => "all.role.permission",
            'group_name' => "role-management",
            'guard_name' => "web"
        ]);

         // notification-management group
         DB::table('permissions')->insert([
            'name' => "notification.management",
            'group_name' => "notification-management",
            'guard_name' => "web"
        ]);

        DB::table('permissions')->insert([
            'name' => "notification",
            'group_name' => "notification-management",
            'guard_name' => "web"
        ]);

    }
}
