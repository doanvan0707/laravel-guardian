<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $data = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt(123456), // password
                'remember_token' => Str::random(10),
                'is_admin' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt(123456), // password
                'remember_token' => Str::random(10),
                'is_admin' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'user2',
                'email' => 'user2@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt(123456), // password
                'remember_token' => Str::random(10),
                'is_admin' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];
        DB::table('users')->insert($data);
    }
}
