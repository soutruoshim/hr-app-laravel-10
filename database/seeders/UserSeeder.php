<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use DB;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $user = DB::table('users')->insert([
        //     'name' => "admin",
        //     'username' => "admin",
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('12345678'),
        //     'role' => 'admin'
        // ]);
        $user = User::create(
            [
                'name' => "admin",
                'username' => "admin",
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin'
            ]
        );
        $user->assignRole('admin');

        Employee::create([
            'user_id'=>$user->id,
            'branch_id'=>1
        ]);

    }
}
