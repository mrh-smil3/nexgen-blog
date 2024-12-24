<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'role_id' => 1,
                'full_name' => 'Admin',
                'email' => 'nexgen@gmail.com',
                'password' => Hash::make(12345)
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
