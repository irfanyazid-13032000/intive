<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = [
            [
                'request_order_id' => 'fiwegf238dt',
                'stock_id' => '1',
                'qty' => 90,
            ],
           
        ];
    
        DB::table('order')->insert($order);
    }
}
