<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         
        DB::table('configs')->insert(
            [
                "bank_name" => 'State Bank',
                "account_holder_name" => 'Alan',
                "account_number" => "0000000000000000021",
                "branch_name" => "chennai",
                "ifsc_code" => "00000IFSC"
            ],   
        );
        $this->call([
            UserSeeder::class,
            SateSeeder::class,
        ]);
    }
}
