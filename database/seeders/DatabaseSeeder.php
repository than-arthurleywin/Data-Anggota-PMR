<?php

namespace Database\Seeders;

use App\Models\Angkatans;
use App\Models\Jurusan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        User::create([
            'name' => 'admin',
            'email'=>'admin@gmail.com',
            'password'=>'coba@123'
        ]);
    }
}
