<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            [
                'first_name' => 'Semere',
                'middle_name' => 'Mulatu',
                'last_name' => 'Hailu',
                'dob' => '2000-06-20',
                'sex' => 'M',
                'phone_number' => '0987654321',
                'email' => 'a@gmail.com',
                'picture' => 'Image1',
                'address_id' => '1',
                'nationality' => 'Ethiopian',
                'role' => 'admin',
                'password' => '$2y$10$WqHlqTuUaMgkrXEDK49H/.OaH9rJHH676MfF/g76n2YU9ksKy3hVi',
                'created_at' => now(),
                'updated_at' => now(),
                // 'user_id' => null,
            ],

            [
                'first_name' => 'Marta',
                'middle_name' => 'Yared',
                'last_name' => 'Habtamu',
                'dob' => '1993-06-04',
                'sex' => 'F',
                'phone_number' => '0984654321',
                'email' => 'l@gmail.com',
                'picture' => 'Image2',
                'address_id' => '2',
                'nationality' => 'Ethiopian',
                'role' => 'loan_officer',
                'password' => '$2y$10$WqHlqTuUaMgkrXEDK49H/.OaH9rJHH676MfF/g76n2YU9ksKy3hVi',
                'created_at' => now(),
                'updated_at' => now(),
                // 'user_id' => '1',
            ],

            [
                'first_name' => 'Ibrahim',
                'middle_name' => 'Mustaf',
                'last_name' => 'Amir',
                'dob' => '1995-01-23',
                'sex' => 'M',
                'phone_number' => '0987654421',
                'email' => 'e@gmail.com',
                'picture' => 'Image3',
                'address_id' => '3',
                'nationality' => 'Ethiopian',
                'role' => 'encoder',
                'password' => '$2y$10$WqHlqTuUaMgkrXEDK49H/.OaH9rJHH676MfF/g76n2YU9ksKy3hVi',
                'created_at' => now(),
                'updated_at' => now(),
                // 'user_id' => '1',
            ],

            [
                'first_name' => 'Haymanot',
                'middle_name' => 'Dagem',
                'last_name' => 'Markos',
                'dob' => '1991-06-20',
                'sex' => 'F',
                'phone_number' => '0934654321',
                'email' => 'm@gmail.com',
                'picture' => 'Image4',
                'address_id' => '4',
                'nationality' => 'Ethiopian',
                'role' => 'manager',
                'password' => '$2y$10$WqHlqTuUaMgkrXEDK49H/.OaH9rJHH676MfF/g76n2YU9ksKy3hVi',
                'created_at' => now(),
                'updated_at' => now(),
                // 'user_id' => '1',
            ],
            
        ]);
    }
}