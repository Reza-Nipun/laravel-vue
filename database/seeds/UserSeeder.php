<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'NIPUN',
            'email' => 'nipunsarker56@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
