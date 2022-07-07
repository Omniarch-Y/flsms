<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
           [ 
                'hno' => '201',
                'woreda' => '12',
                'subCity' => 'Arada',
                'city' => 'Addis Ababa',
                'country' => 'Ethiopia',
                'created_at' => now(),
                'updated_at' => now(),
           ],

           [ 
                'hno' => '134',
                'woreda' => '5',
                'subCity' => 'wee',
                'city' => 'Adama',
                'country' => 'Ethiopia',
                'created_at' => now(),
                'updated_at' => now(),
           ],

           [ 
                'hno' => '1',
                'woreda' => '7',
                'subCity' => 'lol',
                'city' => 'Hawasa',
                'country' => 'Ethiopia',
                'created_at' => now(),
                'updated_at' => now(),
           ],

           [ 
                'hno' => '86',
                'woreda' => '9',
                'subCity' => 'wee',
                'city' => 'Bahirdar',
                'country' => 'Ethiopia',
                'created_at' => now(),
                'updated_at' => now(),
           ],
        ]);
    }
}