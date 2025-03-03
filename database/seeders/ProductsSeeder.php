<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'company_id' => 1,
            'product_name' => 'コカコーラ',
            'price' => 180,
            'stock' => 10,
            'comment' => 'テスト',
            'img_path' => null
        ];

        DB::table('products')->insert($param);

        $param = [
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'company_id' => 2,
            'product_name' => 'ブラックコーヒー',
            'price' => 150,
            'stock' => 14,
            'comment' => 'テスト',
            'img_path' => null
        ];

        DB::table('products')->insert($param);

        $param = [
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'company_id' => 3,
            'product_name' => 'サイダー',
            'price' => 130,
            'stock' => 20,
            'comment' => 'テスト',
            'img_path' => null
        ];

        DB::table('products')->insert($param);


    }
}
