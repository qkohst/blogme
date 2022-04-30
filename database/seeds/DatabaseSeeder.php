<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Add user table seeder 
        User::create([
            'name'    => 'Qkoh St',
            'email'    => 'kukohsantoso013@gmail.com',
            'password'    => bcrypt('123456'),
            'role' => 1,
            'avatar' => 'default.png'
        ]);
    }
}
