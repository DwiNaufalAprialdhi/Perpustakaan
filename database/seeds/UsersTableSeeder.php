<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'akses' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'petugas',
            'email' => 'petugas@gmail.com',
            'password' => bcrypt('petugas123'),
            'akses' => 'petugas',
        ]);
    }
}
