<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class AdminTableSeeder extends Seeder
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
              'user' => 'admin',
              'passwd' => md5('admin123'),
                'uname' => '管理员',
                'email' => '464504733@qq.com',
                'auth_id' => 3,
                'reg_time' => time(),
                'log_time' => time(),
                'status' => 1
            ],
        ];
        DB::table('admin')->insert($data);
    }
}
