<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CompaniesSeeder extends Seeder
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
            'company_name' => 'コカ・コーラ',
            'street_address' => null,
            'representative_name' => null
        ];

        DB::table('companies')->insert($param);

        $param = [
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'company_name' => 'STARBUCKS',
            'street_address' => null,
            'representative_name' => null
        ];

        DB::table('companies')->insert($param);

        $param = [
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'company_name' => 'アサヒ飲料',
            'street_address' => null,
            'representative_name' => null
        ];

        DB::table('companies')->insert($param);

    }
}
