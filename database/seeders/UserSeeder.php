<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            'role_name' => "admin",
            'is_active' => 1,
        ]);
        DB::table('roles')->insert([
            'role_name' => "sale",
            'is_active' => 1,
        ]);
        DB::table('users')->insert([
            'name' => "Savitha",
            'is_admin' => 1,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role_id' => 1, //admin
        ]);
        DB::table('users')->insert([
            'name' => "Vittal",
            'is_admin' => 1,
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('12345678'),
            'role_id' => 1, //admin
        ]);
        DB::table('users')->insert( [
            'name' => "Bharathi kannan",
            'is_admin' => 0,
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678'),
            'role_id' => 2
        ]);
        
    }
}
