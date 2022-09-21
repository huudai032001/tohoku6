<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'login_name' => 'admin',
            'display_name' => 'Admin',
            'role' => 'admin',
            'email' => 'admin@sample.email',
            'status' => 1,
            'password' => Hash::make('123123'),
            'fields' => '[]',
            'created_at' => '2021-01-01 00:00:00',
            'updated_at' => '2021-01-01 00:00:00'
        ]);

        // for($i = 0; $i < 10; $i++) {
        //     DB::table('users')->insert([
        //         'login_name' => Str::random(10) . $i,
        //         'display_name' => Str::random(10),
        //         'role' => 'admin',
        //         'email' => Str::random(10).'@gmail.com',
        //         'status' => 'active',
        //         'password' => Hash::make('123123'),
        //     ]);
        // }
    }
}
