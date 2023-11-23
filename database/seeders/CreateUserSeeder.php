<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name'=>'User',
                'email'=>'user@fruitables.com',
                'username'=>'user123',
                'roles'=> 0,
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Admin',
                'email'=>'admin@fruitables.com',
                'username'=>'admin123',
                'roles'=> 1,
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Social User',
                'email'=>'socialuser@fruitables.com',
                'username'=>'social_user123',
                'roles'=> 0,
                'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($users as $key => $user)
        {
            User::create($user);
        }
    }
}
