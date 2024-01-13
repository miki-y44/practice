<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesTableSeeder extends Seeder
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
            'product_id'=>2,
        ];
        DB::table('sales')->insert($param);

        $param = [
            'product_id'=>5,
        ];
        DB::table('sales')->insert($param);

        $param = [
            'product_id'=>9,
        ];
        DB::table('sales')->insert($param);
    }
}
