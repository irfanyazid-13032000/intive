<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Users::create([
            "name" => "Hardik Savani",
            "email" => "admin@gmail.com",
            "password" => bcrypt("123456")
        ]);
        Users::create([
            "name" => "dono",
            "email" => "dono@gmail.com",
            "password" => bcrypt("123456")
        ]);
        Users::create([
            "name" => "yudi",
            "email" => "yudi@gmail.com",
            "password" => bcrypt("123456")
        ]);

        $this->call([
            UsersSeeder::class,
            StockSeeder::class,
            RequestOrderSeeder::class,
            OrderSeeder::class
        ]);




    }
}
