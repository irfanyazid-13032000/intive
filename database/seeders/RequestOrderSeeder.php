<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RequestOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $requestOrder = [
            [
                'id' => 'fiwegf238dt',
                'buyer' => 'tono',
                'total_price' => 900000,
            ],
           
        ];
    
        DB::table('request_orders')->insert($requestOrder);
    }
}
