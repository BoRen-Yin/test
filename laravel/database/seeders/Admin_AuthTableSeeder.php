<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Admin_AuthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'auth_name'=>'普通管理员'
            ],
            [
                'auth_name'=>'数据录入员'
            ],
            [
                'auth_name'=>'超级管理员'
            ],
        ];
        DB::table('admin_auth')->insert($data);
    }
}
