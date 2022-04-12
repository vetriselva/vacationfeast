<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['state_name' => "Andaman and Nicobar (UT)",'is_active' => 1,],
            ['state_name' => "Andhra Pradesh",'is_active' => 1,],
            ['state_name' => "Arunachal Pradesh",'is_active' => 1,],
            ['state_name' => "Assam",'is_active' => 1,],
            ['state_name' => "Chandigarh (UT)",'is_active' => 1,],
            ['state_name' => "Chhattisgarh",'is_active' => 1,],
            ['state_name' => "Dadra and Nagar Haveli (UT)",'is_active' => 1,],
            ['state_name' => "Daman and Diu (UT)",'is_active' => 1,],
            ['state_name' => "Delhi",'is_active' => 1,],
            ['state_name' => "Goa",'is_active' => 1,],
            ['state_name' => "Gujarat",'is_active' => 1,],
            ['state_name' => "Haryana",'is_active' => 1,],
            ['state_name' => "Himachal Pradesh",'is_active' => 1,],
            ['state_name' => "Jammu and Kashmir",'is_active' => 1,],
            ['state_name' => "Jharkhand",'is_active' => 1,],
            ['state_name' => "Karnataka",'is_active' => 1,],
            ['state_name' => "Kerala",'is_active' => 1,],
            ['state_name' => "Lakshadweep (UT)",'is_active' => 1,],
            ['state_name' => "Madhya Pradesh",'is_active' => 1,],
            ['state_name' => "Maharashtra",'is_active' => 1,],
            ['state_name' => "Manipur",'is_active' => 1,],
            ['state_name' => "Meghalaya",'is_active' => 1,],
            ['state_name' => "Mizoram",'is_active' => 1,],
            ['state_name' => "Nagaland",'is_active' => 1,],
            ['state_name' => "Orissa",'is_active' => 1,],
            ['state_name' => "Puducherry (UT)",'is_active' => 1,],
            ['state_name' => "Punjab",'is_active' => 1,],
            ['state_name' => "Rajasthan",'is_active' => 1,],
            ['state_name' => "Sikkim",'is_active' => 1,],
            ['state_name' => "Tamil Nadu",'is_active' => 1,],
            ['state_name' => "Telangana",'is_active' => 1,],
            ['state_name' => "Tripura",'is_active' => 1,],
            ['state_name' => "Uttar Pradesh",'is_active' => 1,],
            ['state_name' => "Uttarakhand",'is_active' => 1,],
            ['state_name' => "West Bengal",'is_active' => 1,],
        ];
        DB::table('states')->insert($data );
    }
}
