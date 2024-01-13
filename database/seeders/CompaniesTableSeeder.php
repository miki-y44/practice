<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
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
            'company_name'=>'コカ・コーラ',
            'street_address'=>'東京都港区赤坂9-7-1',
            'representative_name'=>'萩野',
        ];
        DB::table('companies')->insert($param);
        
        
        $param = [
            'company_name'=>'オリオンビール',
            'street_address'=>'沖縄県豊見城市字豊崎1-411',
            'representative_name'=>'坂田',
        ];
        DB::table('companies')->insert($param);

        $param = [
            'company_name'=>'伊藤園',
            'street_address'=>'東京都渋谷区本町3-47-10',
            'representative_name'=>'長嶋',
        ];
        DB::table('companies')->insert($param);

        $param = [
            'company_name'=>'ダイドードリンコ',
            'street_address'=>'大阪府大阪市北区中之島2-2-7',
            'representative_name'=>'中川',
        ];
        DB::table('companies')->insert($param);

        $param = [
            'company_name'=>'アサヒ飲料',
            'street_address'=>'東京都墨田区吾妻橋1-23-1',
            'representative_name'=>'飯田',
        ];
        DB::table('companies')->insert($param);

        $param = [
            'company_name'=>'キリンビバレッジ',
            'street_address'=>'東京都中野区4-10-2',
            'representative_name'=>'相田',
        ];
        DB::table('companies')->insert($param);

        $param = [
            'company_name'=>'小岩井',
            'street_address'=>'東京都千代田区丸の内2-5-2',
            'representative_name'=>'小宮',
        ];
        DB::table('companies')->insert($param);

        $param = [
            'company_name'=>'明治meiji',
            'street_address'=>'東京都中央区京橋2-4-16',
            'representative_name'=>'豊橋',
        ];
        DB::table('companies')->insert($param);

        $param = [
            'company_name'=>'森永乳業',
            'street_address'=>'東京都港区芝5-33-1',
            'representative_name'=>'原',
        ];
        DB::table('companies')->insert($param);

        $param = [
            'company_name'=>'サントリー',
            'street_address'=>'東京都港区台場2-3-3',
            'representative_name'=>'山根',
        ];
        DB::table('companies')->insert($param);

        $param = [
            'company_name'=>'サッポロ',
            'street_address'=>'東京都渋谷区恵比寿4-20-1',
            'representative_name'=>'上野',
        ];
        DB::table('companies')->insert($param);

        $param = [
            'company_name'=>'ヤクルト',
            'street_address'=>'東京都港区海岸1-10-30',
            'representative_name'=>'佐島',
        ];
        DB::table('companies')->insert($param);

        $param = [
            'company_name'=>'カゴメ',
            'street_address'=>'東京都中央区日本橋浜町3-21-1',
            'representative_name'=>'横山',
        ];
        DB::table('companies')->insert($param);



    }
}
