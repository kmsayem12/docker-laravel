<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(
            [
                'name' => "admin",
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
            ]
        );

        DB::table('users')->insert([
            'name' => "user",
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => date("Y-m-d H:i:s"),
        ]);

    }
}
