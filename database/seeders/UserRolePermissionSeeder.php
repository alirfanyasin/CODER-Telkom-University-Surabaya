<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password')
        ]);
        $admin->assignRole('admin');


        $users = [
            [
                'name' => 'User1',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'User2',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('password')
            ],
        ];


        foreach ($users as $user) {
            $createdUser = User::create($user);
            $createdUser->assignRole('user');

            if ($createdUser->email == 'user@gmail.com') {
                $createdUser->givePermissionTo('unverified');
            } else {
                $createdUser->givePermissionTo('verified');
            }

            dump('User created ' . $createdUser->name);
        }
    }
}
