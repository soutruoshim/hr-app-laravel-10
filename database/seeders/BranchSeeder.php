<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('branches')->insert([
            'branch_name' => "admin",
            'branch_head' => "web",
            'address'=> "",
            'phone'=>"011362283",
            'late'=>"11.553224183398559",
            'long'=>'104.92498536147703',
            'status'=> 'active'
        ]);
    }
}
