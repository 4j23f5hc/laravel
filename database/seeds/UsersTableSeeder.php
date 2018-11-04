<?php

use App\User;

use Illuminate\Support\Facades\Hash;
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
		User::create([
            'name' => 'Md. Raju Haque',
            'phone' => '01675755597',
            'email' => 'raju@admin',
			'email_verified_at' =>now(),
            'password' => Hash::make('raju@2018'),
            'role' => 'admin',
        ]);
		User::create([
            'name' => 'Help Line',
            'phone' => '01822901808',
            'email' => 'help@line.com',
			'email_verified_at' =>now(),
            'password' => Hash::make('help@2018'),
            'role' => 'admin',
        ]);
    }
}
