<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Label;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('password'),
            'label' => Label::LABEL_NAME['super-admin'],
            'identity_code' => 'ID-' . strtoupper(Str::random(10))
        ]);
        $superAdmin->assignRole('super-admin');


        for ($i = 0; $i < count(Division::DIVISION_NAMES); $i++) {
            $createdAdmin = User::create([
                'name' => 'Ketua ' . Division::DIVISION_NAMES[$i],
                'email' => strtolower(str_replace(" ", "", Division::DIVISION_NAMES[$i])) . '@gmail.com',
                'password' => Hash::make('password'),
                'label' => Label::LABEL_NAME['admin'] . Division::DIVISION_NAMES[$i],
                'identity_code' => 'ID-' . strtoupper(Str::random(10))
            ]);
            $createdAdmin->assignRole('admin');
            dump('Admin created ' . $createdAdmin['name']);
        }

        $users = [
            [
                'name' => 'User1',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
                'label' => Label::LABEL_NAME['user'] . Division::DIVISION_NAMES[0],
                'identity_code' => 'ID-' . strtoupper(Str::random(10))
            ],
            [
                'name' => 'User2',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('password'),
                'label' => Label::LABEL_NAME['guest'],
                'identity_code' => 'ID-' . strtoupper(Str::random(10))
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
