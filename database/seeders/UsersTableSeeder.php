<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create a user account
        
        User::factory()->create([
            'name' => 'test account',
            'email' => 'test@legitcar.com',
            'password' => bcrypt('password'),
        ]);
    }
}
