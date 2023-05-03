<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // team-meeting group
        DB::table('companies')->insert([
            'company_name' =>   'SrhDP',
            'company_owner' => 'SrhDP',
            'address' => 'Phnom Penh',
            'email' => 'sout.rahim@gmail.com',
            'phone' =>  '011362283',
            'website_url' => 'www.srhdp.com',
        ]);

        DB::table('branches')->insert([
            'branch_name' =>   'Phnom Penh',
            'address' => 'Phnom Penh',
            'phone' => 'sout.rahim@gmail.com',
            'late' =>  '11.553027142673736',
            'long' => '104.92485105766755',
        ]);
    }
}
