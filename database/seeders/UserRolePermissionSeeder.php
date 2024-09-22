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
                'identity_code' => 'ID-' . strtoupper(Str::random(10)),
                'division_id' => $i + 1
            ]);
            $createdAdmin->assignRole('admin');
            dump('Admin created ' . $createdAdmin['name']);
        }

        for ($i = 0; $i < count(Division::DIVISION_NAMES); $i++) {
            $createdUser = User::create([
                'name' => 'Anggota' . $i + 1,
                'email' => 'anggota' . $i + 1 . strtolower(str_replace(" ", "", Division::DIVISION_NAMES[$i])) . '@gmail.com',
                'password' => Hash::make('password'),
                'label' => Label::LABEL_NAME['user'] . Division::DIVISION_NAMES[$i],
                'identity_code' => 'ID-' . strtoupper(Str::random(10)),
                'division_id' => $i + 1
            ]);
            $createdUser->assignRole('user');
            dump('User created ' . $createdUser['name']);
        }


        $guest = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'label' => Label::LABEL_NAME['guest'],
        ]);
        $guest->assignRole('guest');

        $alumni = User::create([
            'name' => 'Alumni',
            'email' => 'alumni@gmail.com',
            'password' => Hash::make('password'),
            'label' => Label::LABEL_NAME['alumni'],
        ]);
        $alumni->assignRole('guest');
    }
}
