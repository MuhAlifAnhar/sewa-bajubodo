<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\String_;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nama_role' => 'user'
        ]);
        DB::table('roles')->insert([
            'nama_role' => 'admin'
        ]);
        DB::table('roles')->insert([
            'nama_role' => 'super'
        ]);

        DB::table('keterangan')->insert([
            'nama_keterangan' => 'Di sewa'
        ]);

        DB::table('keterangan')->insert([
            'nama_keterangan' => 'Di booking'
        ]);

        DB::table('keterangan')->insert([
            'nama_keterangan' => 'Ready'
        ]);

        DB::table('users')->insert([
            'nama' => 'yusuf',
            'email' => 'yusuf@gmail.com',
            'password' => bcrypt('yusuf12345'),
            'role_id' => 3
        ]);

        DB::table('users')->insert([
            'nama' => 'alif',
            'email' => 'alif@gmail.com',
            'password' => bcrypt('alif12345'),
            'role_id' => 1
        ]);

        DB::table('users')->insert([
            'nama' => 'anhar',
            'email' => 'anhar@gmail.com',
            'password' => bcrypt('anhar123'),
            'role_id' => 2
        ]);
    }
}
