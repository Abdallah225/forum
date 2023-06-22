<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = array(
            array('id' => '1','name' => fake()->name(),'email' => 'login@12345','email_verified_at' => now(),'password' => Hash::make('login@12345'),'created_at' => now(),'updated_at' => now()),
            
        );
        DB::table('users')->insert($users);
    }
}
