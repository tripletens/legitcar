<?php

namespace Database\Seeders;

use Database\Factories\KeysFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate live keys
        KeysFactory::new()->count(1)->create(['type' => 'live']);

        // Generate test keys
        KeysFactory::new()->count(1)->create(['type' => 'test']);
    }
}
