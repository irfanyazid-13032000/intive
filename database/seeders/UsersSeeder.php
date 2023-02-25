<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
  
    // Create new users
    $users = [
        [
            'name' => 'rudi',
            'email' => 'rudi@gmail.com',
            'password' => Hash::make('haduh'),
        ],
        [
            'name' => 'tono',
            'email' => 'tono@gmail.com',
            'password' => Hash::make('password'),
        ],
    ];

    DB::table('users')->insert($users);
    }
}
