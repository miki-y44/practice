<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
 
        $param = [
            'company_id'=>1,
            'product_name'=>'オリオンビール',
            'price'=>220,
            'stock'=>10,
            'img_path'=>'orion.img',
        ];
        DB::table('products')->insert($param);

        $param = [
            'company_id'=>2,
            'product_name'=>'おーいお茶',
            'price'=>160,
            'stock'=>12,
            'img_path'=>'ooiotya.img',
        ];
        DB::table('products')->insert($param);


        $param = [
            'company_id'=>3,
            'product_name'=>'DEMITASSE',
            'price'=>120,
            'stock'=>15,
            'img_path'=>'demitasse.img',
        ];
        DB::table('products')->insert($param);


    }
}
