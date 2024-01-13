<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
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
            'user_name'=>'Yamazaki Miki',
            'email'=>'yamazakimiki0404@gmail.com',
            'password'=>'1989miki',

        ];
        DB::table('users')->insert($param);
        $param = [
            'user_name'=>'Yamazaki Takeshi',
            'email'=>'ttzckzisr@gmail.com',
            'password'=>'1019',
        ];
        DB::table('users')->insert($param);
        $param = [
            'user_name'=>'Nakayama Emiko',
            'email'=>'emikon@ezweb.ne.jp',
            'password'=>'melshiel',
        ];
        DB::table('users')->insert($param);
    }
}
