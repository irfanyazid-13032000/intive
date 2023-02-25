<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create new Stocks
    $stocks = [
        [
            'stock_name' => 'kayu',
            'stock_category' => 'mentah',
            'price' => 30000,
            'qty'=>10
        ],
        [
            'stock_name' => 'kapas',
            'stock_category' => 'mentah',
            'price' => 40000,
            'qty'=>20
        ],
        [
            'stock_name' => 'playstation 3',
            'stock_category' => 'jadi',
            'price' => 40300000,
            'qty'=>29
        ],
        [
            'stock_name' => 'bubur',
            'stock_category' => 'setengah-jadi',
            'price' => 11000,
            'qty'=>90
        ],
    ];

    DB::table('stocks')->insert($stocks);
    }
}
