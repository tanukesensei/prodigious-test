<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456789'),
            'username' => 'Admin',
            'description' => 'Administrador do sistema.',
            'avatar' => NULL,
            'is_admin' => 1,
            'email_verified_at' => date('Y/m/d'),
            'created_at' => date('Y/m/d'),
            'updated_at' => date('Y/m/d'),
        ]);
    }
}
