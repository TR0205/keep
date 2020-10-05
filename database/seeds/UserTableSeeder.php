<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => '柳沢真由',
            'email' => 'mayu8180@eghvc.ezy.zrd',
            'password' => Hash::make('password123'),
            ],[
            'name' => '菅辰男',
            'email' => 'okan@yfbbge.qmi',
            'password' => Hash::make('password123'),
            ],[
            'name' => '吉崎穂乃佳',
            'email' => 'honoka34745@fedyyocgso.uwr',
            'password' => Hash::make('password123'),
            ],[
            'name' => '中谷悠花',
            'email' => 'yuuka865@fmcrlxtjw.tsi',
            'password' => Hash::make('password123'),
            ],[
            'name' => '長沼華',
            'email' => 'hana81992@mkxxd.zf',
            'password' => Hash::make('password123'),
            ],
        ]);
    }
}
